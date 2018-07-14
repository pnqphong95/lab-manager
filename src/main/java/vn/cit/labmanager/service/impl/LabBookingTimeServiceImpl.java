package vn.cit.labmanager.service.impl;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.domain.LabBookingTime;
import vn.cit.labmanager.repository.LabBookingTimeRepository;
import vn.cit.labmanager.service.LabBookingTimeService;

@Service
public class LabBookingTimeServiceImpl implements LabBookingTimeService {

	@Autowired
	private LabBookingTimeRepository repo;

	@Override
	public List<LabBookingTime> findAll() {
		return repo.findAll();
	}

}
