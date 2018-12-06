package vn.cit.labmanager.app.statistic;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.app.department.Department;
import vn.cit.labmanager.app.event.EventService;
import vn.cit.labmanager.app.lab.Lab;
import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriod;

@Service
public class EventStatisticServiceImpl implements EventStatisticService {

	@Autowired
	private EventService eventService;
	
	@Override
	public EventStatistic generateBy(Period period) {
		EventStatistic statistic = new EventStatistic();
		for(WeekOfPeriod wop : period.getWeekOfPeriods()) {
			statistic.getLabelDatas().put(String.valueOf(wop.getNumOrder()), eventService.countByWeekOfPeriod(wop));
		}
		return statistic;
	}

	@Override
	public EventStatistic generateByDepartment(List<Department> departments) {
		EventStatistic statistic = new EventStatistic();
		for(Department department : departments) {
			statistic.getLabelDatas().put(String.valueOf(department.getName()), eventService.countByLabDepartment(department));
		}
		return statistic;
	}

	@Override
	public EventStatistic generateByLab(List<Lab> labs) {
		EventStatistic statistic = new EventStatistic();
		for(Lab lab : labs) {
			statistic.getLabelDatas().put(String.valueOf(lab.getName()), eventService.countByLab(lab));
		}
		return statistic;
	}

}
