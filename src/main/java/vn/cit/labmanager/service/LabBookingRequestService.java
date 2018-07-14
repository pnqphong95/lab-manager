package vn.cit.labmanager.service;

import java.util.List;

import vn.cit.labmanager.domain.LabBookingRequest;

public interface LabBookingRequestService {
	public List<LabBookingRequest> findAll();
	public LabBookingRequest findById(long id);
}
