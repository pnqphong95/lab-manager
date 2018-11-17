package vn.cit.labmanager.app.weekofperiod;

import java.time.LocalDate;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface WeekOfPeriodRepository extends JpaRepository<WeekOfPeriod, String> {

	public WeekOfPeriod findTopByOrderByModifiedDesc();
	public WeekOfPeriod findByStartDateEqualsAndEndDateEquals(LocalDate start, LocalDate end);

}
