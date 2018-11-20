package vn.cit.labmanager.app.course;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToOne;

import org.hibernate.annotations.GenericGenerator;

import lombok.Data;
import lombok.EqualsAndHashCode;
import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.subject.Subject;
import vn.cit.labmanager.app.user.User;
import vn.cit.labmanager.config.auditing.AuditableEntity;

@Entity
@Data
@EqualsAndHashCode(callSuper = false)
public class Course extends AuditableEntity {

	@Id
    @GeneratedValue(strategy = GenerationType.AUTO, generator = "system-uuid")
    @GenericGenerator(name = "system-uuid", strategy = "uuid2")
	private String id;
	private String courseId;

	@ManyToOne
	private Period periodBelongTo;

	@ManyToOne
	private User lecturer;

	@ManyToOne
	private Subject subject;

	private int amountOfStudent;

}