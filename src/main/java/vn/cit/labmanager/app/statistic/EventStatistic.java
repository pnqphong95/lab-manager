package vn.cit.labmanager.app.statistic;

import java.util.HashMap;
import java.util.Map;

import lombok.Data;

@Data
public class EventStatistic {
	Map<String, Long> labelDatas = new HashMap<>();
}
