package vn.cit.labmanager.app.user;

import java.util.List;
import java.util.Optional;

public interface UserService {
	public List<User> findAll();
	public boolean delete(String id);
	public Optional<User> findOne(String id);
	public User save(User user);
	public Optional<User> findTopByOrderByModifiedDesc();
	public Optional<User> findByUsername(String username);
}
