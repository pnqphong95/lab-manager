package vn.cit.labmanager.gateway;

import java.rmi.ServerException;
import java.time.LocalDate;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

import vn.cit.labmanager.app.event.EventService;
import vn.cit.labmanager.app.period.PeriodService;

@Controller
public class LabManagerHomeController {
	
	@Autowired
	private EventService eventService;
	
	@Autowired
	private PeriodService periodService;
	
	@RequestMapping(path = "/admin")
    public String index(Model model) {
		model.addAttribute("isCurrentPeriodCreated", periodService.findBySpecifiedDate(LocalDate.now()).isPresent());
		model.addAttribute("events", eventService.findAll());
        return "admin/index";
    }
	
	@RequestMapping(path = "/create_request")
    public String createRequest() throws ServerException {
        throw new ServerException("Lỗi hệ thống");
    }

}
