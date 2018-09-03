package vn.cit.labmanager.config.security;

public class AuthenticationResponseObjectBuilder {
	private static final String AUTH_RESPONSE_OBJ_FORMAT = "{\"success\": %s, \"forwardUrl\": \"%s\"}";
	private boolean isSuccess = false;
	private String forwardUrl = "";
	
	public static AuthenticationResponseObjectBuilder builder() {
		return new AuthenticationResponseObjectBuilder();
	}
	
	public AuthenticationResponseObjectBuilder success(boolean isSuccess) {
		this.isSuccess = isSuccess;
		return this;
	}
	
	public AuthenticationResponseObjectBuilder forwardUrl(String forwardUrl) {
		this.forwardUrl = forwardUrl;
		return this;
	}
	
	public String build() {
		return String.format(AUTH_RESPONSE_OBJ_FORMAT, this.isSuccess, this.forwardUrl);
	}

}
