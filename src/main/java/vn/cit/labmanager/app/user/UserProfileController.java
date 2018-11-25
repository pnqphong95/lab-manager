package vn.cit.labmanager.app.user;

import java.util.Optional;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.server.ResponseStatusException;

import vn.cit.labmanager.app.department.DepartmentService;

@Controller
public class UserProfileController {
	
	@Autowired
	private UserService service;
	
	@Autowired
	private DepartmentService departmentService;
	
	@RequestMapping(path = "/admin/myprofile")
	public String index(Model model) {
		UserDetails authenticatedUser = (UserDetails) SecurityContextHolder.getContext().getAuthentication().getPrincipal();
		Optional<String> username = Optional.ofNullable(authenticatedUser).map(UserDetails::getUsername);
		if (username.isPresent()) {
			Optional<User> userDetail = service.findByUsername(username.get());
			if (userDetail.isPresent()) {
				model.addAttribute("user", userDetail.get());
	        	return "admin/myprofile/detail";
			}
		}
		throw new ResponseStatusException(HttpStatus.NOT_FOUND);
	}
	
	@RequestMapping(path = "/admin/myprofile/edit")
	public String editProfile(Model model) {
		UserDetails authenticatedUser = (UserDetails) SecurityContextHolder.getContext().getAuthentication().getPrincipal();
		Optional<String> username = Optional.ofNullable(authenticatedUser).map(UserDetails::getUsername);
		if (username.isPresent()) {
			Optional<User> userDetail = service.findByUsername(username.get());
			if (userDetail.isPresent()) {
				model.addAttribute("user", userDetail.get());
	        	model.addAttribute("departments", departmentService.findAll());
	        	model.addAttribute("roles", Role.values());
	        	return "admin/myprofile/edit";
			}
		}
		throw new ResponseStatusException(HttpStatus.NOT_FOUND);
    }
	
	@RequestMapping(path = "/admin/myprofile", method = RequestMethod.POST)
	 public String saveProfile(@Valid User user, BindingResult result,  Model model) {
		model.addAttribute("user", user);
		model.addAttribute("departments", departmentService.findAll());
		model.addAttribute("roles", Role.values());
		try {
			service.save(user);
		} catch (Exception e) {
			model.addAttribute("message", "Lỗi không xác định.");
			return "admin/myprofile/edit";
		}
		return "redirect:/admin/myprofile";
    }

}
