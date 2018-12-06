package vn.cit.labmanager.app.statistic;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Sort;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import vn.cit.labmanager.app.department.DepartmentService;
import vn.cit.labmanager.app.lab.LabService;
import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.period.PeriodService;

@RestController
public class EventStatisticRestController {
	
	@Autowired
	private PeriodService periodService;
	
	@Autowired
	private EventStatisticService eventStatisticService;
	
	@Autowired
	private DepartmentService departmentService;
	
	@Autowired
	private LabService labService;
	
	@GetMapping("/api/statistic/wop")
	public ResponseEntity<EventStatistic> statisticByWeekOfFirstAvailablePeriod() {
		List<Period> periods = periodService.findAvailablePeriod(new Sort(Sort.Direction.ASC, "startDate"));
		if (!periods.isEmpty()) {
			Period firstPeriod = periods.get(0);
			EventStatistic statisticObj = eventStatisticService.generateBy(firstPeriod);
			return ResponseEntity.ok(statisticObj);
		}
		return ResponseEntity.notFound().build();
	}
	
	@GetMapping("/api/statistic/department")
	public ResponseEntity<EventStatistic> statisticByDepartment() {
		EventStatistic statisticObj = eventStatisticService.generateByDepartment(departmentService.findAll());
		return ResponseEntity.ok(statisticObj);
	}
	
	@GetMapping("/api/statistic/lab")
	public ResponseEntity<EventStatistic> statisticByLab() {
		EventStatistic statisticObj = eventStatisticService.generateByLab(labService.findAll(new Sort(Sort.Direction.ASC, "name")));
		return ResponseEntity.ok(statisticObj);
	}

}
