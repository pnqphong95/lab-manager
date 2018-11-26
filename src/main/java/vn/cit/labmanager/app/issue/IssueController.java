package vn.cit.labmanager.app.issue;

import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.Arrays;
import java.util.Optional;

import org.apache.commons.lang3.StringUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import vn.cit.labmanager.app.lab.LabService;
import vn.cit.labmanager.app.user.User;
import vn.cit.labmanager.app.user.UserService;

@Controller
public class IssueController {

	@Autowired
	private IssueService service;
	
	@Autowired
	private LabService labService;
	
	@Autowired
	private UserService userService;
	
	@RequestMapping(path = "/admin/myissues/pending")
    public String indexPending(Model model) {
		Optional<Issue> lastModifiedIssue = service.findTopByOrderByModifiedDesc();
		String lastModification = lastModifiedIssue.map(Issue::getModified)
				.map(modified -> modified.format(DateTimeFormatter.ofPattern("hh':'mm a',' dd/MM/yyyy")))
				.orElse(StringUtils.EMPTY);
		
		model.addAttribute("issues", service.findByCreatedUserAndTracks_StatusIn(
				userService.getCurrentUser().orElse(null),
				Arrays.asList(IssueStatus.Created, IssueStatus.Processing)));
		model.addAttribute("lastModification", lastModification);
        return "admin/myissue/indexpending";
    }
	
	@RequestMapping(path = "/admin/myissues/history")
    public String indexHistory(Model model) {
		Optional<Issue> lastModifiedIssue = service.findTopByOrderByModifiedDesc();
		String lastModification = lastModifiedIssue.map(Issue::getModified)
				.map(modified -> modified.format(DateTimeFormatter.ofPattern("hh':'mm a',' dd/MM/yyyy")))
				.orElse(StringUtils.EMPTY);
		
		model.addAttribute("issues", service.findByCreatedUserAndTracks_StatusIn(
				userService.getCurrentUser().orElse(null),
				Arrays.asList(IssueStatus.Done)));
		model.addAttribute("lastModification", lastModification);
        return "admin/myissue/indexhistory";
    }
	
	@RequestMapping(path = "/admin/create_issue", method = RequestMethod.POST)
    public String saveIssue(Issue issue) {
		LocalDate createdDate = LocalDate.now();
		User creator = userService.getCurrentUser().orElse(null);
		if (issue.getTracks().isEmpty()) {
			IssueTracking track = new IssueTracking();
			track.setStatus(IssueStatus.Created);
			track.setNote("Thêm vấn đề.");
			track.setCreatedDate(createdDate);
			track.setCreatedUser(creator);
			issue.addTrack(track);
		}
		issue.setCreatedDate(createdDate);
		issue.setCreatedUser(creator);
		service.save(issue);
		return "redirect:/admin/myissues/pending";
    }
	
	@RequestMapping(path = "/admin/create_issue")
    public String createIssue(Model model) {
        model.addAttribute("issue", new Issue());
        model.addAttribute("labs", labService.findAll());
        return "admin/myissue/edit";   
    }
	
}
