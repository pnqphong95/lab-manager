package vn.cit.labmanager.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import vn.cit.labmanager.domain.Lab;

@Repository
public interface LabRepository extends JpaRepository<Lab, Long> {

}
