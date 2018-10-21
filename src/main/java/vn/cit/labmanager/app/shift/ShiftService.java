package vn.cit.labmanager.app.shift;

import java.util.List;
import java.util.Optional;

public interface ShiftService {
	public List<Shift> findAll();
	public boolean delete(String id);
	public Optional<Shift> findOne(String id);
	public Shift save(Shift tool);
	public Optional<Shift> findTopByOrderByModifiedDesc();
}
