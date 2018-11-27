package vn.cit.labmanager.app.lab;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import vn.cit.labmanager.app.department.Department;

@Repository
public interface LabRepository extends JpaRepository<Lab, String> {

	public Lab findTopByOrderByModifiedDesc();
	public Lab findByDepartment(Department department);

}
