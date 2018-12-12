package vn.cit.labmanager.app.event.request;

import java.time.LocalDate;
import java.util.HashSet;
import java.util.Set;

import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.JoinTable;
import javax.persistence.ManyToMany;
import javax.persistence.ManyToOne;
import javax.persistence.Transient;

import org.hibernate.annotations.GenericGenerator;
import org.springframework.format.annotation.DateTimeFormat;
import org.springframework.format.annotation.DateTimeFormat.ISO;

import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.ToString;
import vn.cit.labmanager.app.course.Course;
import vn.cit.labmanager.app.event.DayOfWeekVi;
import vn.cit.labmanager.app.lab.Lab;
import vn.cit.labmanager.app.shift.Shift;
import vn.cit.labmanager.app.tool.Tool;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriod;
import vn.cit.labmanager.config.auditing.AuditableEntity;

@Entity
@Data
@EqualsAndHashCode(callSuper = false)
@ToString(exclude = {"tools"})
public class EventRequest extends AuditableEntity {
	
	@Id
    @GeneratedValue(strategy = GenerationType.AUTO, generator = "system-uuid")
    @GenericGenerator(name = "system-uuid", strategy = "uuid2")
	private String id;
	
	@ManyToOne(fetch = FetchType.LAZY)
	private Course course;
	
	@ManyToOne(fetch = FetchType.LAZY)
	private Lab lab;
	
	@ManyToMany(fetch = FetchType.LAZY)
	@JoinTable(name = "request_tools",
		joinColumns = { @JoinColumn(name = "request_id") },
		inverseJoinColumns = { @JoinColumn(name = "tool_id") })
	private Set<Tool> tools = new HashSet<>();

	@DateTimeFormat(iso = ISO.DATE)
	private LocalDate startDate;
	
	@ManyToOne(fetch = FetchType.LAZY)
	private Shift shift;

	private String note;
	
	@Transient
	private DayOfWeekVi dow;
	
	@Transient
	private boolean available = false;
	
	@ManyToOne(fetch = FetchType.LAZY)
	private WeekOfPeriod weekOfPeriod;
	
	public DayOfWeekVi getDayOfWeekVi() {
		return startDate != null ? DayOfWeekVi.from(startDate.getDayOfWeek()) : null;
	}

}
