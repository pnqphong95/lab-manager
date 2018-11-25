package vn.cit.labmanager.app.course;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import vn.cit.labmanager.app.period.Period;

@Repository
public interface CourseRepository extends JpaRepository<Course, String> {

	public Course findTopByOrderByModifiedDesc();
	public Course findByCourseIdAndPeriodBelongTo(String id, Period period);

}
