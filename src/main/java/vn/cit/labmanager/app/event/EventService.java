package vn.cit.labmanager.app.event;

import java.time.LocalDate;
import java.util.List;
import java.util.Optional;

public interface EventService {
	public List<Event> findAll();
	public boolean delete(String id);
	public Optional<Event> findOne(String id);
	public Event save(Event event);
	public Optional<Event> findTopByOrderByModifiedDesc();
	public List<Event> findByStartDateBetween(LocalDate from, LocalDate to);
}
