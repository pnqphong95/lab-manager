package vn.cit.labmanager.app.period;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class PeriodRestController {
	
	@Autowired
	private PeriodService service;
	
	@GetMapping("/periods")
	public List<Period> findAll() {
		return service.findAll();
	}
}
