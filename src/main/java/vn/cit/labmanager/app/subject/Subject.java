package vn.cit.labmanager.app.subject;

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

import org.hibernate.annotations.GenericGenerator;

import lombok.Data;
import lombok.EqualsAndHashCode;
import vn.cit.labmanager.app.tool.Tool;
import vn.cit.labmanager.config.auditing.AuditableEntity;

@Entity
@Data
@EqualsAndHashCode(callSuper = false)
public class Subject extends AuditableEntity {
	
	@Id
    @GeneratedValue(strategy = GenerationType.AUTO, generator = "system-uuid")
    @GenericGenerator(name = "system-uuid", strategy = "uuid2")
	private String id;
	private String subjectId;
	private String name;
	private int weight;
	
	@ManyToMany(fetch = FetchType.LAZY)
	@JoinTable(name = "subject_tools",
		joinColumns = { @JoinColumn(name = "subject_id") },
		inverseJoinColumns = { @JoinColumn(name = "tool_id") })
	private Set<Tool> tools = new HashSet<>();

}