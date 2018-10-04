package vn.cit.labmanager.gateway;

import java.security.Principal;

import org.springframework.security.core.Authentication;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
public class RegistrationController {
	
	@RequestMapping(path = "/registration")
	 public String processView(Principal principal) {
        if (principal!=null && ((Authentication) principal).isAuthenticated()) {
            return "redirect:/";
        }
        return "registration";
	}

}
