package vn.cit.labmanager.app.event;

import java.time.LocalDate;
import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface EventRepository extends JpaRepository<Event, String> {

	public Event findTopByOrderByModifiedDesc();
	public List<Event> findByStartDateGreaterThanEqualAndStartDateLessThanEqual(LocalDate dateOne, LocalDate dateTwo);

}
