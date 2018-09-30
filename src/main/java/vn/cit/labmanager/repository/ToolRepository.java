package vn.cit.labmanager.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import vn.cit.labmanager.domain.Tool;

@Repository
public interface ToolRepository extends JpaRepository<Tool, String> {

}
