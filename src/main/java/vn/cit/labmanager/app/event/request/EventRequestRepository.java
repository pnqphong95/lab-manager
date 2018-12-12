package vn.cit.labmanager.app.event.request;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import vn.cit.labmanager.app.user.User;

@Repository
public interface EventRequestRepository extends JpaRepository<EventRequest, String> {

	public EventRequest findTopByOrderByModifiedDesc();
	public List<EventRequest> findByCourseLecturer(User lecturer);

}