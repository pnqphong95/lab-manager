package vn.cit.labmanager.gateway;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
public class RegistrationController {
	
	@RequestMapping(path = "/registration")
	 public String processView() {
        return "registration";
	}

}
