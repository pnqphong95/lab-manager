package vn.cit.labmanager.app.issue;

public enum IssueStatus {
	Created("Vừa tạo"),
	Processing("Đang xử lý"),
	Done("Đã sửa");
	
	private String text;

	private IssueStatus(String text) {
		this.text = text;
	}

	public String getText() {
		return text;
	}

}
