package vn.cit.labmanager.app.event;

import java.time.LocalDate;
import java.util.List;
import java.util.Optional;

import vn.cit.labmanager.app.department.Department;
import vn.cit.labmanager.app.lab.Lab;
import vn.cit.labmanager.app.shift.Shift;
import vn.cit.labmanager.app.weekofperiod.WeekOfPeriod;

public interface EventService {
	public List<Event> findAll();
	public boolean delete(String id);
	public Optional<Event> findOne(String id);
	public Event save(Event event);
	public List<Event> save(List<Event> events);
	public Optional<Event> findTopByOrderByModifiedDesc();
	public List<Event> findByStartDateBetween(LocalDate from, LocalDate to);
	public List<Event> findByLabInAndStartDateEqualsAndShiftEquals(List<Lab> labs, LocalDate startDate, Shift shift);
	public long countByWeekOfPeriod(WeekOfPeriod weekOfPeriod);
	public long countByLabDepartment(Department department);
	public long countByLab(Lab lab);
}
