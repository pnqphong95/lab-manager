package vn.cit.labmanager.service.impl;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.domain.WeekOfPeriod;
import vn.cit.labmanager.repository.WeekOfPeriodRepository;
import vn.cit.labmanager.service.WeekOfPeriodService;

@Service
public class WeekOfPeriodServiceImpl implements WeekOfPeriodService {

	@Autowired
	private WeekOfPeriodRepository repo;

	@Override
	public List<WeekOfPeriod> findAll() {
		return repo.findAll();
	}

}
