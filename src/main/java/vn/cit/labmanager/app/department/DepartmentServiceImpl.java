package vn.cit.labmanager.app.department;

import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class DepartmentServiceImpl implements DepartmentService {

	@Autowired
	private DepartmentRepository repo;

	@Override
	public List<Department> findAll() {
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
	public Optional<Department> findOne(String id) {
		Optional<Department> department = Optional.empty();
		try {
			department = repo.findById(id);
		} catch (Exception exception) {
			Logger.getLogger(DepartmentServiceImpl.class.getName()).warning("Given id is null");
		}
		return department;
	}

	@Override
	public Department save(Department department) {
		return repo.save(department);
	}

	@Override
	public Optional<Department> findTopByOrderByModifiedDesc() {
		return Optional.ofNullable(repo.findTopByOrderByModifiedDesc());
	}
	
}
