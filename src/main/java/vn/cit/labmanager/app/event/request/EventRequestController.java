package vn.cit.labmanager.app.event.request;

import java.time.LocalDate;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

import vn.cit.labmanager.app.course.CourseService;
import vn.cit.labmanager.app.lab.LabService;
import vn.cit.labmanager.app.period.PeriodService;
import vn.cit.labmanager.app.user.UserService;

@Controller
public class EventRequestController {
	
	@Autowired
	private PeriodService periodService;
	
	@Autowired
	private CourseService courseService;
	
	@Autowired
	private UserService userService;
	
	@Autowired
	private LabService labService;
	
	@RequestMapping(path = "/admin/create_request")
    public String createEventRequestForm(Model model) {
		boolean isCurrentPeriodCreated = periodService.findBySpecifiedDate(LocalDate.now()).isPresent();
		model.addAttribute("isCurrentPeriodCreated", isCurrentPeriodCreated);
		model.addAttribute("requestForm", new EventRequestForm());
		model.addAttribute("courses", courseService.findByLecturerAndCurrentPeriod(userService.getCurrentUser().orElse(null)));
		model.addAttribute("labs", labService.findAll());
		return "admin/myrequest/edit";   
    }

}
