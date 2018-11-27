package vn.cit.labmanager.app.event.request;

import java.util.ArrayList;
import java.util.List;

import lombok.Data;
import vn.cit.labmanager.app.course.Course;

@Data
public class EventRequestForm {
	private String id;
	private Course course;
	private String note;
	private List<EventTimeForm> times = new ArrayList<>();
	
	public void addEvent(EventTimeForm time) {
		times.add(time);
	}

}
