package vn.cit.labmanager.app.event.request.form;

import java.util.ArrayList;
import java.util.List;
import java.util.Set;

import lombok.Data;
import vn.cit.labmanager.app.course.Course;
import vn.cit.labmanager.app.tool.Tool;

@Data
public class EventRequestForm {
	private String id;
	private Course course;
	private String note;
	private Set<Tool> tools;
	private List<EventTimeForm> times = new ArrayList<>();
	
	public void addEvent(EventTimeForm time) {
		times.add(time);
	}

}
