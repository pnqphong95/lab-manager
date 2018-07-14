package vn.cit.labmanager.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import vn.cit.labmanager.domain.Period;

@Repository
public interface PeriodRepository extends JpaRepository<Period, Long> {

}
