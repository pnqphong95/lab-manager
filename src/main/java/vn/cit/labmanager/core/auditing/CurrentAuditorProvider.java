package vn.cit.labmanager.core.auditing;

import java.util.Optional;

import org.springframework.data.domain.AuditorAware;

public enum CurrentAuditorProvider implements AuditorAware<String> {

	INSTANCE;

	@Override
	public Optional<String> getCurrentAuditor() {
		return Optional.of("Anonymous");
	}
	
}
