package vn.cit.labmanager.app.weekofperiod;

import java.time.LocalDate;
import java.util.List;
import java.util.Optional;

import vn.cit.labmanager.app.period.Period;

public interface WeekOfPeriodService {
	public List<WeekOfPeriod> findAll();
	public boolean delete(String id);
	public Optional<WeekOfPeriod> findOne(String id);
	public WeekOfPeriod save(WeekOfPeriod weekOfPeriod);
	public Optional<WeekOfPeriod> findTopByOrderByModifiedDesc();
	public Optional<WeekOfPeriod> findByDateRange(LocalDate from, LocalDate to);
	public List<WeekOfPeriod> findByPeriod(Period period);
	public List<WeekOfPeriod> findByPeriodStartDate(LocalDate startDate);
}
