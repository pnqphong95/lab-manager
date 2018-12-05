package vn.cit.labmanager.app.event.request.handler;

import vn.cit.labmanager.app.event.request.form.EventRequestForm;

public interface EventRequestDelegator {
	public void delegate(EventRequestForm requestForm);
}
