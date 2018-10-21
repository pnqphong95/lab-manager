package vn.cit.labmanager.app.lab;

import java.time.format.DateTimeFormatter;
import java.util.Optional;

import org.apache.commons.lang3.StringUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import vn.cit.labmanager.app.department.DepartmentService;
import vn.cit.labmanager.app.tool.ToolService;

@Controller
public class LabController {

	@Autowired
	private LabService labService;
	
	@Autowired
	private DepartmentService departmentService;
	
	@Autowired
	private ToolService toolService;
	
	@RequestMapping(path = "/admin/category/labs")
    public String index(Model model) {
		Optional<Lab> lastModifiedLab = labService.findTopByOrderByModifiedDesc();
		String lastModification = lastModifiedLab.map(Lab::getModified)
				.map(modified -> modified.format(DateTimeFormatter.ofPattern("hh':'mm a',' dd/MM/yyyy")))
				.orElse(StringUtils.EMPTY);
		
		model.addAttribute("labs", labService.findAll());
		model.addAttribute("lastModification", lastModification);
        return "admin/category/lab/index";
    }
	
	@RequestMapping(path = "/admin/category/labs", method = RequestMethod.POST)
    public String saveLab(Lab lab) {
		labService.save(lab);
		return "redirect:/admin/category/labs";
    }
	
	@RequestMapping(path = "/admin/category/labs/add")
    public String createLab(Model model) {
        model.addAttribute("lab", new Lab());
        model.addAttribute("departments", departmentService.findAll());
        model.addAttribute("tools", toolService.findAll());
        return "admin/category/lab/edit";   
    }
	
	@RequestMapping(path = "/admin/category/labs/edit/{id}")
    public String editLab(@PathVariable(name = "id") String id, Model model) {
        Optional<Lab> lab = labService.findOne(id);
        lab.ifPresent(item -> {
        	model.addAttribute("lab", item);
        	model.addAttribute("departments", departmentService.findAll());
        	model.addAttribute("tools", toolService.findAll());
        });
        return "admin/category/lab/edit";   
    }
	
	@RequestMapping(path = "/admin/category/labs/delete/{id}")
    public String deleteLab(@PathVariable(name = "id") String id) {
        labService.delete(id);
        return "redirect:/admin/category/labs";   
    }

}
