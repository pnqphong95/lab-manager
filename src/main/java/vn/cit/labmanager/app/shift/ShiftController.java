package vn.cit.labmanager.app.shift;

import java.time.format.DateTimeFormatter;
import java.util.Optional;

import org.apache.commons.lang3.StringUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller
public class ShiftController {

	@Autowired
	private ShiftService service;
	
	@RequestMapping(path = "/admin/category/shifts")
    public String index(Model model) {
		Optional<Shift> lastModifiedShift = service.findTopByOrderByModifiedDesc();
		String lastModification = lastModifiedShift.map(Shift::getModified)
				.map(modified -> modified.format(DateTimeFormatter.ofPattern("hh':'mm a',' dd/MM/yyyy")))
				.orElse(StringUtils.EMPTY);
		
		model.addAttribute("shifts", service.findAll());
		model.addAttribute("lastModification", lastModification);
        return "admin/category/shift/index";
    }
	
	@RequestMapping(path = "/admin/category/shifts", method = RequestMethod.POST)
    public String saveShift(Shift shift) {
		service.save(shift);
		return "redirect:/admin/category/shifts";
    }
	
	@RequestMapping(path = "/admin/category/shifts/add")
    public String createShift(Model model) {
        model.addAttribute("shift", new Shift());
        return "admin/category/shift/edit";   
    }
	
	@RequestMapping(path = "/admin/category/shifts/edit/{id}")
    public String editShift(@PathVariable(name = "id") String id, Model model) {
        Optional<Shift> shift = service.findOne(id);
        shift.ifPresent(item -> {
        	model.addAttribute("shift", item);
        });
        return "admin/category/shift/edit";   
    }
	
	@RequestMapping(path = "/admin/category/shifts/delete/{id}")
    public String deleteShift(@PathVariable(name = "id") String id) {
        service.delete(id);
        return "redirect:/admin/category/shifts";   
    }

}
