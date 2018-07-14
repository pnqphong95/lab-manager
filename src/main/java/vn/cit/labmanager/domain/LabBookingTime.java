package vn.cit.labmanager.domain;

import java.time.LocalDateTime;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.ManyToOne;

import com.fasterxml.jackson.annotation.JsonManagedReference;

import lombok.Data;

@Entity
@Data
public class LabBookingTime {
	
	@Id
	@GeneratedValue
	private long id;
	
	@ManyToOne
	@JsonManagedReference
	private LabBookingRequest bookRequest;
	
	private LocalDateTime bookDate;
	
	@ManyToOne
	private Shift bookShift;
	
	@ManyToOne
	private WeekOfPeriod weekBelongTo;
}
