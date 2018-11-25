package vn.cit.labmanager.config.security;

import java.util.Collection;

import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.ldap.userdetails.LdapUserDetails;

import vn.cit.labmanager.app.user.User;

public class LabManagerLdapUserDetails implements LdapUserDetails {

	private static final long serialVersionUID = -592165619194217645L;
	
	private LdapUserDetails details;
	private User user;
	
	public LabManagerLdapUserDetails(LdapUserDetails details, User user) {
		this.details = details;
		this.user = user;
	}

	public User getUser() {
		return user;
	}

	public void setUser(User user) {
		this.user = user;
	}

	@Override
	public Collection<? extends GrantedAuthority> getAuthorities() {
		return details.getAuthorities();
	}

	@Override
	public String getPassword() {
		return details.getPassword();
	}

	@Override
	public String getUsername() {
		return details.getUsername();
	}

	@Override
	public boolean isAccountNonExpired() {
		return details.isAccountNonExpired();
	}

	@Override
	public boolean isAccountNonLocked() {
		return details.isAccountNonLocked();
	}

	@Override
	public boolean isCredentialsNonExpired() {
		return details.isCredentialsNonExpired();
	}

	@Override
	public boolean isEnabled() {
		return details.isEnabled();
	}

	@Override
	public void eraseCredentials() {
		details.eraseCredentials();
	}

	@Override
	public String getDn() {
		return details.getDn();
	}
	
}
