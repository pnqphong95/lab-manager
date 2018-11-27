package vn.cit.labmanager.app.issue;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import vn.cit.labmanager.app.user.User;

@Repository
public interface IssueRepository extends JpaRepository<Issue, String> {

	public Issue findTopByOrderByModifiedDesc();
	public List<Issue> findByCreatedUserAndTracks_Status(User user, IssueStatus status);
	public List<Issue> findByTracks_Status(IssueStatus status);

}
