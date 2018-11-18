package vn.cit.labmanager.app.subject;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface SubjectRepository extends JpaRepository<Subject, String> {

	public Subject findTopByOrderByModifiedDesc();

}
