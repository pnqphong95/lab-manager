package vn.cit.labmanager.app.statistic;

import java.util.List;

import vn.cit.labmanager.app.event.Event;
import vn.cit.labmanager.app.period.Period;

public interface EventStatisticService {
	public EventStatistic generateBy(List<Event> events, Period period);
}
