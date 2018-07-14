package vn.cit.labmanager.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import vn.cit.labmanager.domain.WeekOfPeriod;

@Repository
public interface WeekOfPeriodRepository extends JpaRepository<WeekOfPeriod, Long> {

}
