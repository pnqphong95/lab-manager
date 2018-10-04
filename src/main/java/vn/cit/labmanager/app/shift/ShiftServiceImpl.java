package vn.cit.labmanager.app.shift;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class ShiftServiceImpl implements ShiftService {

	@Autowired
	private ShiftRepository repo;

	@Override
	public List<Shift> findAll() {
		return repo.findAll();
	}

}
