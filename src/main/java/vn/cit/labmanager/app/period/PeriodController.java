package vn.cit.labmanager.app.period;

import java.time.LocalDate;
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
public class PeriodController {

	@Autowired
	private PeriodService service;
	
	@RequestMapping(path = "/admin/category/periods")
    public String index(Model model) {
		Optional<Period> lastModifiedPeriod = service.findTopByOrderByModifiedDesc();
		String lastModification = lastModifiedPeriod.map(Period::getModified)
				.map(modified -> modified.format(DateTimeFormatter.ofPattern("hh':'mm a',' dd/MM/yyyy")))
				.orElse(StringUtils.EMPTY);
		
		model.addAttribute("periods", service.findAll());
		model.addAttribute("lastModification", lastModification);
        return "admin/category/period/index";
    }
	
	@RequestMapping(path = "/admin/category/periods", method = RequestMethod.POST)
    public String savePeriod(Period period) {
		service.save(period);
		return "redirect:/admin/category/periods";
    }
	
	@RequestMapping(path = "/admin/category/periods/add")
    public String createPeriod(Model model) {
		Period period = new Period();
		period.setStartDate(LocalDate.now());
		period.setStartYear(LocalDate.now().getYear());
		period.setEndYear(LocalDate.now().getYear() + 1);
		period.setAmountOfWeek(20);
        model.addAttribute("period", period);
        model.addAttribute("semesters", PeriodSemester.values());
        return "admin/category/period/edit";   
    }
	
	@RequestMapping(path = "/admin/category/periods/edit/{id}")
    public String editPeriod(@PathVariable(name = "id") String id, Model model) {
        Optional<Period> period = service.findOne(id);
        period.ifPresent(item -> {
        	model.addAttribute("period", item);
        	model.addAttribute("semesters", PeriodSemester.values());
        });
        return "admin/category/period/edit";   
    }
	
	@RequestMapping(path = "/admin/category/periods/delete/{id}")
    public String deletePeriod(@PathVariable(name = "id") String id) {
        service.delete(id);
        return "redirect:/admin/category/periods";   
    }

}
