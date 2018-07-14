package vn.cit.labmanager.service.impl;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.domain.LabBookingRequest;
import vn.cit.labmanager.repository.LabBookingRequestRepository;
import vn.cit.labmanager.service.LabBookingRequestService;

@Service
public class LabBookingRequestServiceImpl implements LabBookingRequestService {

	@Autowired
	private LabBookingRequestRepository repo;

	@Override
	public List<LabBookingRequest> findAll() {
		return repo.findAll();
	}

	@Override
	public LabBookingRequest findById(long id) {
		return repo.findById(id).get();
	}

}
