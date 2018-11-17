package vn.cit.labmanager.app.weekofperiod.publicapi;

import java.time.LocalDate;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.format.annotation.DateTimeFormat;
import org.springframework.format.annotation.DateTimeFormat.ISO;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import vn.cit.labmanager.app.weekofperiod.WeekOfPeriod;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriodService;
import vn.cit.labmanager.config.converter.DtoConverter;

@RestController
public class WeekOfPeriodRestController {
	
	@Autowired
	private WeekOfPeriodService service;
	
	@GetMapping("/api/weekofperiods")
	public WeekOfPeriodPublicDto findByDateRange(
			@RequestParam @DateTimeFormat(iso = ISO.DATE) LocalDate from,
			@RequestParam @DateTimeFormat(iso = ISO.DATE) LocalDate to) {
		Optional<WeekOfPeriod> weekOfPeriod = service.findByDateRange(from, to.minusDays(1));
		if (weekOfPeriod.isPresent()) {
			DtoConverter<WeekOfPeriod, WeekOfPeriodPublicDto> converter = WeekOfPeriodDtoConverter.createInstance();
			return converter.toDto(weekOfPeriod.get());
		}
		return new WeekOfPeriodPublicDto();
	}

}
