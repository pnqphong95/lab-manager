package vn.cit.labmanager.app.subject;

import java.time.format.DateTimeFormatter;
import java.util.Optional;

import org.apache.commons.lang3.StringUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import vn.cit.labmanager.app.tool.ToolService;

@Controller
public class SubjectController {

	@Autowired
	private SubjectService service;
	
	@Autowired
	private ToolService toolService;
	
	@RequestMapping(path = "/admin/category/subjects")
    public String index(Model model) {
		Optional<Subject> lastModifiedSubject = service.findTopByOrderByModifiedDesc();
		String lastModification = lastModifiedSubject.map(Subject::getModified)
				.map(modified -> modified.format(DateTimeFormatter.ofPattern("hh':'mm a',' dd/MM/yyyy")))
				.orElse(StringUtils.EMPTY);
		
		model.addAttribute("subjects", service.findAll());
		model.addAttribute("lastModification", lastModification);
        return "admin/category/subject/index";
    }
	
	@RequestMapping(path = "/admin/category/subjects", method = RequestMethod.POST)
    public String saveSubject(Subject subject) {
		service.save(subject);
		return "redirect:/admin/category/subjects";
    }
	
	@RequestMapping(path = "/admin/category/subjects/add")
    public String createSubject(Model model) {
        model.addAttribute("subject", new Subject());
        model.addAttribute("tools", toolService.findAll());
        return "admin/category/subject/edit";   
    }
	
	@RequestMapping(path = "/admin/category/subjects/edit/{id}")
    public String editSubject(@PathVariable(name = "id") String id, Model model) {
        Optional<Subject> subject = service.findOne(id);
        subject.ifPresent(item -> {
        	model.addAttribute("subject", item);
        	model.addAttribute("tools", toolService.findAll());
        });
        return "admin/category/subject/edit";   
    }
	
	@RequestMapping(path = "/admin/category/subjects/delete/{id}")
    public String deleteSubject(@PathVariable(name = "id") String id) {
        service.delete(id);
        return "redirect:/admin/category/subjects";   
    }

}
