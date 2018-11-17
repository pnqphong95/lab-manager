package vn.cit.labmanager.app.period.publicapi;

import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.period.PeriodSemester;
import vn.cit.labmanager.config.converter.DtoConverter;

public class PeriodDtoConverter implements DtoConverter<Period, PeriodPublicDto> {

	public static PeriodDtoConverter createInstance() {
		return new PeriodDtoConverter();
	}
	
	@Override
	public PeriodPublicDto toDto(Period original) {
		PeriodPublicDto dto = new PeriodPublicDto();
		dto.setId(original.getId());
		dto.setSemester(original.getSemester().toString());
		dto.setStartYear(original.getStartYear());
		dto.setEndYear(original.getEndYear());
		dto.setStartDate(original.getStartDate());
		dto.setAmountOfWeek(original.getAmountOfWeek());
		dto.setEndDate(original.getEndDate());
		return dto;
	}

	@Override
	public Period toOriginal(PeriodPublicDto dto) {
		Period original = new Period();
		original.setId(dto.getId());
		original.setSemester(PeriodSemester.valueOf(dto.getSemester()));
		original.setStartYear(dto.getStartYear());
		original.setEndYear(dto.getEndYear());
		original.setStartDate(dto.getStartDate());
		original.setEndDate(dto.getEndDate());
		original.setAmountOfWeek(dto.getAmountOfWeek());
		return original;
	}

}
