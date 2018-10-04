package vn.cit.labmanager.app.bookrequest;

import java.util.List;

public interface LabBookingRequestService {
	public List<LabBookingRequest> findAll();
	public LabBookingRequest findById(long id);
}
