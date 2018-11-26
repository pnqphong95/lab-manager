package vn.cit.labmanager.app.issue;

import java.time.LocalDate;

import javax.persistence.Embeddable;
import javax.persistence.EnumType;
import javax.persistence.Enumerated;
import javax.persistence.FetchType;
import javax.persistence.ManyToOne;

import org.springframework.format.annotation.DateTimeFormat;
import org.springframework.format.annotation.DateTimeFormat.ISO;

import lombok.Data;
import vn.cit.labmanager.app.user.User;

@Embeddable
@Data
public class IssueTracking {
	
	@Enumerated(EnumType.STRING)
    private IssueStatus status;
	
	private String note;
	
	@DateTimeFormat(iso = ISO.DATE)
	private LocalDate createdDate;
	
	@ManyToOne(fetch = FetchType.LAZY)
	private User createdUser;

}
