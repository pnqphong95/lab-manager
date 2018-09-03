package vn.cit.labmanager.config;

import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.authentication.builders.AuthenticationManagerBuilder;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;

import vn.cit.labmanager.config.security.LabManagerAuthenticationFailureHandler;
import vn.cit.labmanager.config.security.LabManagerAuthenticationSuccessHandler;

@Configuration
@EnableWebSecurity
public class WebSecurityConfig extends WebSecurityConfigurerAdapter {

	@Override
	protected void configure(HttpSecurity http) throws Exception {
		http.authorizeRequests()
				.antMatchers("/public/**", "/resources/**", "/resources/public/**").permitAll()
				.antMatchers("/css/**", "/js/**", "/images/**", "/vendor/**/*", "**/favicon.ico").permitAll()
				.antMatchers("/registration").permitAll()
				.antMatchers("/").permitAll()
				.anyRequest().authenticated()
			.and().formLogin()
				.loginPage("/login").permitAll()
				.successHandler(new LabManagerAuthenticationSuccessHandler())
				.failureHandler(new LabManagerAuthenticationFailureHandler())
				.and().logout().permitAll();
	}

	@Override
	protected void configure(AuthenticationManagerBuilder auth) throws Exception {
		auth.ldapAuthentication()
			.userDnPatterns("uid={0},ou=people")
			.userSearchBase("ou=people")
			.userSearchFilter("uid={0}")
			.groupSearchBase("ou=groups")
			.groupSearchFilter("uniqueMember={0}")
			.contextSource().url("ldap://localhost:33389/dc=pnqphong,dc=com");
	}

}
