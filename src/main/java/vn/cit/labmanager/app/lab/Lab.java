package vn.cit.labmanager.app.lab;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;

import lombok.Data;

@Entity
@Data
public class Lab {
	
	@Id
	@GeneratedValue
	private long id;
	
	private String name;

}
