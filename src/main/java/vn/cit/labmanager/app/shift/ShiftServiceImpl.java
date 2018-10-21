package vn.cit.labmanager.app.shift;

import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

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

	@Override
	public boolean delete(String id) {
		try {
			repo.deleteById(id);
		} catch (Exception exception) {
			return false;
		}
		return true;
	}

	@Override
	public Optional<Shift> findOne(String id) {
		Optional<Shift> shift = Optional.empty();
		try {
			shift = repo.findById(id);
		} catch (Exception exception) {
			Logger.getLogger(ShiftServiceImpl.class.getName()).warning("Given id is null");
		}
		return shift;
	}

	@Override
	public Shift save(Shift shift) {
		return repo.save(shift);
	}

	@Override
	public Optional<Shift> findTopByOrderByModifiedDesc() {
		return Optional.ofNullable(repo.findTopByOrderByModifiedDesc());
	}
	
}
