package vn.cit.labmanager.gateway;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Sort;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

import vn.cit.labmanager.app.event.EventService;
import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.period.PeriodService;

@Controller
public class LabManagerStatisticController {
	
	@Autowired
	private EventService eventService;
	
	@Autowired
	private PeriodService periodService;
	
	@RequestMapping(path = "/admin/statistic")
    public String index(Model model) {
		List<Period> periods = periodService.findAvailablePeriod(new Sort(Sort.Direction.ASC, "startDate"));
		model.addAttribute("existAvailablePeriod", !periods.isEmpty());
		model.addAttribute("events", eventService.findAll());
        return "admin/statistic";
    }

}
