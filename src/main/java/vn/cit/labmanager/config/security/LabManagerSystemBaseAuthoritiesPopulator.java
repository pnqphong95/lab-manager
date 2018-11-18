package vn.cit.labmanager.config.security;

import java.util.Collection;
import java.util.HashSet;
import java.util.Optional;
import java.util.stream.Collectors;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.ldap.core.DirContextOperations;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.authority.SimpleGrantedAuthority;
import org.springframework.security.ldap.userdetails.LdapAuthoritiesPopulator;

import vn.cit.labmanager.app.user.Role;
import vn.cit.labmanager.app.user.User;
import vn.cit.labmanager.app.user.UserService;

public class LabManagerSystemBaseAuthoritiesPopulator implements LdapAuthoritiesPopulator {

	@Autowired
	private UserService userService;
	
	@Override
	public Collection<? extends GrantedAuthority> getGrantedAuthorities(DirContextOperations userData, String username) {
		Collection<GrantedAuthority> gas = new HashSet<GrantedAuthority>();
		Optional<User> loggedUser = userService.findByUsername(username);
		loggedUser.ifPresent(item -> {
			gas.addAll(item.getRoles().stream()
					.map(Role::getName)
					.map(SimpleGrantedAuthority::new)
					.collect(Collectors.toSet()));
		});
		gas.add(new SimpleGrantedAuthority(Role.R4.getName()));
        return gas;
	}

}
