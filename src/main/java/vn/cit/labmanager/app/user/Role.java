package vn.cit.labmanager.app.user;

public enum Role {
	R1("SYS_ADMIN", "Quản trị hệ thống", 1),
	R2("DEPT_ADMIN", "Quản lý bộ môn", 2),
	R3("GRANTED_USER", "Giảng viên", 3),
	R4("NOT_GRANDTED_USER", "Tài khoản chưa được cấp quyền", 4);
	
	private String name;
	private String text;
	private int level;
	
	private Role(String name, String text, int level) {
		this.name = name;
		this.text = text;
		this.level = level;
	}

	public String getName() {
		return name;
	}

	public String getText() {
		return text;
	}

	public int getLevel() {
		return level;
	}
	
}
