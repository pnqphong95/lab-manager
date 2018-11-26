package vn.cit.labmanager.app.issue;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface IssueRepository extends JpaRepository<Issue, String> {

	public Issue findTopByOrderByModifiedDesc();

}
