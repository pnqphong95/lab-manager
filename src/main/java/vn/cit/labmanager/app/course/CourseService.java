package vn.cit.labmanager.app.course;

import java.util.List;
import java.util.Optional;

import vn.cit.labmanager.app.user.User;

public interface CourseService {
	public List<Course> findAll();
	public boolean delete(String id);
	public Optional<Course> findOne(String id);
	public Course save(Course course);
	public Optional<Course> findTopByOrderByModifiedDesc();
	public Optional<Course> findByCourseIdAndPeriodBelongTo(String id, String periodId);
	public List<Course> findByLecturerAndCurrentPeriod(User lecturer);
}
