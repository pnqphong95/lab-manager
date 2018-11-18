package vn.cit.labmanager.app.subject;

import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class SubjectServiceImpl implements SubjectService {

	@Autowired
	private SubjectRepository repo;

	@Override
	public List<Subject> findAll() {
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
	public Optional<Subject> findOne(String id) {
		Optional<Subject> subject = Optional.empty();
		try {
			subject = repo.findById(id);
		} catch (Exception exception) {
			Logger.getLogger(SubjectServiceImpl.class.getName()).warning("Given id is null");
		}
		return subject;
	}

	@Override
	public Subject save(Subject subject) {
		return repo.save(subject);
	}

	@Override
	public Optional<Subject> findTopByOrderByModifiedDesc() {
		return Optional.ofNullable(repo.findTopByOrderByModifiedDesc());
	}
	
}
