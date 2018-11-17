package vn.cit.labmanager.app.period.publicapi;

import java.time.LocalDate;

import lombok.Data;

@Data
public class PeriodPublicDto {
	private String id;
	private String semester;
	private int startYear;
	private int endYear;
	private LocalDate startDate;
	private LocalDate endDate;
	private int amountOfWeek;
}
