package vn.cit.labmanager.restcontroller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import vn.cit.labmanager.domain.LabBookingRequest;
import vn.cit.labmanager.service.LabBookingRequestService;

@RestController
public class LabBookingRequestRestController {
	
	@Autowired
	private LabBookingRequestService service;
	
	@GetMapping("/booking_requests")
	public List<LabBookingRequest> findAll() {
		return service.findAll();
	}
}
