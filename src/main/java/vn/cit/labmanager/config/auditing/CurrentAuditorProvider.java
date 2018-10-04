package vn.cit.labmanager.config.auditing;

import java.util.Optional;

import org.springframework.data.domain.AuditorAware;

public enum CurrentAuditorProvider implements AuditorAware<String> {

	INSTANCE;

	@Override
	public Optional<String> getCurrentAuditor() {
		return Optional.of("Anonymous");
	}
	
}
