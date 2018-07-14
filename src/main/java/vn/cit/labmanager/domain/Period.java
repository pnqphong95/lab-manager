package vn.cit.labmanager.domain;

import java.time.LocalDate;

import javax.persistence.Entity;
import javax.persistence.EnumType;
import javax.persistence.Enumerated;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;

import lombok.Data;

@Entity
@Data
public class Period {
	
	@Id
	@GeneratedValue
	private long id;
	
	@Enumerated(EnumType.STRING)
	private PeriodSemester semester;
	
	private int startYear;
	
	private int endYear;
	
	private LocalDate startDate;
	
	private int amountOfWeek;
}
