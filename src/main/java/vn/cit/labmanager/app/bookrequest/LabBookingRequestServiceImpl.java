package vn.cit.labmanager.app.bookrequest;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

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
