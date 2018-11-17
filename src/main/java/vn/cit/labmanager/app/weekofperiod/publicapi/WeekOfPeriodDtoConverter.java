package vn.cit.labmanager.app.weekofperiod.publicapi;

import org.springframework.beans.factory.annotation.Autowired;

import vn.cit.labmanager.app.period.PeriodService;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriod;
import vn.cit.labmanager.config.converter.DtoConverter;

public class WeekOfPeriodDtoConverter implements DtoConverter<WeekOfPeriod, WeekOfPeriodPublicDto> {

	@Autowired
	private PeriodService periodService;
	
	public static WeekOfPeriodDtoConverter createInstance() {
		return new WeekOfPeriodDtoConverter();
	}
	
	@Override
	public WeekOfPeriodPublicDto toDto(WeekOfPeriod original) {
		WeekOfPeriodPublicDto dto = new WeekOfPeriodPublicDto();
		dto.setId(original.getId());
		dto.setNumOrder(original.getNumOrder());
		dto.setStartDate(original.getStartDate());
		dto.setEndDate(original.getEndDate());
		dto.setPeriodBelongToId(original.getPeriodBelongTo().getId());
		return dto;
	}

	@Override
	public WeekOfPeriod toOriginal(WeekOfPeriodPublicDto dto) {
		WeekOfPeriod original = new WeekOfPeriod();
		original.setId(dto.getId());
		original.setNumOrder(dto.getNumOrder());
		original.setStartDate(dto.getStartDate());
		original.setEndDate(dto.getEndDate());
		periodService.findOne(dto.getPeriodBelongToId()).ifPresent(period -> {
			original.setPeriodBelongTo(period);
		});
		return original;
	}

}
