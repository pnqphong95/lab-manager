package vn.cit.labmanager.app.lab;

import java.util.List;

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

}
