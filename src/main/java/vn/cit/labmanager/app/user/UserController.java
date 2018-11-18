package vn.cit.labmanager.app.user;

import java.time.format.DateTimeFormatter;
import java.util.Optional;

import org.apache.commons.lang3.StringUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller
public class UserController {

	@Autowired
	private UserService service;
	
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
	
	@RequestMapping(path = "/admin/category/users", method = RequestMethod.POST)
    public String saveUser(User user) {
		service.save(user);
		return "redirect:/admin/category/users";
    }
	
	@RequestMapping(path = "/admin/category/users/add")
    public String createUser(Model model) {
        model.addAttribute("user", new User());
        model.addAttribute("roles", Role.values());
        return "admin/category/user/edit";   
    }
	
	@RequestMapping(path = "/admin/category/users/edit/{id}")
    public String editUser(@PathVariable(name = "id") String id, Model model) {
        Optional<User> user = service.findOne(id);
        user.ifPresent(item -> {
        	model.addAttribute("user", item);
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
