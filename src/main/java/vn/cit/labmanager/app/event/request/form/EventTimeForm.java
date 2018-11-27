package vn.cit.labmanager.app.event.request.form;

import java.time.LocalDate;

import org.springframework.format.annotation.DateTimeFormat;
import org.springframework.format.annotation.DateTimeFormat.ISO;

import lombok.Data;
import vn.cit.labmanager.app.shift.Shift;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriod;

@Data
public class EventTimeForm {
	private WeekOfPeriod wop;
	
	@DateTimeFormat(iso = ISO.DATE)
	private LocalDate start;
	private Shift shift;
}
