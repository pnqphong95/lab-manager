package vn.cit.labmanager.restcontroller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import vn.cit.labmanager.domain.Period;
import vn.cit.labmanager.service.PeriodService;

@RestController
public class PeriodRestController {
	
	@Autowired
	private PeriodService service;
	
	@GetMapping("/periods")
	public List<Period> findAll() {
		return service.findAll();
	}
}
