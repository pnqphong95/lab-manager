package vn.cit.labmanager.app.period;

import java.time.DayOfWeek;
import java.time.LocalDate;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Sort;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.app.weekofperiod.WeekOfPeriod;

@Service
public class PeriodServiceImpl implements PeriodService {

	@Autowired
	private PeriodRepository repo;

	@Override
	public List<Period> findAll() {
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
	public Optional<Period> findOne(String id) {
		Optional<Period> period = Optional.empty();
		try {
			period = repo.findById(id);
		} catch (Exception exception) {
			Logger.getLogger(PeriodServiceImpl.class.getName()).warning("Given id is null");
		}
		return period;
	}

	@Override
	public Period save(Period period) {
		period.setEndDate(period.getStartDate().with(DayOfWeek.SUNDAY).plusWeeks(period.getAmountOfWeek() - 1));
		period.setWeekOfPeriods(new ArrayList<>());
		period.getWeekOfPeriods().add(getFirstWeekOfPeriod(period));
		
		LocalDate startDate = period.getStartDate().with(DayOfWeek.SUNDAY).plusDays(1);
		for(int i = 2; i <= period.getAmountOfWeek(); i++) {
			WeekOfPeriod weekOfPeriod = new WeekOfPeriod();
			weekOfPeriod.setNumOrder(i);
			weekOfPeriod.setStartDate(startDate);
			weekOfPeriod.setEndDate(startDate.with(DayOfWeek.SUNDAY));
			weekOfPeriod.setPeriodBelongTo(period);
			period.getWeekOfPeriods().add(weekOfPeriod);
			startDate = startDate.plusWeeks(1);
		}
		return repo.save(period);
	}

	private WeekOfPeriod getFirstWeekOfPeriod(Period period) {
		WeekOfPeriod weekOfPeriod = new WeekOfPeriod();
		weekOfPeriod.setNumOrder(1);
		weekOfPeriod.setStartDate(period.getStartDate());
		weekOfPeriod.setEndDate(period.getStartDate().with(DayOfWeek.SUNDAY));
		weekOfPeriod.setPeriodBelongTo(period);
		return weekOfPeriod;
	}

	@Override
	public Optional<Period> findTopByOrderByModifiedDesc() {
		return Optional.ofNullable(repo.findTopByOrderByModifiedDesc());
	}

	@Override
	public Optional<Period> findBySpecifiedDate(LocalDate localDate) {
		return Optional.ofNullable(repo.findByStartDateLessThanEqualAndEndDateGreaterThanEqual(localDate, localDate));
	}

	@Override
	public Optional<Period> findByStartYearAndSemester(int startYear, PeriodSemester semester) {
		return Optional.ofNullable(repo.findByStartYearAndSemester(startYear, semester));
	}

	@Override
	public Optional<Period> findCurrentPeriod() {
		return this.findBySpecifiedDate(LocalDate.now());
	}

	@Override
	public List<Period> findAvailablePeriod(Sort sort) {
		return repo.findByEndDateGreaterThanEqual(LocalDate.now(), sort);
	}

	@Override
	public List<Period> findAvailablePeriod() {
		return repo.findByEndDateGreaterThanEqual(LocalDate.now());
	}
	
}
