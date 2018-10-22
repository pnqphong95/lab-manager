package vn.cit.labmanager.app.department;

import static org.assertj.core.api.Assertions.assertThat;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit4.SpringRunner;

import vn.cit.labmanager.app.lab.LabRepository;

@RunWith(SpringRunner.class)
@SpringBootTest
public class DepartmentRepositoryTest {
	
	@Autowired
	private DepartmentRepository departmentRepo;
	
	@Autowired
	private LabRepository labRepo;
	
	@Test
	public void testDelete_allRelatedLab_WillLeaveDepartment() {
		long expected = labRepo.findAll().stream().filter(lab -> Integer.valueOf(lab.getDepartment().getId()) == 2).count();
		departmentRepo.deleteById(String.valueOf(2));
		long actual = labRepo.findAll().stream().filter(lab -> lab.getDepartment() == null).count();
		assertThat(actual).isEqualTo(expected);
	}
}
