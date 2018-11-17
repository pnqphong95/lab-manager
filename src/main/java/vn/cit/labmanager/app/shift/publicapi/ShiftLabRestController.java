package vn.cit.labmanager.app.shift.publicapi;

import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import vn.cit.labmanager.app.lab.Lab;
import vn.cit.labmanager.app.lab.LabService;
import vn.cit.labmanager.app.shift.Shift;
import vn.cit.labmanager.app.shift.ShiftService;

@RestController
public class ShiftLabRestController {
	
	@Autowired
	private ShiftService shiftService;
	
	@Autowired
	private LabService labService;
	
	@GetMapping("/api/shiftlabs")
	public List<ShiftLabPublicDto> findAll() {
		List<ShiftLabPublicDto> dtos = new ArrayList<>();
		List<Shift> shifts = shiftService.findAll();
		List<Lab> labs = labService.findAll();
		for(Shift shift : shifts) {
			for(Lab lab : labs) {
				ShiftLabPublicDto dto = new ShiftLabPublicDto();
				dto.setId(shift.getId() + "|" + lab.getId());
				dto.setShift(shift.getName());
				dto.setLabName(lab.getName());
				dtos.add(dto);
			}
		}
		return dtos;
	}

}
