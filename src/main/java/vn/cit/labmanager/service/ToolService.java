package vn.cit.labmanager.service;

import java.util.List;
import java.util.Optional;

import vn.cit.labmanager.domain.Tool;

public interface ToolService {
	public List<Tool> findAll();
	public boolean delete(String id);
	public Optional<Tool> findOne(String id);
	public Tool save(Tool tool);
}
