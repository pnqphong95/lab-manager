package vn.cit.labmanager.domain;

import java.time.LocalDate;

import javax.persistence.Entity;
import javax.persistence.FetchType;
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
	
	@ManyToOne(fetch = FetchType.LAZY)
	@JsonManagedReference
	private LabBookingRequest bookRequest;
	
	private LocalDate bookDate;
	
	@ManyToOne(fetch = FetchType.LAZY)
	private Shift bookShift;
	
	@ManyToOne
	private WeekOfPeriod weekBelongTo;
}
