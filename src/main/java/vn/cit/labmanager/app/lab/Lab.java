package vn.cit.labmanager.app.lab;

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

import org.hibernate.annotations.GenericGenerator;
import org.hibernate.annotations.OnDelete;
import org.hibernate.annotations.OnDeleteAction;

import com.fasterxml.jackson.annotation.JsonIgnore;

import lombok.Data;
import lombok.EqualsAndHashCode;
import vn.cit.labmanager.app.department.Department;
import vn.cit.labmanager.app.tool.Tool;
import vn.cit.labmanager.config.auditing.AuditableEntity;

@Entity
@Data
@EqualsAndHashCode(callSuper = false)
public class Lab extends AuditableEntity {
	
	@Id
    @GeneratedValue(strategy = GenerationType.AUTO, generator = "system-uuid")
    @GenericGenerator(name = "system-uuid", strategy = "uuid2")
	private String id;
	private String name;
	private int ramCapacity;
	private int diskCapacity;
	private String cpu;
	private String gpu;
	
	@ManyToOne(fetch = FetchType.LAZY, optional = false)
    @JoinColumn(name = "department_id", nullable = false)
    @OnDelete(action = OnDeleteAction.CASCADE)
    @JsonIgnore
	private Department department;

	@ManyToMany(fetch = FetchType.LAZY)
    @JoinTable(name = "lab_tools",
    	joinColumns = { @JoinColumn(name = "lab_id") },
        inverseJoinColumns = { @JoinColumn(name = "tool_id") })
    private Set<Tool> tools = new HashSet<>();
}
