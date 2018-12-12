package vn.cit.labmanager.app.event.request;

import java.util.ArrayList;
import java.util.List;

import org.springframework.stereotype.Service;

import vn.cit.labmanager.app.event.request.form.EventRequestForm;
import vn.cit.labmanager.app.event.request.form.EventTimeForm;

@Service
public class EventRequestInitializingServiceImpl implements EventRequestInitializingService {

	@Override
	public List<EventRequest> from(EventRequestForm form) {
		List<EventRequest> requests = new ArrayList<>();
		form.getTimes().forEach(time -> {
			requests.add(this.from(form, time));
		});
		return requests;
	}

	@Override
	public EventRequest from(EventRequestForm form, EventTimeForm time) {
		if (time == null) {
			return null;
		}
		EventRequest request = new EventRequest();
		request.setCourse(form.getCourse());
		request.setTools(form.getTools());
		request.setShift(time.getShift());
		request.setNote(form.getNote());
		request.setWeekOfPeriod(time.getWop());
		if (time.getDow() != null) {
			request.setStartDate(time.getWop().getStartDate().with(time.getDow().getDayOfWeek()));
		}
		return request;
	}

}
