package vn.cit.labmanager.app.issue;

import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

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
	
}
