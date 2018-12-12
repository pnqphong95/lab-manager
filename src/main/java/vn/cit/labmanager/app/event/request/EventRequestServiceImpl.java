package vn.cit.labmanager.app.event.request;

import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.app.user.User;

@Service
public class EventRequestServiceImpl implements EventRequestService {

	@Autowired
	private EventRequestRepository repo;

	@Override
	public List<EventRequest> findAll() {
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
	public Optional<EventRequest> findOne(String id) {
		Optional<EventRequest> eventRequest = Optional.empty();
		try {
			eventRequest = repo.findById(id);
		} catch (Exception exception) {
			Logger.getLogger(EventRequestServiceImpl.class.getName()).warning("Given id is null");
		}
		return eventRequest;
	}

	@Override
	public EventRequest save(EventRequest eventRequest) {
		return repo.save(eventRequest);
	}

	@Override
	public Optional<EventRequest> findTopByOrderByModifiedDesc() {
		return Optional.ofNullable(repo.findTopByOrderByModifiedDesc());
	}

	@Override
	public List<EventRequest> save(List<EventRequest> eventRequests) {
		return repo.saveAll(eventRequests);
	}

	@Override
	public List<EventRequest> findByCourseLecturer(User lecturer) {
		if (lecturer == null) {
			return null;
		}
		return repo.findByCourseLecturer(lecturer);
	}

}
