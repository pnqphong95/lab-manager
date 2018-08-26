package vn.cit.labmanager.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
public class LabHomeController {
	
	@RequestMapping(path = "/")
    public String index() {
        return "index";
    }
	
	@RequestMapping(path = "/admin")
    public String processAdminView() {
        return "index";
    }
}
