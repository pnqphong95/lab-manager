package vn.cit.labmanager.app.period.publicapi;

import java.time.LocalDate;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.format.annotation.DateTimeFormat;
import org.springframework.format.annotation.DateTimeFormat.ISO;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.period.PeriodService;
import vn.cit.labmanager.config.converter.DtoConverter;

@RestController
public class PeriodRestController {
	
	@Autowired
	private PeriodService service;
	
	@GetMapping("/api/periods")
	public PeriodPublicDto findBySpecifiedDate(@RequestParam @DateTimeFormat(iso = ISO.DATE) LocalDate now) {
		Optional<Period> period = service.findBySpecifiedDate(now);
		if (period.isPresent()) {
			DtoConverter<Period, PeriodPublicDto> converter = PeriodDtoConverter.createInstance();
			return converter.toDto(period.get());
		}
		return new PeriodPublicDto();	
	}

}
