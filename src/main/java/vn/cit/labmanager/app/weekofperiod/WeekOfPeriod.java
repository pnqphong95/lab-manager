package vn.cit.labmanager.app.weekofperiod;

import java.time.LocalDate;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToOne;

import org.hibernate.annotations.GenericGenerator;

import lombok.Data;
import lombok.EqualsAndHashCode;
import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.config.auditing.AuditableEntity;

@Entity
@Data
@EqualsAndHashCode(callSuper = false)
public class WeekOfPeriod extends AuditableEntity {
	
	@Id
    @GeneratedValue(strategy = GenerationType.AUTO, generator = "system-uuid")
    @GenericGenerator(name = "system-uuid", strategy = "uuid2")
	private String id;
	
	private int numOrder;
	
	private LocalDate startDate;
	
	private LocalDate endDate;
	
	@ManyToOne
	private Period periodBelongTo;
	
	public boolean isCurrent() {
		LocalDate current = LocalDate.now();
		return (startDate.isBefore(current) || startDate.isEqual(current)) && (endDate.isAfter(current) || endDate.isEqual(current));
	}
	
}
