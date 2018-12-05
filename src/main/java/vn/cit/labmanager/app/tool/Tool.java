package vn.cit.labmanager.app.tool;

import java.util.ArrayList;
import java.util.List;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToMany;
import javax.persistence.PreRemove;
import javax.validation.constraints.NotBlank;

import org.hibernate.annotations.GenericGenerator;

import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.ToString;
import vn.cit.labmanager.app.event.request.EventRequest;
import vn.cit.labmanager.app.lab.Lab;
import vn.cit.labmanager.app.subject.Subject;
import vn.cit.labmanager.config.auditing.AuditableEntity;

@Entity
@Data
@EqualsAndHashCode(callSuper = false)
@ToString(exclude = {"eventRequests", "subjects", "labs"})
public class Tool extends AuditableEntity {
	
	@Id
    @GeneratedValue(strategy = GenerationType.AUTO, generator = "system-uuid")
    @GenericGenerator(name = "system-uuid", strategy = "uuid2")
	private String id;
	
	@Column(nullable = false)
	@NotBlank
	private String name;
	private String version;
	
	@ManyToMany(mappedBy="tools")
	private List<Lab> labs = new ArrayList<>();
	
	@ManyToMany(mappedBy="tools")
	private List<Subject> subjects = new ArrayList<>();
	
	@ManyToMany(mappedBy="tools")
	private List<EventRequest> eventRequests = new ArrayList<>();
	
	@PreRemove
	private void preRemove() {
		for(Lab lab : labs) {
			lab.getTools().removeIf(this::equals);
		}
		for(Subject subject : subjects) {
			subject.getTools().removeIf(this::equals);
		}
		for(EventRequest eventRequest : eventRequests) {
			eventRequest.getTools().removeIf(this::equals);
		}
	}

}