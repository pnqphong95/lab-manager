package vn.cit.labmanager.app.booktime;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface LabBookingTimeRepository extends JpaRepository<LabBookingTime, Long> {

}
