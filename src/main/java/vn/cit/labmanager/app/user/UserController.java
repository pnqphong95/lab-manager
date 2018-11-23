package vn.cit.labmanager.app.user;
import java.time.format.DateTimeFormatter;
import java.util.Optional;

import javax.validation.Valid;

import org.apache.commons.lang3.StringUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.server.ResponseStatusException;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javassist.NotFoundException;
import vn.cit.labmanager.app.department.DepartmentService;

@Controller
public class UserController {
	
	@Autowired
	private UserService service;
	
	@Autowired
	private DepartmentService departmentService;
	
	@RequestMapping(path = "/admin/category/users")
    public String index(Model model) {
		Optional<User> lastModifiedUser = service.findTopByOrderByModifiedDesc();
		String lastModification = lastModifiedUser.map(User::getModified)
				.map(modified -> modified.format(DateTimeFormatter.ofPattern("hh':'mm a',' dd/MM/yyyy")))
				.orElse(StringUtils.EMPTY);
		
		model.addAttribute("users", service.findAll());
		model.addAttribute("lastModification", lastModification);
        return "admin/category/user/index";
    }
	
	@RequestMapping(path = "/admin/category/users/{userId}", method=RequestMethod.GET)
	public String detail(@PathVariable String userId, Model model) throws NotFoundException{
		Optional<User> user = service.findOne(userId);
		if (user.isPresent()) {
			model.addAttribute("user", user.get());
        	return "admin/category/user/detail";
		}
		throw new ResponseStatusException(HttpStatus.NOT_FOUND);
	}
	
	@RequestMapping(path = "/admin/category/users/add", method = RequestMethod.POST)
    public String saveUser(@Valid User user, BindingResult result,  Model model, RedirectAttributes redirAttrs) {
		model.addAttribute("user", user);
		model.addAttribute("departments", departmentService.findAll());
		model.addAttribute("roles", Role.values());
		try {
			service.save(user);
		} catch (Exception e) {
			model.addAttribute("message", "Lỗi không xác định.");
			return "admin/category/user/edit";
		}
		return "redirect:/admin/category/users";
    }
	
	@RequestMapping(path = "/admin/category/users/add")
    public String createUser(Model model) {
		User user = new User();
		user.setActive(true);
		user.getRoles().add(Role.R4);
        model.addAttribute("user", user);
        model.addAttribute("departments", departmentService.findAll());
        model.addAttribute("roles", Role.values());
        return "admin/category/user/edit";   
    }
	
	@RequestMapping(path = "/admin/category/users/edit/{id}")
    public String editUser(@PathVariable(name = "id") String id, Model model) {
        Optional<User> user = service.findOne(id);
        user.ifPresent(item -> {
        	model.addAttribute("user", item);
        	model.addAttribute("departments", departmentService.findAll());
        	model.addAttribute("roles", Role.values());
        });
        return "admin/category/user/edit";   
    }
	
	@RequestMapping(path = "/admin/category/users/delete/{id}")
    public String deleteUser(@PathVariable(name = "id") String id) {
        service.delete(id);
        return "redirect:/admin/category/users";   
    }

}
