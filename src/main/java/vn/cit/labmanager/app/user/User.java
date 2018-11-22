package vn.cit.labmanager.app.user;

import java.time.LocalDate;
import java.util.HashSet;
import java.util.Set;

import javax.persistence.CollectionTable;
import javax.persistence.Column;
import javax.persistence.ElementCollection;
import javax.persistence.Entity;
import javax.persistence.EnumType;
import javax.persistence.Enumerated;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.validation.constraints.NotBlank;

import org.hibernate.annotations.GenericGenerator;
import org.hibernate.validator.constraints.Length;
import org.springframework.format.annotation.DateTimeFormat;

import lombok.Data;
import lombok.EqualsAndHashCode;
import vn.cit.labmanager.app.department.Department;
import vn.cit.labmanager.config.auditing.AuditableEntity;

@Entity
@Data
@EqualsAndHashCode(callSuper = false)
public class User extends AuditableEntity {
	@Id
    @GeneratedValue(strategy = GenerationType.AUTO, generator = "system-uuid")
    @GenericGenerator(name = "system-uuid", strategy = "uuid2")
	private String id;
	
	@Column(unique = true, nullable = false)
	@NotBlank
	@Length(max = 50)
	private String username;
	
	@Column(unique = true, nullable = false)
	@NotBlank
	private String userId;

	@Column(nullable = false)
	@NotBlank
	private String fullName;
	
	@DateTimeFormat(iso = DateTimeFormat.ISO.DATE)
	private LocalDate dob;

	@Column(nullable = false)
	@NotBlank
	private String phoneNumber;

	@Column(unique = true, nullable = false)
	@NotBlank
	private String email;

	@ManyToOne(fetch = FetchType.LAZY)
	private Department department;

	@Enumerated(EnumType.STRING)
	@ElementCollection(targetClass = Role.class, fetch = FetchType.EAGER) 
	@CollectionTable(name = "user_roles", joinColumns = @JoinColumn(name = "user_id"))
	@Column(name = "role_key")
	private Set<Role> roles = new HashSet<>();

	@Column(nullable = false)
	private boolean active;

}
