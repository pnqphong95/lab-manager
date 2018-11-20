package vn.cit.labmanager.app.course;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface CourseRepository extends JpaRepository<Course, String> {

	public Course findTopByOrderByModifiedDesc();

}
