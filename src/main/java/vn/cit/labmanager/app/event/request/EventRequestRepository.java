package vn.cit.labmanager.app.event.request;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface EventRequestRepository extends JpaRepository<EventRequest, String> {

	public EventRequest findTopByOrderByModifiedDesc();

}