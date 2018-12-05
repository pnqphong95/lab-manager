package vn.cit.labmanager.app.event.request;

import java.util.ArrayList;
import java.util.List;

import org.springframework.stereotype.Service;

import vn.cit.labmanager.app.event.request.form.EventRequestForm;

@Service
public class EventRequestInitializingServiceImpl implements EventRequestInitializingService {

	@Override
	public List<EventRequest> from(EventRequestForm form) {
		List<EventRequest> requests = new ArrayList<>();
		form.getTimes().forEach(time -> {
			EventRequest request = new EventRequest();
			request.setCourse(form.getCourse());
			request.setTools(form.getTools());
			request.setStartDate(time.getStart());
			request.setShift(time.getShift());
			request.setNote(form.getNote());
			request.setWeekOfPeriod(time.getWop());
			requests.add(request);
		});
		return requests;
	}

}
