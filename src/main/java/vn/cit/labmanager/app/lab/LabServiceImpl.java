package vn.cit.labmanager.app.lab;

import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class LabServiceImpl implements LabService {

	@Autowired
	private LabRepository repo;

	@Override
	public List<Lab> findAll() {
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
	public Optional<Lab> findOne(String id) {
		Optional<Lab> lab = Optional.empty();
		try {
			lab = repo.findById(id);
		} catch (Exception exception) {
			Logger.getLogger(LabServiceImpl.class.getName()).warning("Given id is null");
		}
		return lab;
	}

	@Override
	public Lab save(Lab lab) {
		return repo.save(lab);
	}

	@Override
	public Optional<Lab> findTopByOrderByModifiedDesc() {
		return Optional.ofNullable(repo.findTopByOrderByModifiedDesc());
	}
	
}
