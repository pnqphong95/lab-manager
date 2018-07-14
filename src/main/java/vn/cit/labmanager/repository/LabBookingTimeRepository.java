package vn.cit.labmanager.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import vn.cit.labmanager.domain.LabBookingTime;

@Repository
public interface LabBookingTimeRepository extends JpaRepository<LabBookingTime, Long> {

}
