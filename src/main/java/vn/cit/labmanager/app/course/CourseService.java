package vn.cit.labmanager.app.course;

import java.util.List;
import java.util.Optional;

public interface CourseService {
	public List<Course> findAll();
	public boolean delete(String id);
	public Optional<Course> findOne(String id);
	public Course save(Course course);
	public Optional<Course> findTopByOrderByModifiedDesc();
}
