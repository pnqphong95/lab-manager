package vn.cit.labmanager.service.impl;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.domain.Lab;
import vn.cit.labmanager.repository.LabRepository;
import vn.cit.labmanager.service.LabService;

@Service
public class LabServiceImpl implements LabService {

	@Autowired
	private LabRepository repo;

	@Override
	public List<Lab> findAll() {
		return repo.findAll();
	}

}
