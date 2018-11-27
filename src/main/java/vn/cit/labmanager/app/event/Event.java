package vn.cit.labmanager.app.event;

import java.time.LocalDate;

import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToOne;

import org.hibernate.annotations.GenericGenerator;

import lombok.Data;
import lombok.EqualsAndHashCode;
import vn.cit.labmanager.app.course.Course;
import vn.cit.labmanager.app.event.request.EventRequest;
import vn.cit.labmanager.app.lab.Lab;
import vn.cit.labmanager.app.shift.Shift;
import vn.cit.labmanager.config.auditing.AuditableEntity;

@Entity
@Data
@EqualsAndHashCode(callSuper = false)
public class Event extends AuditableEntity {
	
	@Id
    @GeneratedValue(strategy = GenerationType.AUTO, generator = "system-uuid")
    @GenericGenerator(name = "system-uuid", strategy = "uuid2")
	private String id;
	
	@ManyToOne(fetch = FetchType.LAZY)
	private Course course;
	
	@ManyToOne(fetch = FetchType.LAZY)
	private Lab lab;

	private LocalDate startDate;
	
	@ManyToOne(fetch = FetchType.LAZY)
	private Shift shift;

	public static Event from(EventRequest request) {
		Event event = new Event();
		event.setCourse(request.getCourse());
		event.setLab(request.getLab());
		event.setShift(request.getShift());
		event.setStartDate(request.getStartDate());
		return event;
	}
}
