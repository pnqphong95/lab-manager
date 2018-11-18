package vn.cit.labmanager.app.subject;

import java.util.List;
import java.util.Optional;

public interface SubjectService {
	public List<Subject> findAll();
	public boolean delete(String id);
	public Optional<Subject> findOne(String id);
	public Subject save(Subject subject);
	public Optional<Subject> findTopByOrderByModifiedDesc();
}
