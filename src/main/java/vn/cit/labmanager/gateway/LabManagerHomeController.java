package vn.cit.labmanager.gateway;

import java.rmi.ServerException;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
public class LabManagerHomeController {
	
	@RequestMapping(path = "/admin")
    public String index() {
        return "admin/index";
    }
	
	@RequestMapping(path = "/create_request")
    public String createRequest() throws ServerException {
        throw new ServerException("Lỗi hệ thống");
    }

}
