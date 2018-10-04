package vn.cit.labmanager.app.booktime;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class LabBookingTimeServiceImpl implements LabBookingTimeService {

	@Autowired
	private LabBookingTimeRepository repo;

	@Override
	public List<LabBookingTime> findAll() {
		return repo.findAll();
	}

}
