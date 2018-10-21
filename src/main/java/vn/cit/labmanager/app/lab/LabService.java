package vn.cit.labmanager.app.lab;

import java.util.List;
import java.util.Optional;

public interface LabService {
	public List<Lab> findAll();
	public boolean delete(String id);
	public Optional<Lab> findOne(String id);
	public Lab save(Lab lab);
	public Optional<Lab> findTopByOrderByModifiedDesc();
}
