package vn.cit.labmanager.app.course;

import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class CourseServiceImpl implements CourseService {

	@Autowired
	private CourseRepository repo;

	@Override
	public List<Course> findAll() {
		return repo.findAll();
	}

	@Override
	public boolean delete(String id) {
		try {
			repo.deleteById(id);
		} catch (Exception exception) {
			return false;
		}
		return true;
	}

	@Override
	public Optional<Course> findOne(String id) {
		Optional<Course> course = Optional.empty();
		try {
			course = repo.findById(id);
		} catch (Exception exception) {
			Logger.getLogger(CourseServiceImpl.class.getName()).warning("Given id is null");
		}
		return course;
	}

	@Override
	public Course save(Course course) {
		return repo.save(course);
	}

	@Override
	public Optional<Course> findTopByOrderByModifiedDesc() {
		return Optional.ofNullable(repo.findTopByOrderByModifiedDesc());
	}
	
}
