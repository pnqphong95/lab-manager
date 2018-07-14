package vn.cit.labmanager.domain;

public enum PeriodSemester {
	First("1", "I"),
	Second("2", "II"),
	Summer("Hè","Hè");
	
	private String labelAsNumber;
	private String labelAsText;

	private PeriodSemester(String labelAsNumber, String labelAsText) {
		this.labelAsNumber = labelAsNumber;
		this.labelAsText = labelAsText;
	}

	public String getLabelAsNumber() {
		return labelAsNumber;
	}

	public String getLabelAsText() {
		return labelAsText;
	}

}
