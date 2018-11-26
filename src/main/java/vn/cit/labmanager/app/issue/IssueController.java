package vn.cit.labmanager.app.issue;

import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.Optional;

import org.apache.commons.lang3.StringUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import vn.cit.labmanager.app.lab.LabService;
import vn.cit.labmanager.app.user.UserService;

@Controller
public class IssueController {

	@Autowired
	private IssueService service;
	
	@Autowired
	private LabService labService;
	
	@Autowired
	private UserService userService;
	
	@RequestMapping(path = "/admin/category/issues")
    public String index(Model model) {
		Optional<Issue> lastModifiedIssue = service.findTopByOrderByModifiedDesc();
		String lastModification = lastModifiedIssue.map(Issue::getModified)
				.map(modified -> modified.format(DateTimeFormatter.ofPattern("hh':'mm a',' dd/MM/yyyy")))
				.orElse(StringUtils.EMPTY);
		
		model.addAttribute("issues", service.findAll());
		model.addAttribute("lastModification", lastModification);
        return "admin/category/issue/index";
    }
	
	@RequestMapping(path = "/admin/category/issues", method = RequestMethod.POST)
    public String saveIssue(Issue issue) {
		issue.setCreatedDate(LocalDate.now());
		issue.setCreatedUser(userService.getCurrentUser().orElse(null));
		service.save(issue);
		return "redirect:/admin/category/issues";
    }
	
	@RequestMapping(path = "/admin/category/issues/add")
    public String createIssue(Model model) {
        model.addAttribute("issue", new Issue());
        model.addAttribute("labs", labService.findAll());
        return "admin/category/issue/edit";   
    }
	
	@RequestMapping(path = "/admin/category/issues/edit/{id}")
    public String editIssue(@PathVariable(name = "id") String id, Model model) {
        Optional<Issue> issue = service.findOne(id);
        issue.ifPresent(item -> {
        	model.addAttribute("issue", item);
        	model.addAttribute("labs", labService.findAll());
        });
        return "admin/category/issue/edit";   
    }
	
	@RequestMapping(path = "/admin/category/issues/delete/{id}")
    public String deleteIssue(@PathVariable(name = "id") String id) {
        service.delete(id);
        return "redirect:/admin/category/issues";   
    }

}
