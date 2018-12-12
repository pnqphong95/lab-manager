package vn.cit.labmanager.app.event.request.handler;

import java.time.LocalDate;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.app.event.request.EventRequest;
import vn.cit.labmanager.app.shift.Shift;
import vn.cit.labmanager.app.shift.ShiftService;

@Service
public class AdditionalEventRequestBuilderImpl implements AdditionalEventRequestBuilder {

	@Autowired
	private ShiftService shiftService;
	
	@Override
	public List<EventRequest> build(EventRequest request) {
		List<EventRequest> requests = Arrays.asList(request);
		List<EventRequest> correctStartDateRequests = buildFromEmptyStartDate(requests);
		return buildFromEmptyShift(correctStartDateRequests);
	}
	
	private List<EventRequest> buildFromEmptyStartDate(List<EventRequest> requests) {
		List<EventRequest> correctStartDateRequests = new ArrayList<>();
		for(EventRequest req : requests) {
			if (req.getStartDate() == null) {
				LocalDate startDate = req.getWeekOfPeriod().getStartDate();
				LocalDate endDate = req.getWeekOfPeriod().getEndDate();
				for (LocalDate date = startDate; date.isBefore(endDate); date = date.plusDays(1)) {
					EventRequest addedRequest = new EventRequest();
					addedRequest.setCourse(req.getCourse());
					addedRequest.setTools(req.getTools());
					addedRequest.setShift(req.getShift());
					addedRequest.setNote(req.getNote());
					addedRequest.setWeekOfPeriod(req.getWeekOfPeriod());
					addedRequest.setStartDate(date);
					correctStartDateRequests.add(addedRequest);
				}
				
			} else {
				correctStartDateRequests.add(req);
			}
		}
		return correctStartDateRequests;
	}
	
	private List<EventRequest> buildFromEmptyShift(List<EventRequest> requests) {
		List<EventRequest> correctShiftRequests = new ArrayList<>();
		for(EventRequest req : requests) {
			if (req.getShift() == null) {
				List<Shift> shifts = shiftService.findAll();
				for(Shift shift : shifts) {
					EventRequest addedRequest = new EventRequest();
					addedRequest.setCourse(req.getCourse());
					addedRequest.setTools(req.getTools());
					addedRequest.setShift(shift);
					addedRequest.setNote(req.getNote());
					addedRequest.setWeekOfPeriod(req.getWeekOfPeriod());
					addedRequest.setStartDate(req.getStartDate());
					correctShiftRequests.add(addedRequest);
				}
			} else {
				correctShiftRequests.add(req);
			}
		}
		return correctShiftRequests;
	}
	
}
