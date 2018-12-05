package vn.cit.labmanager.app.course;

import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Optional;

import org.apache.commons.lang3.StringUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.period.PeriodService;
import vn.cit.labmanager.app.subject.SubjectService;
import vn.cit.labmanager.app.user.User;
import vn.cit.labmanager.app.user.UserService;

@Controller
public class CourseController {

	@Autowired
	private CourseService service;
	
	@Autowired
	private SubjectService subjectService;
	
	@Autowired
	private UserService userService;
	
	@Autowired
	private PeriodService periodService;
	
	@RequestMapping(path = "/admin/mycourses")
    public String index(Model model) {
		Optional<Course> lastModifiedCourse = service.findTopByOrderByModifiedDesc();
		String lastModification = lastModifiedCourse.map(Course::getModified)
				.map(modified -> modified.format(DateTimeFormatter.ofPattern("hh':'mm a',' dd/MM/yyyy")))
				.orElse(StringUtils.EMPTY);
		
		model.addAttribute("courses", service.findByLecturerAndCurrentPeriod(userService.getCurrentUser().orElse(null)));
		model.addAttribute("lastModification", lastModification);
        return "admin/mycourse/index";
    }
	
	@RequestMapping(path = "/admin/mycourses", method = RequestMethod.POST)
    public String saveCourse(Course course) {
		service.save(course);
		return "redirect:/admin/mycourses";
    }
	
	@RequestMapping(path = "/admin/mycourses/add")
    public String createCourse(Model model) {
		Optional<Period> period = periodService.findBySpecifiedDate(LocalDate.now());
		model.addAttribute("isCurrentPeriodCreated", period.isPresent());
		if (period.isPresent()) {
			model.addAttribute("course", new Course());
	        model.addAttribute("subjects", subjectService.findAll());
	        Optional<User> user = userService.getCurrentUser();
	        model.addAttribute("users", user.isPresent() ? Arrays.asList(user.get()) : new ArrayList<>());
	        model.addAttribute("periods", periodService.findAvailablePeriod());
		}
        return "admin/mycourse/edit";   
    }
	
	@RequestMapping(path = "/admin/mycourses/edit/{id}")
    public String editCourse(@PathVariable(name = "id") String id, Model model) {
		Optional<Period> period = periodService.findBySpecifiedDate(LocalDate.now());
		model.addAttribute("isCurrentPeriodCreated", period.isPresent());
		if (period.isPresent()) {
			Optional<Course> course = service.findOne(id);
	        course.ifPresent(item -> {
	        	model.addAttribute("course", item);
	        	model.addAttribute("subjects", subjectService.findAll());
	            model.addAttribute("users", userService.findAll());
	            model.addAttribute("periods", periodService.findAvailablePeriod());
	        });
		}
        return "admin/mycourse/edit";   
    }
	
	@RequestMapping(path = "/admin/mycourses/delete/{id}")
    public String deleteCourse(@PathVariable(name = "id") String id) {
        service.delete(id);
        return "redirect:/admin/mycourses";   
    }

}
