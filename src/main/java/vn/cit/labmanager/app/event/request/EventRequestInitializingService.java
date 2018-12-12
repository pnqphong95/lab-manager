package vn.cit.labmanager.app.event.request;

import java.util.List;

import vn.cit.labmanager.app.event.request.form.EventRequestForm;
import vn.cit.labmanager.app.event.request.form.EventTimeForm;

public interface EventRequestInitializingService {
	public List<EventRequest> from(EventRequestForm form);
	public EventRequest from(EventRequestForm form, EventTimeForm time);
}
