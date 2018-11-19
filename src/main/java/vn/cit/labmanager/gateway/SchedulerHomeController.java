package vn.cit.labmanager.gateway;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.period.PeriodService;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriod;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriodService;

@Controller
public class SchedulerHomeController {
	
	@Autowired
	private PeriodService periodService;
	
	@Autowired
	private WeekOfPeriodService weekOfPeriodService;
	
	@RequestMapping(path = "/")
    public String index(Model model) {
		List<Period> periods = periodService.findAll();
		Optional<Period> currentPeriod = periods.stream().filter(Period::isCurrent).findFirst();
		List<WeekOfPeriod> weekOfPeriods = new ArrayList<>();
		if (currentPeriod.isPresent()) {
			weekOfPeriods = weekOfPeriodService.findByPeriod(currentPeriod.get());
		}
		model.addAttribute("weekOfPeriods", weekOfPeriods);
		Optional<WeekOfPeriod> currentWeekOfPeriod = weekOfPeriods.stream().filter(WeekOfPeriod::isCurrent).findFirst();
		model.addAttribute("currentPeriod", currentPeriod.get());
		model.addAttribute("periods", periods);
		model.addAttribute("currentWop", currentWeekOfPeriod.get());
        return "index";
    }

}
