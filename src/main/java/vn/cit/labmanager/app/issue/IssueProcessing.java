package vn.cit.labmanager.app.issue;

import lombok.Data;

@Data
public class IssueProcessing {
	private String issueId;
	private IssueStatus status;
	private String note;
	
	public static IssueProcessing from(Issue issue) {
		IssueProcessing processing = new IssueProcessing();
		processing.setIssueId(issue.getId());
		return processing;
	}
}
