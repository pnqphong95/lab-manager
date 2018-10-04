package vn.cit.labmanager.app.weekofperiod;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface WeekOfPeriodRepository extends JpaRepository<WeekOfPeriod, Long> {

}
