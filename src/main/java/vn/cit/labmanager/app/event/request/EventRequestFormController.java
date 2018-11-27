package vn.cit.labmanager.app.event.request;

import java.time.LocalDate;
import java.util.Optional;

import javax.servlet.http.HttpServletRequest;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;

import vn.cit.labmanager.app.course.CourseService;
import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.period.PeriodService;
import vn.cit.labmanager.app.shift.ShiftService;
import vn.cit.labmanager.app.user.UserService;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriodService;

@Controller
public class EventRequestFormController {
	
	@Autowired
	private PeriodService periodService;
	
	@Autowired
	private CourseService courseService;
	
	@Autowired
	private UserService userService;
	
	@Autowired
	private WeekOfPeriodService wopService;
	
	@Autowired
	private ShiftService shiftService;
	
	@RequestMapping(path = "/admin/create_request")
    public String createEventRequestForm(Model model) {
		Optional<Period> period = periodService.findBySpecifiedDate(LocalDate.now());
		model.addAttribute("isCurrentPeriodCreated", period.isPresent());
		EventRequestForm form = new EventRequestForm();
		form.addEvent(new EventTimeForm());
		model.addAttribute("requestForm", form);
		model.addAttribute("courses", courseService.findByLecturerAndCurrentPeriod(userService.getCurrentUser().orElse(null)));
		model.addAttribute("wops", wopService.findByPeriod(period.get()));
		model.addAttribute("shifts", shiftService.findAll());
		return "admin/myrequest/edit";   
    }
	
	@RequestMapping(value="/admin/create_request", params={"addRow"})
    public String addRow(@ModelAttribute("requestForm") final EventRequestForm requestForm, Model model) {
		requestForm.getTimes().add(new EventTimeForm());
		Optional<Period> period = periodService.findBySpecifiedDate(LocalDate.now());
		model.addAttribute("isCurrentPeriodCreated", period.isPresent());
		model.addAttribute("courses", courseService.findByLecturerAndCurrentPeriod(userService.getCurrentUser().orElse(null)));
		model.addAttribute("wops", wopService.findByPeriod(period.get()));
		model.addAttribute("shifts", shiftService.findAll());
        return "admin/myrequest/edit";
    }
	
	@RequestMapping(value="/admin/create_request", params={"removeRow"})
    public String removeRow(@ModelAttribute("requestForm") final EventRequestForm requestForm, final HttpServletRequest req, Model model) {
        final Integer rowId = Integer.valueOf(req.getParameter("removeRow"));
        requestForm.getTimes().remove(rowId.intValue());
        Optional<Period> period = periodService.findBySpecifiedDate(LocalDate.now());
		model.addAttribute("isCurrentPeriodCreated", period.isPresent());
		model.addAttribute("courses", courseService.findByLecturerAndCurrentPeriod(userService.getCurrentUser().orElse(null)));
		model.addAttribute("wops", wopService.findByPeriod(period.get()));
		model.addAttribute("shifts", shiftService.findAll());
        return "admin/myrequest/edit";
    }

}
