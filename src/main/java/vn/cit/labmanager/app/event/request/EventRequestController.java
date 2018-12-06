package vn.cit.labmanager.app.event.request;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Sort;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import vn.cit.labmanager.app.course.CourseService;
import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.period.PeriodService;
import vn.cit.labmanager.app.shift.ShiftService;
import vn.cit.labmanager.app.tool.ToolService;
import vn.cit.labmanager.app.user.UserService;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriodService;

@Controller
public class EventRequestController {
	
	@Autowired
	private PeriodService periodService;
	
	@Autowired
	private EventRequestService eventRequestService;
	
	@Autowired
	private CourseService courseService;

	@Autowired
	private UserService userService;
	
	@Autowired
	private WeekOfPeriodService wopService;
	
	@Autowired
	private ShiftService shiftService;
	
	@Autowired
	private ToolService toolService;
	
	@RequestMapping(path = "/admin/myrequests/pending")
    public String index(Model model) {
		List<Period> periods = periodService.findAvailablePeriod(new Sort(Sort.Direction.ASC, "startDate"));
		model.addAttribute("existAvailablePeriod", !periods.isEmpty());
		if (!periods.isEmpty()) {
			model.addAttribute("requests", eventRequestService.findAll());
		}
		return "admin/myrequest/pending";   
    }
	
	@RequestMapping(path = "/admin/myrequests/process", method = RequestMethod.POST)
    public String saveRequest(EventRequest eventRequest) {
		eventRequestService.save(eventRequest);
		return "redirect:/admin/myrequests/pending";
    }
	
	@RequestMapping(path = "/admin/myrequests/process/{id}")
    public String processPendingRequest(@PathVariable(name = "id") String id, Model model) {
		List<Period> periods = periodService.findAvailablePeriod(new Sort(Sort.Direction.ASC, "startDate"));
		model.addAttribute("existAvailablePeriod", !periods.isEmpty());
		if (!periods.isEmpty()) {
			Optional<EventRequest> request = eventRequestService.findOne(id);
	        request.ifPresent(item -> {
	        	model.addAttribute("availablePeriod", periods.get(0));
	        	model.addAttribute("request", item);
	        	model.addAttribute("tools", toolService.findAll());
				model.addAttribute("courses", courseService.findByLecturerAndCurrentPeriod(userService.getCurrentUser().orElse(null)));
				model.addAttribute("wops", wopService.findByPeriod(periods.get(0)));
				model.addAttribute("shifts", shiftService.findAll());
	        });
		}
        return "admin/myrequest/process";   
    }
	
	@RequestMapping(path = "/admin/myrequests/delete/{id}")
    public String deleteRequest(@PathVariable(name = "id") String id) {
        eventRequestService.delete(id);
        return "redirect:/admin/myrequests/pending";   
    }
	
	

}
