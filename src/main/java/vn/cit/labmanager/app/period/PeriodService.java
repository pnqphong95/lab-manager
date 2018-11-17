package vn.cit.labmanager.app.period;

import java.time.LocalDate;
import java.util.List;
import java.util.Optional;

public interface PeriodService {
	public List<Period> findAll();
	public boolean delete(String id);
	public Optional<Period> findOne(String id);
	public Period save(Period period);
	public Optional<Period> findTopByOrderByModifiedDesc();
	public Optional<Period> findBySpecifiedDate(LocalDate date);
}
