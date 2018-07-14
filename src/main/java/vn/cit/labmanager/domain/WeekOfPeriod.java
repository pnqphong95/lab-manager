package vn.cit.labmanager.domain;

import java.time.LocalDateTime;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.ManyToOne;

import lombok.Data;

@Entity
@Data
public class WeekOfPeriod {
	
	@Id
	@GeneratedValue
	private long id;
	
	private int numOrder;
	
	private LocalDateTime startDate;
	
	private LocalDateTime endDate;
	
	@ManyToOne
	private Period periodBelongTo;
	
}
