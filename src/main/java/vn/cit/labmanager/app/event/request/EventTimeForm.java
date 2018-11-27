package vn.cit.labmanager.app.event.request;

import java.time.LocalDate;

import lombok.Data;
import vn.cit.labmanager.app.shift.Shift;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriod;

@Data
public class EventTimeForm {
	private WeekOfPeriod wop;
	private LocalDate start;
	private Shift shift;
}
