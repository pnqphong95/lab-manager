package vn.cit.labmanager.app.department;

import java.util.ArrayList;
import java.util.List;

import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.PreRemove;
import javax.validation.constraints.NotBlank;

import org.hibernate.annotations.GenericGenerator;

import lombok.Data;
import lombok.EqualsAndHashCode;
import vn.cit.labmanager.app.lab.Lab;
import vn.cit.labmanager.app.user.User;
import vn.cit.labmanager.config.auditing.AuditableEntity;

@Entity
@Data
@EqualsAndHashCode(callSuper = false)
public class Department extends AuditableEntity {
	
	@Id
    @GeneratedValue(strategy = GenerationType.AUTO, generator = "system-uuid")
    @GenericGenerator(name = "system-uuid", strategy = "uuid2")
	private String id;

	@Column(nullable = false)
	@NotBlank
	private String name;

	@OneToMany(mappedBy = "department", cascade = {CascadeType.PERSIST, CascadeType.MERGE})
	private List<Lab> labs = new ArrayList<>();
	
	@OneToMany(mappedBy = "department", cascade = {CascadeType.PERSIST, CascadeType.MERGE})
	private List<User> users = new ArrayList<>();

	@PreRemove
	private void preRemove() {
		for(Lab lab : labs) {
			lab.setDepartment(null);
		}
		for(User user : users) {
			user.setDepartment(null);
		}
	}

}
