package vn.cit.labmanager.app.weekofperiod.publicapi;

import java.time.LocalDate;

import lombok.Data;

@Data
public class WeekOfPeriodPublicDto {
	private String id;
	private int numOrder;
	private LocalDate startDate;
	private LocalDate endDate;
	private String periodBelongToId;
}
