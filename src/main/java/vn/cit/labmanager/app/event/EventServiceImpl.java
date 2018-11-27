package vn.cit.labmanager.app.event;

import java.time.LocalDate;
import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class EventServiceImpl implements EventService {

	@Autowired
	private EventRepository repo;

	@Override
	public List<Event> findAll() {
		return repo.findAll();
	}

	@Override
	public boolean delete(String id) {
		try {
			repo.deleteById(id);
		} catch (Exception exception) {
			return false;
		}
		return true;
	}

	@Override
	public Optional<Event> findOne(String id) {
		Optional<Event> event = Optional.empty();
		try {
			event = repo.findById(id);
		} catch (Exception exception) {
			Logger.getLogger(EventServiceImpl.class.getName()).warning("Given id is null");
		}
		return event;
	}

	@Override
	public Event save(Event event) {
		return repo.save(event);
	}

	@Override
	public Optional<Event> findTopByOrderByModifiedDesc() {
		return Optional.ofNullable(repo.findTopByOrderByModifiedDesc());
	}

	@Override
	public List<Event> findByStartDateBetween(LocalDate from, LocalDate to) {
		return repo.findByStartDateGreaterThanEqualAndStartDateLessThanEqual(from, to);
	}

}
