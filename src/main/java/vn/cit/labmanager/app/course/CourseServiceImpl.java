package vn.cit.labmanager.app.course;

import java.time.LocalDate;
import java.util.Collections;
import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.period.PeriodRepository;
import vn.cit.labmanager.app.user.User;

@Service
public class CourseServiceImpl implements CourseService {

	@Autowired
	private CourseRepository repo;
	
	@Autowired
	private PeriodRepository periodRepo;

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

	@Override
	public Optional<Course> findByCourseIdAndPeriodBelongTo(String id, String periodId) {
		Optional<Period> period = periodRepo.findById(periodId);
		if (period.isPresent()) {
			return Optional.ofNullable(repo.findByCourseIdAndPeriodBelongTo(id, period.get()));
		}
		return Optional.empty();
	}

	@Override
	public List<Course> findByLecturerAndCurrentPeriod(User lecturer) {
		LocalDate now = LocalDate.now();
		Optional<Period> period = Optional.ofNullable(periodRepo.findByStartDateLessThanEqualAndEndDateGreaterThanEqual(now, now));
		if (period.isPresent()) {
			return repo.findByLecturerAndPeriodBelongTo(lecturer, period.get());
		}
		return Collections.emptyList();
	}
	
}
