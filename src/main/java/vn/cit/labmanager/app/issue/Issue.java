package vn.cit.labmanager.app.issue;

import java.time.LocalDate;
import java.util.Comparator;
import java.util.HashSet;
import java.util.Optional;
import java.util.Set;

import javax.persistence.ElementCollection;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToOne;

import org.hibernate.annotations.GenericGenerator;
import org.springframework.format.annotation.DateTimeFormat;
import org.springframework.format.annotation.DateTimeFormat.ISO;

import lombok.Data;
import lombok.EqualsAndHashCode;
import vn.cit.labmanager.app.lab.Lab;
import vn.cit.labmanager.app.user.User;
import vn.cit.labmanager.config.auditing.AuditableEntity;

@Entity
@Data
@EqualsAndHashCode(callSuper = false)
public class Issue extends AuditableEntity {
	
	@Id
    @GeneratedValue(strategy = GenerationType.AUTO, generator = "system-uuid")
    @GenericGenerator(name = "system-uuid", strategy = "uuid2")
	private String id;
	
	@ManyToOne(fetch = FetchType.LAZY)
	private Lab lab;
	
	private String summary;
	
	private String detail;
	
	@DateTimeFormat(iso = ISO.DATE)
	private LocalDate createdDate;
	
	@ManyToOne(fetch = FetchType.LAZY)
	private User createdUser;
	
	@ElementCollection
	private Set<IssueTracking> tracks = new HashSet<>();
	
	public IssueTracking getLatestTrack() {
		Optional<IssueTracking> latest = tracks.stream()
				.max(Comparator.comparing(IssueTracking::getCreatedDate));
		return latest.orElse(null);
	}
	
	public void addTrack(IssueTracking track) {
		tracks.add(track);
	}

}
