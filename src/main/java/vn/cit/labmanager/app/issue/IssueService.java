package vn.cit.labmanager.app.issue;

import java.util.List;
import java.util.Optional;

public interface IssueService {
	public List<Issue> findAll();
	public boolean delete(String id);
	public Optional<Issue> findOne(String id);
	public Issue save(Issue issue);
	public Optional<Issue> findTopByOrderByModifiedDesc();
}
