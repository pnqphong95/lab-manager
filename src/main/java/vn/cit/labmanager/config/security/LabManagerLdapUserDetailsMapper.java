package vn.cit.labmanager.config.security;

import java.util.Collection;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.ldap.core.DirContextOperations;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.ldap.userdetails.LdapUserDetails;
import org.springframework.security.ldap.userdetails.LdapUserDetailsMapper;

import vn.cit.labmanager.app.user.User;
import vn.cit.labmanager.app.user.UserService;

public class LabManagerLdapUserDetailsMapper extends LdapUserDetailsMapper {
	
	@Autowired
	private UserService service;

	@Override
	public UserDetails mapUserFromContext(DirContextOperations ctx, String username, Collection<? extends GrantedAuthority> authorities) {
		UserDetails details = super.mapUserFromContext(ctx, username, authorities);
		Optional<User> user = service.findByUsername(username);
		return new LabManagerLdapUserDetails((LdapUserDetails) details, user.orElse(null));
	}
	
}
