package vn.cit.labmanager.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
public class LabManagerHomeController {
	
	@RequestMapping(path = "/admin")
    public String index() {
        return "admin/index";
    }

}
