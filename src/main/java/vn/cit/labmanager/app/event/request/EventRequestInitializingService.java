package vn.cit.labmanager.app.event.request;

import java.util.List;

public interface EventRequestInitializingService {
	public List<EventRequest> from(EventRequestForm form);
}
