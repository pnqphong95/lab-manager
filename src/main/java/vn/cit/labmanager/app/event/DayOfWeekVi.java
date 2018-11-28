package vn.cit.labmanager.app.event;

import java.time.DayOfWeek;

public enum DayOfWeekVi {
	Hai(DayOfWeek.MONDAY, "Thứ Hai"),
	Ba(DayOfWeek.TUESDAY, "Thứ Ba"),
	Tu(DayOfWeek.WEDNESDAY,"Thứ Tư"),
	Nam(DayOfWeek.THURSDAY,"Thứ Năm"),
	Sau(DayOfWeek.FRIDAY, "Thứ Sáu"),
	Bay(DayOfWeek.SATURDAY, "Thứ Bảy"),
	ChuNhat(DayOfWeek.SUNDAY, "Chủ Nhật");
	
	private DayOfWeek dayOfWeek;
	private String viText;

	private DayOfWeekVi(DayOfWeek dayOfWeek, String viText) {
		this.dayOfWeek = dayOfWeek;
		this.viText = viText;
	}

	public DayOfWeek getDayOfWeek() {
		return dayOfWeek;
	}

	public String getViText() {
		return viText;
	}
	
	public static DayOfWeekVi from(DayOfWeek dayOfWeek) {
		for(DayOfWeekVi dayOfWeekVi : DayOfWeekVi.values()) {
			if (dayOfWeek == dayOfWeekVi.dayOfWeek) {
				return dayOfWeekVi;
			}
		}
		return null;
	}

}
