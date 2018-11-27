package vn.cit.labmanager.app.issue;

import java.util.Collections;
import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;
import java.util.stream.Collectors;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.app.user.User;

@Service
public class IssueServiceImpl implements IssueService {

	@Autowired
	private IssueRepository repo;

	@Override
	public List<Issue> findAll() {
		return repo.findAll();
	}

	@Override
	public boolean delete(String id) {
		try {
			repo.deleteById(id);
		} catch (Exception exception) {
			return false;
		}
		return true;
	}

	@Override
	public Optional<Issue> findOne(String id) {
		Optional<Issue> issue = Optional.empty();
		try {
			issue = repo.findById(id);
		} catch (Exception exception) {
			Logger.getLogger(IssueServiceImpl.class.getName()).warning("Given id is null");
		}
		return issue;
	}

	@Override
	public Issue save(Issue issue) {
		return repo.save(issue);
	}

	@Override
	public Optional<Issue> findTopByOrderByModifiedDesc() {
		return Optional.ofNullable(repo.findTopByOrderByModifiedDesc());
	}

	@Override
	public List<Issue> findByCreatedUserAndDoneIssue(User user) {
		if (user == null) {
			return Collections.emptyList();
		}
		return repo.findByCreatedUserAndTracks_Status(user, IssueStatus.Done);
	}

	@Override
	public List<Issue> findByCreatedUserAndCreatedIssue(User user) {
		if (user == null) {
			return Collections.emptyList();
		}
		List<Issue> issues = repo.findByCreatedUserAndTracks_Status(user, IssueStatus.Created);
		return issues.stream().filter(issue -> !issue.isContainDoneTracking()).collect(Collectors.toList());
	}

	@Override
	public List<Issue> findByDoneIssue() {
		return repo.findByTracks_Status(IssueStatus.Done);
	}

	@Override
	public List<Issue> findByCreatedIssue() {
		List<Issue> issues = repo.findByTracks_Status(IssueStatus.Created);
		return issues.stream().filter(issue -> !issue.isContainDoneTracking()).collect(Collectors.toList());
	}

	

	
}
