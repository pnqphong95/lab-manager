package vn.cit.labmanager.app.statistic;

import java.util.ArrayList;
import java.util.List;

import lombok.Data;

@Data
public class EventStatisticDto {
	List<String> labels = new ArrayList<>();
	List<Long> datas = new ArrayList<>();
	
	public static EventStatisticDto from(EventStatistic event) {
		EventStatisticDto dto = new EventStatisticDto();
		dto.setLabels(new ArrayList<>(event.getLabelDatas().keySet()));
		dto.setDatas(new ArrayList<>(event.getLabelDatas().values()));
		return dto;
	}
}
