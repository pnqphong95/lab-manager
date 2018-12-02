package vn.cit.labmanager.config.security;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.authentication.builders.AuthenticationManagerBuilder;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;
import org.springframework.security.ldap.userdetails.LdapAuthoritiesPopulator;
import org.springframework.security.ldap.userdetails.UserDetailsContextMapper;

@Configuration
@EnableWebSecurity
public class WebSecurityConfig extends WebSecurityConfigurerAdapter {

	@Value("${lm.ldap.ldap-server-url}")
	private String ldapServerUrl;
	
	@Value("${lm.ldap.user-dn-patterns}")
	private String userDnPatterns;
	
	@Value("${lm.ldap.user-search-base}")
	private String userSearchBase;
	
	@Value("${lm.ldap.user-search-filter}")
	private String userSearchFilter;
	
	@Value("${lm.ldap.manager-dn}")
	private String managerDn;
	
	@Value("${lm.ldap.manager-password}")
	private String managerPassword;
	
	@Override
	protected void configure(HttpSecurity http) throws Exception {
		http.authorizeRequests()
				.antMatchers("/admin/category/**").hasAnyRole("SYS_ADMIN")
				.antMatchers("/public/**", "/resources/**", "/resources/public/**").permitAll()
				.antMatchers("/css/**", "/js/**", "/images/**", "/vendor/**/*", "**/favicon.ico").permitAll()
				.antMatchers("/registration", "/api/**", "/h2-console/**").permitAll()
				.antMatchers("/").permitAll()
				.anyRequest().authenticated()
			.and().formLogin()
				.loginPage("/login").permitAll()
				.successHandler(new LabManagerAuthenticationSuccessHandler())
				.failureHandler(new LabManagerAuthenticationFailureHandler())
				.and().logout().permitAll();
		http.csrf().disable();
        http.headers().frameOptions().disable();
	}

	@Override
	protected void configure(AuthenticationManagerBuilder auth) throws Exception {
		auth.ldapAuthentication().ldapAuthoritiesPopulator(getCustomAutoritiesPopulator())
			.userDetailsContextMapper(getUserDetailsContextMapper())
			.userDnPatterns(userDnPatterns)
			.userSearchBase(userSearchBase)
			.userSearchFilter(userSearchFilter)
			.contextSource().url(ldapServerUrl)
			.managerDn(managerDn)
			.managerPassword(managerPassword);
	}
	
	@Bean
	LdapAuthoritiesPopulator getCustomAutoritiesPopulator() {
		return new LabManagerSystemBaseAuthoritiesPopulator();
	}
	
	@Bean
	UserDetailsContextMapper getUserDetailsContextMapper() {
		return new LabManagerLdapUserDetailsMapper();
	}

}
