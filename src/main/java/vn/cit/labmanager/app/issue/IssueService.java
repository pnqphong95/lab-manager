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
	public List<Issue> findByCreatedUser(User user);
	public List<Issue> findByTracks_StatusInAndTracks_StatusNotIn(List<IssueStatus> statusIn, List<IssueStatus> statusNotIn);
	public List<Issue> findByCreatedUserAndTracks_StatusIn(User user, List<IssueStatus> status);
}
