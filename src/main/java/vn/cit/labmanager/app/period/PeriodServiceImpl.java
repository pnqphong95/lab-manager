package vn.cit.labmanager.app.period;

import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.app.period.Period;
import vn.cit.labmanager.app.period.PeriodServiceImpl;

@Service
public class PeriodServiceImpl implements PeriodService {

	@Autowired
	private PeriodRepository repo;

	@Override
	public List<Period> findAll() {
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
	public Optional<Period> findOne(String id) {
		Optional<Period> period = Optional.empty();
		try {
			period = repo.findById(id);
		} catch (Exception exception) {
			Logger.getLogger(PeriodServiceImpl.class.getName()).warning("Given id is null");
		}
		return period;
	}

	@Override
	public Period save(Period period) {
		return repo.save(period);
	}

	@Override
	public Optional<Period> findTopByOrderByModifiedDesc() {
		return Optional.ofNullable(repo.findTopByOrderByModifiedDesc());
	}

}
