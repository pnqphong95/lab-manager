package vn.cit.labmanager.app.weekofperiod;

import java.time.LocalDate;
import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class WeekOfPeriodServiceImpl implements WeekOfPeriodService {

	@Autowired
	private WeekOfPeriodRepository repo;

	@Override
	public List<WeekOfPeriod> findAll() {
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
	public Optional<WeekOfPeriod> findOne(String id) {
		Optional<WeekOfPeriod> weekOfPeriod = Optional.empty();
		try {
			weekOfPeriod = repo.findById(id);
		} catch (Exception exception) {
			Logger.getLogger(WeekOfPeriodServiceImpl.class.getName()).warning("Given id is null");
		}
		return weekOfPeriod;
	}

	@Override
	public WeekOfPeriod save(WeekOfPeriod weekOfPeriod) {
		return repo.save(weekOfPeriod);
	}

	@Override
	public Optional<WeekOfPeriod> findTopByOrderByModifiedDesc() {
		return Optional.ofNullable(repo.findTopByOrderByModifiedDesc());
	}

	@Override
	public Optional<WeekOfPeriod> findByDateRange(LocalDate from, LocalDate to) {
		return Optional.ofNullable(repo.findByStartDateEqualsAndEndDateEquals(from, to));
	}

}
