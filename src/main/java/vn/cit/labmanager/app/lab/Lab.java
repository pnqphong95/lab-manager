package vn.cit.labmanager.app.lab;

import java.util.HashSet;
import java.util.Set;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.JoinTable;
import javax.persistence.ManyToMany;
import javax.persistence.ManyToOne;
import javax.validation.constraints.NotBlank;

import org.hibernate.annotations.GenericGenerator;

import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.ToString;
import vn.cit.labmanager.app.department.Department;
import vn.cit.labmanager.app.tool.Tool;
import vn.cit.labmanager.config.auditing.AuditableEntity;

@Entity
@Data
@EqualsAndHashCode(callSuper = false, exclude = {"department"})
@ToString(exclude = {"department", "tools"})
public class Lab extends AuditableEntity {

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO, generator = "system-uuid")
	@GenericGenerator(name = "system-uuid", strategy = "uuid2")
	private String id;
	
	@Column(nullable = false)
	@NotBlank
	private String name;
	
	@Column(nullable = false)
	private int capacity;
	
	@Column(nullable = false)
	private int ramCapacity;
	
	@Column(nullable = false)
	private int diskCapacity;
	
	@Column(nullable = false)
	private String cpu;
	
	@Column(nullable = false)
	private String gpu;

	@ManyToOne(fetch = FetchType.LAZY)
	private Department department;

	@ManyToMany(fetch = FetchType.LAZY)
	@JoinTable(name = "lab_tools",
		joinColumns = { @JoinColumn(name = "lab_id") },
		inverseJoinColumns = { @JoinColumn(name = "tool_id") })
	private Set<Tool> tools = new HashSet<>();

}
