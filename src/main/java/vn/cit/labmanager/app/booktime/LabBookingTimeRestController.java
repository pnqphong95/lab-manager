package vn.cit.labmanager.app.booktime;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class LabBookingTimeRestController {
	
	@Autowired
	private LabBookingTimeService service;
	
	@GetMapping("/booking_times")
	public List<LabBookingTime> findAll() {
		return service.findAll();
	}
}
