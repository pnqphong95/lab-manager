package vn.cit.labmanager.core.auditing;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.data.auditing.CurrentDateTimeProvider;
import org.springframework.data.auditing.DateTimeProvider;
import org.springframework.data.domain.AuditorAware;
import org.springframework.data.jpa.repository.config.EnableJpaAuditing;

@Configuration
@EnableJpaAuditing(auditorAwareRef = "auditorProvider", dateTimeProviderRef="auditDateTimeProvider")
public class AuditingConfiguration {
	
	@Bean
    public AuditorAware<String> auditorProvider() {
        return CurrentAuditorProvider.INSTANCE;
    }

	@Bean
	public DateTimeProvider auditDateTimeProvider() {
		return CurrentDateTimeProvider.INSTANCE;
	}

}
