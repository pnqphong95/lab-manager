package vn.cit.labmanager.app.event.request;

import java.util.Set;

import lombok.Data;
import vn.cit.labmanager.app.course.Course;
import vn.cit.labmanager.app.lab.Lab;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriod;

@Data
public class EventRequestForm {
	private String id;
	private Course course;
	private Lab lab;
	private Set<WeekOfPeriod> weekOfPeriods;
}
