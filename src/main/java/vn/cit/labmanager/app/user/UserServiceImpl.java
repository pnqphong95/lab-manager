package vn.cit.labmanager.app.user;

import java.util.List;
import java.util.Optional;
import java.util.logging.Logger;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import vn.cit.labmanager.app.user.User;
import vn.cit.labmanager.app.user.UserServiceImpl;

@Service
public class UserServiceImpl implements UserService {
	
	@Autowired
	private UserRepository repo;
	
	@Override
	public List<User> findAll() {
		return repo.findAll();
	}

	@Override
	public boolean delete(String id) {
		try {
			repo.deleteById(id);
		} catch (Exception exception) {
			return false;
		}
		return true;
	}

	@Override
	public Optional<User> findOne(String id) {
		Optional<User> user = Optional.empty();
		try {
			user = repo.findById(id);
		} catch (Exception exception) {
			Logger.getLogger(UserServiceImpl.class.getName()).warning("Given id is null");
		}
		return user;
	}

	@Override
	public User save(User user) {
		return repo.save(user);
	}

	@Override
	public Optional<User> findTopByOrderByModifiedDesc() {
		return Optional.ofNullable(repo.findTopByOrderByModifiedDesc());
	}

	@Override
	public Optional<User> findByUsername(String username) {
		return Optional.ofNullable(repo.findByUsername(username));
	}

}
