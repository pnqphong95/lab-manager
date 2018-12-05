package vn.cit.labmanager.app.event.request.form;

import java.util.ArrayList;
import java.util.List;
import java.util.stream.Collectors;

import javax.servlet.http.HttpServletRequest;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Bean;
import org.springframework.data.domain.Sort;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;

import vn.cit.labmanager.app.course.Course;
import vn.cit.labmanager.app.course.CourseService;
import vn.cit.labmanager.app.event.Event;
import vn.cit.labmanager.app.event.EventService;
import vn.cit.labmanager.app.event.request.EventRequest;
import vn.cit.labmanager.app.event.request.EventRequestInitializingService;
import vn.cit.labmanager.app.event.request.EventRequestInitializingServiceImpl;
import vn.cit.labmanager.app.event.request.EventRequestService;
import vn.cit.labmanager.app.lab.Lab;
import vn.cit.labmanager.app.lab.LabService;
import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.period.PeriodService;
import vn.cit.labmanager.app.shift.ShiftService;
import vn.cit.labmanager.app.tool.ToolService;
import vn.cit.labmanager.app.user.UserService;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriodService;

@Controller
public class EventRequestFormController {
	
	@Autowired
	private PeriodService periodService;
	
	@Autowired
	private CourseService courseService;
	
	@Autowired
	private LabService labService;
	
	@Autowired
	private UserService userService;
	
	@Autowired
	private WeekOfPeriodService wopService;
	
	@Autowired
	private ShiftService shiftService;
	
	@Autowired
	private EventService eventService;
	
	@Autowired
	private EventRequestService requestService;
	
	@Autowired
	private ToolService toolService;
	
	@Bean
	EventRequestInitializingService getRequestInitService() {
		return new EventRequestInitializingServiceImpl();
	}
	
	@RequestMapping(path = "/admin/create_request")
    public String createEventRequestForm(Model model) {
		List<Period> periods = periodService.findAvailablePeriod(new Sort(Sort.Direction.ASC, "startDate"));
		model.addAttribute("existAvailablePeriod", !periods.isEmpty());
		if (!periods.isEmpty()) {
			EventRequestForm form = new EventRequestForm();
			form.addEvent(new EventTimeForm());
			model.addAttribute("availablePeriod", periods.get(0));
			model.addAttribute("tools", toolService.findAll());
			List<Course> courses = courseService.findByLecturerAndCurrentPeriod(userService.getCurrentUser().orElse(null));
			if (!courses.isEmpty()) {
				form.setCourse(courses.get(0));
				form.setTools(courses.get(0).getSubject().getTools());
			}
			model.addAttribute("requestForm", form);
			model.addAttribute("courses", courses);
			model.addAttribute("wops", wopService.findByPeriod(periods.get(0)));
			model.addAttribute("shifts", shiftService.findAll());
		}
		return "admin/myrequest/edit";   
    }
	
	@RequestMapping(value="/admin/create_request", params={"saveRequest"})
	public String saveRequest(@ModelAttribute("requestForm") final EventRequestForm requestForm, BindingResult result, Model model) {
		List<EventRequest> requests = getRequestInitService().from(requestForm);
		List<Lab> labLookUps = labService.findAll().stream().filter(lab -> lab.getDepartment() == requestForm.getCourse().getLecturer().getDepartment()).collect(Collectors.toList());
		
		List<EventRequest> pendingRequests = new ArrayList<>();
		requests.forEach(request -> {
			List<Lab> availableLabs = new ArrayList<>(labLookUps);
			List<Event> eventRegistereds = eventService.findByLabInAndStartDateEqualsAndShiftEquals(labLookUps, request.getStartDate(), request.getShift());
			availableLabs.removeAll(eventRegistereds.stream().map(Event::getLab).collect(Collectors.toList()));
			if (!availableLabs.isEmpty()) {
				request.setLab(availableLabs.get(0));
				eventService.save(Event.from(request));
			} else {
				pendingRequests.add(request);
			}
		});
		requestService.save(pendingRequests);
		return "redirect:/admin";
	}
	
	@RequestMapping(value="/admin/create_request", params={"addRow"})
    public String addRow(@ModelAttribute("requestForm") EventRequestForm requestForm, BindingResult result, Model model) {
		requestForm.getTimes().add(new EventTimeForm());
		List<Period> periods = periodService.findAvailablePeriod(new Sort(Sort.Direction.ASC, "startDate"));
		model.addAttribute("existAvailablePeriod", !periods.isEmpty());
		if (!periods.isEmpty()) {
			model.addAttribute("availablePeriod", periods.get(0));
			model.addAttribute("tools", toolService.findAll());
			model.addAttribute("courses", courseService.findByLecturerAndCurrentPeriod(userService.getCurrentUser().orElse(null)));
			model.addAttribute("wops", wopService.findByPeriod(periods.get(0)));
			model.addAttribute("shifts", shiftService.findAll());
		}
        return "admin/myrequest/edit";
    }
	
	@RequestMapping(value="/admin/create_request", params={"removeRow"})
    public String removeRow(@ModelAttribute("requestForm") EventRequestForm requestForm, BindingResult result, final HttpServletRequest req, Model model) {
        final Integer rowId = Integer.valueOf(req.getParameter("removeRow"));
        requestForm.getTimes().remove(rowId.intValue());
        List<Period> periods = periodService.findAvailablePeriod(new Sort(Sort.Direction.ASC, "startDate"));
		model.addAttribute("existAvailablePeriod", !periods.isEmpty());
		if (!periods.isEmpty()) {
	        model.addAttribute("availablePeriod", periods.get(0));
	        model.addAttribute("tools", toolService.findAll());
			model.addAttribute("courses", courseService.findByLecturerAndCurrentPeriod(userService.getCurrentUser().orElse(null)));
			model.addAttribute("wops", wopService.findByPeriod(periods.get(0)));
			model.addAttribute("shifts", shiftService.findAll());
		}
        return "admin/myrequest/edit";
    }

}
