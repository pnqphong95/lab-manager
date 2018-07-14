package vn.cit.labmanager.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import vn.cit.labmanager.domain.LabBookingRequest;

@Repository
public interface LabBookingRequestRepository extends JpaRepository<LabBookingRequest, Long> {

}
