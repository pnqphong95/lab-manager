package vn.cit.labmanager.config.auditing;

import java.util.Optional;

import org.springframework.data.domain.AuditorAware;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.core.userdetails.UserDetails;

public enum CurrentAuditorProvider implements AuditorAware<String> {

	INSTANCE;

	@Override
	public Optional<String> getCurrentAuditor() {
		UserDetails details = (UserDetails) SecurityContextHolder.getContext().getAuthentication().getPrincipal();
		return Optional.ofNullable(details.getUsername());
	}
	
}
