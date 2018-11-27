package vn.cit.labmanager.app.issue;

import java.util.List;
import java.util.Optional;

import vn.cit.labmanager.app.user.User;

public interface IssueService {
	public List<Issue> findAll();
	public boolean delete(String id);
	public Optional<Issue> findOne(String id);
	public Issue save(Issue issue);
	public Optional<Issue> findTopByOrderByModifiedDesc();
	public List<Issue> findByCreatedUserAndDoneIssue(User user);
	public List<Issue> findByCreatedUserAndCreatedIssue(User user);
	public List<Issue> findByDoneIssue();
	public List<Issue> findByCreatedIssue();
}
