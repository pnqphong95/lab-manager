package vn.cit.labmanager.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import vn.cit.labmanager.domain.Shift;

@Repository
public interface ShiftRepository extends JpaRepository<Shift, Long> {

}
