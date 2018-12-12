package vn.cit.labmanager.app.event.request;

import java.util.List;
import java.util.Optional;

import vn.cit.labmanager.app.user.User;

public interface EventRequestService {
	public List<EventRequest> findAll();
	public boolean delete(String id);
	public Optional<EventRequest> findOne(String id);
	public EventRequest save(EventRequest eventRequest);
	public List<EventRequest> save(List<EventRequest> eventRequests);
	public Optional<EventRequest> findTopByOrderByModifiedDesc();
	public List<EventRequest> findByCourseLecturer(User lecturer);
}
