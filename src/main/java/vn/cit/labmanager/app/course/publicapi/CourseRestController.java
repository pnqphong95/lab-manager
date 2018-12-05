package vn.cit.labmanager.app.course.publicapi;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.stream.Collectors;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;

import vn.cit.labmanager.app.course.Course;
import vn.cit.labmanager.app.course.CourseService;
import vn.cit.labmanager.app.tool.publicapi.ToolDto;

@RestController
public class CourseRestController {
	
	@Autowired
	private CourseService service;
	
	@GetMapping("/api/courses/check_uniqueCourses")
	@ResponseBody
	public boolean isCourseNotUnique(@RequestParam String courseId, @RequestParam String periodId) {
		return !service.findByCourseIdAndPeriodBelongTo(courseId, periodId).isPresent();
	}
	
	@GetMapping("/api/courses/getTools")
	@ResponseBody
	public List<ToolDto> getToolsUsedByCourse(@RequestParam String courseId) {
		List<ToolDto> dtos = new ArrayList<>();
		Optional<Course> course = service.findOne(courseId);
		if (course.isPresent()) {
			dtos = course.get().getSubject().getTools().stream().map(ToolDto::fromTool).collect(Collectors.toList());
		}
		return dtos;
	}

}
