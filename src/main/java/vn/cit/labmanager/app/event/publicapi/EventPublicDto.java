package vn.cit.labmanager.app.event.publicapi;

import java.time.LocalDate;

import org.springframework.format.annotation.DateTimeFormat;
import org.springframework.format.annotation.DateTimeFormat.ISO;

import lombok.Data;

@Data
public class EventPublicDto {
	private String id;
	private String resourceId;
	private String title;

	@DateTimeFormat(iso = ISO.DATE)
	private LocalDate start;
}
