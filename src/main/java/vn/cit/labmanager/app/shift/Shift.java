package vn.cit.labmanager.app.shift;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;

import lombok.Data;

@Entity
@Data
public class Shift {
	
	@Id
	@GeneratedValue
	private long id;
	
	private String shift;

}
