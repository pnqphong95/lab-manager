package vn.cit.labmanager.app.statistic;

import java.util.List;

import vn.cit.labmanager.app.department.Department;
import vn.cit.labmanager.app.lab.Lab;
import vn.cit.labmanager.app.period.Period;

public interface EventStatisticService {
	public EventStatistic generateBy(Period period);
	public EventStatistic generateByDepartment(List<Department> departments);
	public EventStatistic generateByLab(List<Lab> labs);
}
