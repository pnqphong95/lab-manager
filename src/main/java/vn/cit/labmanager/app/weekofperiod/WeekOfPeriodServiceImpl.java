package vn.cit.labmanager.app.weekofperiod;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class WeekOfPeriodServiceImpl implements WeekOfPeriodService {

	@Autowired
	private WeekOfPeriodRepository repo;

	@Override
	public List<WeekOfPeriod> findAll() {
		return repo.findAll();
	}

}
