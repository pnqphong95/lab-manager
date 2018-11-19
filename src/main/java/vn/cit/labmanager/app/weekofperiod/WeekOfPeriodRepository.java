package vn.cit.labmanager.app.weekofperiod;

import java.time.LocalDate;
import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import vn.cit.labmanager.app.period.Period;

@Repository
public interface WeekOfPeriodRepository extends JpaRepository<WeekOfPeriod, String> {

	public WeekOfPeriod findTopByOrderByModifiedDesc();
	public WeekOfPeriod findByStartDateEqualsAndEndDateEquals(LocalDate start, LocalDate end);
	public List<WeekOfPeriod> findByPeriodBelongTo(Period period);

}
