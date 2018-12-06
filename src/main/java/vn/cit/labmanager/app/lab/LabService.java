package vn.cit.labmanager.app.lab;

import java.util.List;
import java.util.Optional;

import org.springframework.data.domain.Sort;

import vn.cit.labmanager.app.department.Department;

public interface LabService {
	public List<Lab> findAll();
	public List<Lab> findAll(Sort sort);
	public boolean delete(String id);
	public Optional<Lab> findOne(String id);
	public Lab save(Lab lab);
	public Optional<Lab> findTopByOrderByModifiedDesc();
	public Optional<Lab> findByDepartment(Department department);
}
