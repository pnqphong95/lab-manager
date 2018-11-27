package vn.cit.labmanager.app.event.publicapi;

import java.time.LocalDate;
import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.format.annotation.DateTimeFormat;
import org.springframework.format.annotation.DateTimeFormat.ISO;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import vn.cit.labmanager.app.event.Event;
import vn.cit.labmanager.app.event.EventService;

@RestController
public class EventRestController {
	
	@Autowired
	private EventService service;
	
	@GetMapping("/api/events")
	public List<EventPublicDto> findEvent(
			@RequestParam @DateTimeFormat(iso = ISO.DATE) LocalDate from,
			@RequestParam @DateTimeFormat(iso = ISO.DATE) LocalDate to) {
		List<EventPublicDto> dtos = new ArrayList<>();
		List<Event> events = service.findByStartDateBetween(from, to);
		events.forEach(event -> {
			EventPublicDto dto = new EventPublicDto();
			dto.setId(event.getId());
			dto.setResourceId(event.getShift().getId() + "|" + event.getLab().getId());
			dto.setTitle(event.getCourse().getCourseId() + " " + event.getCourse().getSubject().getName() + "\n" + event.getCourse().getLecturer().getFullName());
			dto.setStart(event.getStartDate());
			dtos.add(dto);
		});
		return dtos;
	}

}
