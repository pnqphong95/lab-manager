package vn.cit.labmanager.service.impl;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.domain.Period;
import vn.cit.labmanager.repository.PeriodRepository;
import vn.cit.labmanager.service.PeriodService;

@Service
public class PeriodServiceImpl implements PeriodService {

	@Autowired
	private PeriodRepository repo;
	
	@Override
	public List<Period> findAll() {
		return repo.findAll();
	}

}
