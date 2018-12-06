package vn.cit.labmanager.app.lab;

import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Sort;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.app.department.Department;

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

	@Override
	public Optional<Lab> findByDepartment(Department department) {
		return Optional.ofNullable(repo.findByDepartment(department));
	}

	@Override
	public List<Lab> findAll(Sort sort) {
		return repo.findAll(sort);
	}
	
}
