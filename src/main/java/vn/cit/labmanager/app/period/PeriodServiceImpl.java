package vn.cit.labmanager.app.period;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class PeriodServiceImpl implements PeriodService {

	@Autowired
	private PeriodRepository repo;
	
	@Override
	public List<Period> findAll() {
		return repo.findAll();
	}

}
