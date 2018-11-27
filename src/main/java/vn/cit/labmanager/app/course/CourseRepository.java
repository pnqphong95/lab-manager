package vn.cit.labmanager.app.course;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.user.User;

@Repository
public interface CourseRepository extends JpaRepository<Course, String> {

	public Course findTopByOrderByModifiedDesc();
	public Course findByCourseIdAndPeriodBelongTo(String id, Period period);
	public List<Course> findByLecturerAndPeriodBelongTo(User lecturer, Period period);
	
}
