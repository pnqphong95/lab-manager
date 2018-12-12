package vn.cit.labmanager.app.event.request;

import java.time.LocalDate;

import org.springframework.format.annotation.DateTimeFormat;
import org.springframework.format.annotation.DateTimeFormat.ISO;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class EventRequestRestController {
	
	@GetMapping("/api/hasAvailableLab")
	public boolean hasAvailableLab(
			@RequestParam @DateTimeFormat(iso = ISO.DATE) LocalDate from,
			@RequestParam @DateTimeFormat(iso = ISO.DATE) LocalDate to) {
		return true;
	}

}
