package vn.cit.labmanager.app.event.request;

import java.util.List;
import java.util.Optional;

import javax.servlet.http.HttpServletRequest;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Sort;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;

import vn.cit.labmanager.app.course.CourseService;
import vn.cit.labmanager.app.event.DayOfWeekVi;
import vn.cit.labmanager.app.event.request.handler.EventRequestDelegator;
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
	
	@Autowired
	private EventRequestDelegator delegator;
	
	@RequestMapping(path = "/admin/requests/pending")
    public String indexAdmin(Model model) {
		List<Period> periods = periodService.findAvailablePeriod(new Sort(Sort.Direction.ASC, "startDate"));
		model.addAttribute("existAvailablePeriod", !periods.isEmpty());
		if (!periods.isEmpty()) {
			model.addAttribute("requests", eventRequestService.findAll());
		}
		return "admin/request/pending";   
    }
	
	@RequestMapping(path = "/admin/myrequests/pending")
    public String index(Model model) {
		List<Period> periods = periodService.findAvailablePeriod(new Sort(Sort.Direction.ASC, "startDate"));
		model.addAttribute("existAvailablePeriod", !periods.isEmpty());
		if (!periods.isEmpty()) {
			model.addAttribute("requests", eventRequestService.findByCourseLecturer(userService.getCurrentUser().orElse(null)));
		}
		return "admin/myrequest/pending";   
    }
	
	@RequestMapping(path = "/admin/requests/process", params={"saveRequest"})
    public String saveRequestAdmin(EventRequest eventRequest) {
		if (eventRequest.getDow() != null) {
			eventRequest.setStartDate(eventRequest.getWeekOfPeriod().getStartDate().with(eventRequest.getDow().getDayOfWeek()));
		}
		delegator.delegate(eventRequest);
		return "redirect:/admin/requests/pending";
    }
	
	@RequestMapping(path = "/admin/myrequests/process", params={"saveRequest"})
    public String saveRequest(EventRequest eventRequest) {
		if (eventRequest.getDow() != null) {
			eventRequest.setStartDate(eventRequest.getWeekOfPeriod().getStartDate().with(eventRequest.getDow().getDayOfWeek()));
		}
		delegator.delegate(eventRequest);
		return "redirect:/admin/myrequests/pending";
    }
	
	@RequestMapping(path = "/admin/requests/process/{id}")
    public String processPendingRequestAdmin(@PathVariable(name = "id") String id, Model model) {
		List<Period> periods = periodService.findAvailablePeriod(new Sort(Sort.Direction.ASC, "startDate"));
		model.addAttribute("existAvailablePeriod", !periods.isEmpty());
		if (!periods.isEmpty()) {
			Optional<EventRequest> request = eventRequestService.findOne(id);
	        request.ifPresent(item -> {
	        	item.setDow(item.getDayOfWeekVi());
	        	model.addAttribute("availablePeriod", periods.get(0));
	        	model.addAttribute("request", item);
	        	model.addAttribute("tools", toolService.findAll());
				model.addAttribute("courses", courseService.findByLecturerAndCurrentPeriod(userService.getCurrentUser().orElse(null)));
				model.addAttribute("wops", wopService.findByPeriod(periods.get(0)));
				model.addAttribute("dows", DayOfWeekVi.values());
				model.addAttribute("shifts", shiftService.findAll());
	        });
		}
        return "admin/request/process";   
    }
	
	@RequestMapping(path = "/admin/myrequests/process/{id}")
    public String processPendingRequest(@PathVariable(name = "id") String id, Model model) {
		List<Period> periods = periodService.findAvailablePeriod(new Sort(Sort.Direction.ASC, "startDate"));
		model.addAttribute("existAvailablePeriod", !periods.isEmpty());
		if (!periods.isEmpty()) {
			Optional<EventRequest> request = eventRequestService.findOne(id);
	        request.ifPresent(item -> {
	        	item.setDow(item.getDayOfWeekVi());
	        	model.addAttribute("availablePeriod", periods.get(0));
	        	model.addAttribute("request", item);
	        	model.addAttribute("tools", toolService.findAll());
				model.addAttribute("courses", courseService.findByLecturerAndCurrentPeriod(userService.getCurrentUser().orElse(null)));
				model.addAttribute("wops", wopService.findByPeriod(periods.get(0)));
				model.addAttribute("dows", DayOfWeekVi.values());
				model.addAttribute("shifts", shiftService.findAll());
	        });
		}
        return "admin/myrequest/process";   
    }
	
	@RequestMapping(path = "/admin/requests/delete/{id}")
    public String deleteRequestAdmin(@PathVariable(name = "id") String id) {
        eventRequestService.delete(id);
        return "redirect:/admin/requests/pending";   
    }
	
	@RequestMapping(path = "/admin/myrequests/delete/{id}")
    public String deleteRequest(@PathVariable(name = "id") String id) {
        eventRequestService.delete(id);
        return "redirect:/admin/myrequests/pending";   
    }
	
	@RequestMapping(value="/admin/requests/process", params={"checkAvalable"})
    public String checkAvalableAdmin(@ModelAttribute("request") EventRequest request, BindingResult result, final HttpServletRequest req, Model model) {
        boolean hasAvailableLab = !delegator.getAvailableLab(request).isEmpty();
        request.setAvailable(hasAvailableLab);
        List<Period> periods = periodService.findAvailablePeriod(new Sort(Sort.Direction.ASC, "startDate"));
		model.addAttribute("existAvailablePeriod", !periods.isEmpty());
		if (!periods.isEmpty()) {
        	model.addAttribute("availablePeriod", periods.get(0));
        	model.addAttribute("request", request);
        	model.addAttribute("tools", toolService.findAll());
			model.addAttribute("courses", courseService.findByLecturerAndCurrentPeriod(userService.getCurrentUser().orElse(null)));
			model.addAttribute("wops", wopService.findByPeriod(periods.get(0)));
			model.addAttribute("dows", DayOfWeekVi.values());
			model.addAttribute("shifts", shiftService.findAll());
		}
		return "admin/request/process";
    }
	
	@RequestMapping(value="/admin/myrequests/process", params={"checkAvalable"})
    public String checkAvalable(@ModelAttribute("request") EventRequest request, BindingResult result, final HttpServletRequest req, Model model) {
        boolean hasAvailableLab = !delegator.getAvailableLab(request).isEmpty();
        request.setAvailable(hasAvailableLab);
        List<Period> periods = periodService.findAvailablePeriod(new Sort(Sort.Direction.ASC, "startDate"));
		model.addAttribute("existAvailablePeriod", !periods.isEmpty());
		if (!periods.isEmpty()) {
        	model.addAttribute("availablePeriod", periods.get(0));
        	model.addAttribute("request", request);
        	model.addAttribute("tools", toolService.findAll());
			model.addAttribute("courses", courseService.findByLecturerAndCurrentPeriod(userService.getCurrentUser().orElse(null)));
			model.addAttribute("wops", wopService.findByPeriod(periods.get(0)));
			model.addAttribute("dows", DayOfWeekVi.values());
			model.addAttribute("shifts", shiftService.findAll());
		}
		return "admin/myrequest/process";
    }

}
