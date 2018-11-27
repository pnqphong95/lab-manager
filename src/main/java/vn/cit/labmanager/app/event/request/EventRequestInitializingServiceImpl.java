package vn.cit.labmanager.app.event.request;

import java.util.ArrayList;
import java.util.List;

public class EventRequestInitializingServiceImpl implements EventRequestInitializingService {

	@Override
	public List<EventRequest> from(EventRequestForm form) {
		List<EventRequest> requests = new ArrayList<>();
		form.getTimes().forEach(time -> {
			EventRequest request = new EventRequest();
			request.setCourse(form.getCourse());
			request.setStartDate(time.getStart());
			request.setShift(time.getShift());
			request.setNote(form.getNote());
			request.setWeekOfPeriod(time.getWop());
			requests.add(request);
		});
		return requests;
	}

}
