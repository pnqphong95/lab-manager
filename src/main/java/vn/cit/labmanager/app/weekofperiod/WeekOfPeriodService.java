package vn.cit.labmanager.app.weekofperiod;

import java.time.LocalDate;
import java.util.List;
import java.util.Optional;

public interface WeekOfPeriodService {
	public List<WeekOfPeriod> findAll();
	public boolean delete(String id);
	public Optional<WeekOfPeriod> findOne(String id);
	public WeekOfPeriod save(WeekOfPeriod weekOfPeriod);
	public Optional<WeekOfPeriod> findTopByOrderByModifiedDesc();
	public Optional<WeekOfPeriod> findByDateRange(LocalDate from, LocalDate to);
}
