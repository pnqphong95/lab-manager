package vn.cit.labmanager.app.event.request.handler;

import java.util.List;

import vn.cit.labmanager.app.event.request.EventRequest;

public interface AdditionalEventRequestBuilder {
	List<EventRequest> build(EventRequest request);
}
