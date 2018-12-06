package vn.cit.labmanager.app.event.request;

import java.time.LocalDate;
import java.util.ArrayList;
import java.util.List;
import java.util.stream.Collectors;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.format.annotation.DateTimeFormat;
import org.springframework.format.annotation.DateTimeFormat.ISO;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import vn.cit.labmanager.app.event.Event;
import vn.cit.labmanager.app.event.EventService;
import vn.cit.labmanager.app.event.request.handler.EventRequestDelegator;
import vn.cit.labmanager.app.lab.Lab;

@RestController
public class EventRequestRestController {
	
	@Autowired
	private EventRequestDelegator delegator;
	
	@GetMapping("/api/hasAvailableLab")
	public boolean hasAvailableLab(
			@RequestParam @DateTimeFormat(iso = ISO.DATE) LocalDate from,
			@RequestParam @DateTimeFormat(iso = ISO.DATE) LocalDate to) {
		return true;
	}

}
