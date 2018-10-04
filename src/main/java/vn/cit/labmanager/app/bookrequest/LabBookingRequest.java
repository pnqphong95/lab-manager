package vn.cit.labmanager.app.bookrequest;

import java.util.Date;
import java.util.HashSet;
import java.util.Set;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

import com.fasterxml.jackson.annotation.JsonBackReference;

import lombok.Data;
import lombok.EqualsAndHashCode;
import vn.cit.labmanager.app.booktime.LabBookingTime;
import vn.cit.labmanager.app.lab.Lab;

@Entity
@Data
public class LabBookingRequest {

	@Id
	@GeneratedValue
	private long id;

	@ManyToOne
	private Lab bookLab;

	@JsonBackReference
	@EqualsAndHashCode.Exclude
	@OneToMany
	@JoinColumn(name = "book_request_id")
	private Set<LabBookingTime> bookTimes = new HashSet<>();

	private String bookCourse;

	@Temporal(TemporalType.TIMESTAMP)
	private Date createdDate;

}
