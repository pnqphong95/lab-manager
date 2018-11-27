package vn.cit.labmanager.app.issue;

public enum IssueStatus {
	Created("Đã nhận", "badge badge-secondary"),
	Done("Đã sửa", "badge badge-success");
	
	private String text;
	private String bsLabelClass;

	private IssueStatus(String text, String bsLabelClass) {
		this.text = text;
		this.bsLabelClass = bsLabelClass;
	}

	public String getText() {
		return text;
	}

	public String getBsLabelClass() {
		return bsLabelClass;
	}

}
