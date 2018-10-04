package vn.cit.labmanager.tool;

import java.util.List;
import java.util.Optional;

public interface ToolService {
	public List<Tool> findAll();
	public boolean delete(String id);
	public Optional<Tool> findOne(String id);
	public Tool save(Tool tool);
	public Optional<Tool> findTopByOrderByModifiedDesc();
}
