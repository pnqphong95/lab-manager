package vn.cit.labmanager.app.bookrequest;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface LabBookingRequestRepository extends JpaRepository<LabBookingRequest, Long> {

}
