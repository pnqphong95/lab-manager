package vn.cit.labmanager.config.security;

import java.io.IOException;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import org.springframework.security.core.Authentication;
import org.springframework.security.web.authentication.SimpleUrlAuthenticationSuccessHandler;
import org.springframework.security.web.savedrequest.SavedRequest;

public class LabManagerAuthenticationSuccessHandler extends SimpleUrlAuthenticationSuccessHandler {

	@Override
	public void onAuthenticationSuccess(HttpServletRequest request, HttpServletResponse response, Authentication authentication) throws IOException, ServletException {
		HttpSession session = request.getSession();
	    SavedRequest savedRequest = (SavedRequest) session.getAttribute("SPRING_SECURITY_SAVED_REQUEST");
	    String forwardUrl = request.getContextPath();
	    if(savedRequest != null) {
	    	forwardUrl = savedRequest.getRedirectUrl();
	    }
	    response.getWriter().print(AuthenticationResponseObjectBuilder.builder().success(true).forwardUrl(forwardUrl).build());
		response.getWriter().flush();
	}

}
