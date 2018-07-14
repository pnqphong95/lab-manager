package vn.cit.labmanager.domain;

import java.util.Date;
import java.util.HashSet;
import java.util.Set;

import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

import com.fasterxml.jackson.annotation.JsonBackReference;

import lombok.Data;

@Entity
@Data
public class LabBookingRequest {

	@Id
	@GeneratedValue
	private long id;

	@ManyToOne
	private Lab bookLab;

	@OneToMany(fetch = FetchType.EAGER)
	@JsonBackReference
	private Set<LabBookingTime> bookTimes = new HashSet<>();

	private String bookCourse;

	@Temporal(TemporalType.TIMESTAMP)
	private Date createdDate;

}
