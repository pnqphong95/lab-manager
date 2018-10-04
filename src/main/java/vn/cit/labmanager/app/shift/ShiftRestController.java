package vn.cit.labmanager.app.shift;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class ShiftRestController {
	
	@Autowired
	private ShiftService service;
	
	@GetMapping("/shifts")
	public List<Shift> findAll() {
		return service.findAll();
	}
}
