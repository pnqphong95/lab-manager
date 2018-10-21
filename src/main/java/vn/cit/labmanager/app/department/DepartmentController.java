package vn.cit.labmanager.app.department;

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
public class DepartmentController {

	@Autowired
	private DepartmentService service;
	
	@RequestMapping(path = "/admin/category/departments")
    public String index(Model model) {
		Optional<Department> lastModifiedDepartment = service.findTopByOrderByModifiedDesc();
		String lastModification = lastModifiedDepartment.map(Department::getModified)
				.map(modified -> modified.format(DateTimeFormatter.ofPattern("hh':'mm a',' dd/MM/yyyy")))
				.orElse(StringUtils.EMPTY);
		
		model.addAttribute("departments", service.findAll());
		model.addAttribute("lastModification", lastModification);
        return "admin/category/department/index";
    }
	
	@RequestMapping(path = "/admin/category/departments", method = RequestMethod.POST)
    public String saveDepartment(Department department) {
		service.save(department);
		return "redirect:/admin/category/departments";
    }
	
	@RequestMapping(path = "/admin/category/departments/add")
    public String createDepartment(Model model) {
        model.addAttribute("department", new Department());
        return "admin/category/department/edit";   
    }
	
	@RequestMapping(path = "/admin/category/departments/edit/{id}")
    public String editDepartment(@PathVariable(name = "id") String id, Model model) {
        Optional<Department> department = service.findOne(id);
        department.ifPresent(item -> {
        	model.addAttribute("department", item);
        });
        return "admin/category/department/edit";   
    }
	
	@RequestMapping(path = "/admin/category/departments/delete/{id}")
    public String deleteDepartment(@PathVariable(name = "id") String id) {
        service.delete(id);
        return "redirect:/admin/category/departments";   
    }

}
