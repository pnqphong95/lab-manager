package vn.cit.labmanager.app.tool.publicapi;

import lombok.Data;
import vn.cit.labmanager.app.tool.Tool;

@Data
public class ToolDto {
	private String id;
	private String name;
	private String version;
	
	public static ToolDto fromTool(Tool tool) {
		ToolDto dto = new ToolDto();
		dto.setId(tool.getId());
		dto.setName(tool.getName());
		dto.setVersion(tool.getVersion());
		return dto;
	}
}
