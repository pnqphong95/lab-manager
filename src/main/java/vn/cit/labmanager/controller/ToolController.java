package vn.cit.labmanager.controller;

import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import vn.cit.labmanager.domain.Tool;
import vn.cit.labmanager.service.ToolService;

@Controller
public class ToolController {

	@Autowired
	private ToolService service;
	
	@RequestMapping(path = "/admin/category/tools")
    public String index(Model model) {
		model.addAttribute("tools", service.findAll());
        return "admin/category/tool/index";
    }
	
	@RequestMapping(path = "/admin/category/tools", method = RequestMethod.POST)
    public String saveTool(Tool tool) {
		service.save(tool);
		return "redirect:/admin/category/tools";
    }
	
	@RequestMapping(path = "/admin/category/tools/add")
    public String createTool(Model model) {
        model.addAttribute("tool", new Tool());
        return "admin/category/tool/edit";   
    }
	
	@RequestMapping(path = "/admin/category/tools/edit/{id}")
    public String editTool(@PathVariable(name = "id") String id, Model model) {
        Optional<Tool> tool = service.findOne(id);
        tool.ifPresent(item -> {
        	model.addAttribute("tool", item);
        });
        return "admin/category/tool/edit";   
    }
	
	@RequestMapping(path = "/admin/category/tools/delete/{id}")
    public String deleteTool(@PathVariable(name = "id") String id) {
        service.delete(id);
        return "redirect:/admin/category/tools";   
    }

}
