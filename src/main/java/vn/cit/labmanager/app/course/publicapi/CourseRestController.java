package vn.cit.labmanager.app.course.publicapi;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;

import vn.cit.labmanager.app.course.CourseService;

@RestController
public class CourseRestController {
	
	@Autowired
	private CourseService service;
	
	@GetMapping("/api/courses/check_uniqueCourses")
	@ResponseBody
	public boolean isCourseNotUnique(@RequestParam String courseId, @RequestParam String periodId) {
		return !service.findByCourseIdAndPeriodBelongTo(courseId, periodId).isPresent();
	}

}
