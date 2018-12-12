package vn.cit.labmanager.gateway;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Sort;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;

import vn.cit.labmanager.app.event.EventService;
import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.period.PeriodService;
import vn.cit.labmanager.app.user.UserService;

@Controller
public class LabManagerHomeController {
	
	@Autowired
	private EventService eventService;
	
	@Autowired
	private PeriodService periodService;
	
	@Autowired
	private UserService userService;
	
	@RequestMapping(path = "/admin")
    public String index(Model model) {
		List<Period> periods = periodService.findAvailablePeriod(new Sort(Sort.Direction.ASC, "startDate"));
		model.addAttribute("existAvailablePeriod", !periods.isEmpty());
		if (!periods.isEmpty()) {
			model.addAttribute("events", eventService.findByCourseLecturerAndWeekOfPeriodPeriodBelongTo(userService.getCurrentUser().orElse(null), periods.get(0)));
		}
        return "admin/index";
    }
	
	@RequestMapping(path = "/admin/events/delete/{id}")
    public String deleteEvent(@PathVariable(name = "id") String id) {
		eventService.delete(id);
        return "redirect:/admin";   
    }

}
