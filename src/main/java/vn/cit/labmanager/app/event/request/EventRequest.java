package vn.cit.labmanager.app.event.request;

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
import vn.cit.labmanager.app.lab.Lab;
import vn.cit.labmanager.app.shift.Shift;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriod;
import vn.cit.labmanager.config.auditing.AuditableEntity;

@Entity
@Data
@EqualsAndHashCode(callSuper = false)
public class EventRequest extends AuditableEntity {
	
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

	private String note;
	
	@ManyToOne(fetch = FetchType.LAZY)
	private WeekOfPeriod weekOfPeriod;

}
