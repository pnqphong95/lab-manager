package vn.cit.labmanager.app.period;

import java.time.LocalDate;
import java.util.List;

import org.springframework.data.domain.Sort;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface PeriodRepository extends JpaRepository<Period, String> {

	public Period findTopByOrderByModifiedDesc();
	public Period findByStartDateLessThanEqualAndEndDateGreaterThanEqual(LocalDate dateOne, LocalDate dateTwo);
	public Period findByStartYearAndSemester(int startYear, PeriodSemester semester);
	public List<Period> findByEndDateGreaterThanEqual(LocalDate date);
	public List<Period> findByEndDateGreaterThanEqual(LocalDate date, Sort sort);

}
