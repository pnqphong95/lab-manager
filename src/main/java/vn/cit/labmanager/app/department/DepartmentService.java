package vn.cit.labmanager.app.department;

import java.util.List;
import java.util.Optional;

public interface DepartmentService {
	public List<Department> findAll();
	public boolean delete(String id);
	public Optional<Department> findOne(String id);
	public Department save(Department department);
	public Optional<Department> findTopByOrderByModifiedDesc();
}
