package vn.cit.labmanager.app.event.request.handler;

import java.util.List;

import vn.cit.labmanager.app.event.request.EventRequest;
import vn.cit.labmanager.app.event.request.form.EventRequestForm;
import vn.cit.labmanager.app.lab.Lab;

public interface EventRequestDelegator {
	public void delegate(EventRequestForm requestForm);
	public List<Lab> getAvailableLab(EventRequest request);
}
