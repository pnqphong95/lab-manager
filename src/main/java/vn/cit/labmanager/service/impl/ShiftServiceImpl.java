package vn.cit.labmanager.service.impl;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.domain.Shift;
import vn.cit.labmanager.repository.ShiftRepository;
import vn.cit.labmanager.service.ShiftService;

@Service
public class ShiftServiceImpl implements ShiftService {

	@Autowired
	private ShiftRepository repo;

	@Override
	public List<Shift> findAll() {
		return repo.findAll();
	}

}
