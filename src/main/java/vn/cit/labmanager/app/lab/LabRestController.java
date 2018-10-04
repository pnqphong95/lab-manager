package vn.cit.labmanager.app.lab;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class LabRestController {
	
	@Autowired
	private LabService service;
	
	@GetMapping("/labs")
	public List<Lab> findAll() {
		return service.findAll();
	}
}
