package vn.cit.labmanager.app.event.request;

import java.util.List;

import vn.cit.labmanager.app.event.request.form.EventRequestForm;

public interface EventRequestInitializingService {
	public List<EventRequest> from(EventRequestForm form);
}
