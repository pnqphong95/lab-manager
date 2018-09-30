package vn.cit.labmanager.service.impl;

import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.domain.Tool;
import vn.cit.labmanager.repository.ToolRepository;
import vn.cit.labmanager.service.ToolService;

@Service
public class ToolServiceImpl implements ToolService {

	@Autowired
	private ToolRepository repo;

	@Override
	public List<Tool> findAll() {
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
	public Optional<Tool> findOne(String id) {
		Optional<Tool> tool = Optional.empty();
		try {
			tool = repo.findById(id);
		} catch (Exception exception) {
			Logger.getLogger(ToolServiceImpl.class.getName()).warning("Given id is null");
		}
		return tool;
	}

	@Override
	public Tool save(Tool tool) {
		return repo.save(tool);
	}
	
}
