package vn.cit.labmanager.app.event.request.form;

import lombok.Data;
import vn.cit.labmanager.app.event.DayOfWeekVi;
import vn.cit.labmanager.app.shift.Shift;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriod;

@Data
public class EventTimeForm {
	private WeekOfPeriod wop;
	private DayOfWeekVi dow;
	private Shift shift;
}
