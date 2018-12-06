package vn.cit.labmanager.app.statistic;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.app.event.Event;
import vn.cit.labmanager.app.event.EventService;
import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriod;

@Service
public class EventStatisticServiceImpl implements EventStatisticService {

	@Autowired
	private EventService eventService;
	
	@Override
	public EventStatistic generateBy(List<Event> events, Period period) {
		EventStatistic statistic = new EventStatistic();
		for(WeekOfPeriod wop : period.getWeekOfPeriods()) {
			statistic.getLabelDatas().put(String.valueOf(wop.getNumOrder()), eventService.countByWeekOfPeriod(wop));
		}
		return statistic;
	}

}
