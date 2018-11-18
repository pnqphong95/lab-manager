package vn.cit.labmanager.app.user;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface UserRepository extends JpaRepository<User, String> {

	public User findTopByOrderByModifiedDesc();
	public User findByUsername(String username);

}
