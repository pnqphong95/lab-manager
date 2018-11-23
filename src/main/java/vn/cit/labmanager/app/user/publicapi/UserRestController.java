package vn.cit.labmanager.app.user.publicapi;

import static org.springframework.ldap.query.LdapQueryBuilder.query;

import java.util.List;

import javax.naming.NamingException;
import javax.naming.directory.Attributes;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.ldap.core.AttributesMapper;
import org.springframework.ldap.core.LdapTemplate;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;

import vn.cit.labmanager.app.user.UserService;

@RestController
public class UserRestController {
	
	@Value("lm.ldap.user-objectclass")
	private String userLdapObjectClass;
	
	@Autowired
	private LdapTemplate ldapTemplate;
	
	@Autowired
	private UserService service;
	
	@GetMapping("/api/users/check_username")
	@ResponseBody
	public boolean isUsernameNotUniqueOrNotExistInLdap(@RequestParam String username) {
		return !(getUserByUid(username).isEmpty() || service.findByUsername(username).isPresent());
	}
	
	@GetMapping("/api/users/check_email")
	@ResponseBody
	public boolean validateEmail(@RequestParam String email) {
		return !service.findByEmail(email).isPresent();
	}
	
	private List<String> getUserByUid(String uid) {
		return ldapTemplate.search(
			query().where("objectclass").is("person").and("uid").is(uid), new AttributesMapper<String>() {
			public String mapFromAttributes(Attributes attrs) throws NamingException {
				return attrs.get("cn").get().toString();
			}
		});
	}
}
