package vn.cit.labmanager.app.period;

import java.time.LocalDate;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface PeriodRepository extends JpaRepository<Period, String> {

	public Period findTopByOrderByModifiedDesc();
	public Period findByStartDateLessThanEqualAndEndDateGreaterThanEqual(LocalDate dateOne, LocalDate dateTwo);
	public Period findByStartYearAndSemester(int startYear, PeriodSemester semester);

}
