package vn.cit.labmanager.restcontroller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import vn.cit.labmanager.domain.WeekOfPeriod;
import vn.cit.labmanager.service.WeekOfPeriodService;

@RestController
public class WeekOfPeriodRestController {
	
	@Autowired
	private WeekOfPeriodService service;
	
	@GetMapping("/weekofperiods")
	public List<WeekOfPeriod> findAll() {
		return service.findAll();
	}
}
