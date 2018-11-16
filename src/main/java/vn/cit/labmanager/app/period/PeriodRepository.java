package vn.cit.labmanager.app.period;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface PeriodRepository extends JpaRepository<Period, String> {

	public Period findTopByOrderByModifiedDesc();

}
