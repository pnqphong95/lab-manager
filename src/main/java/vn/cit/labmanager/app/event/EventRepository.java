package vn.cit.labmanager.app.event;

import java.time.LocalDate;
import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import vn.cit.labmanager.app.lab.Lab;
import vn.cit.labmanager.app.shift.Shift;

@Repository
public interface EventRepository extends JpaRepository<Event, String> {

	public Event findTopByOrderByModifiedDesc();
	public List<Event> findByStartDateGreaterThanEqualAndStartDateLessThanEqual(LocalDate dateOne, LocalDate dateTwo);
	public List<Event> findByLabInAndStartDateEqualsAndShiftEquals(List<Lab> labs, LocalDate startDate, Shift shift);

}