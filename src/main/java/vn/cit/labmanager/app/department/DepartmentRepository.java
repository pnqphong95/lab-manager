package vn.cit.labmanager.app.department;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface DepartmentRepository extends JpaRepository<Department, String> {

	public Department findTopByOrderByModifiedDesc();

}
