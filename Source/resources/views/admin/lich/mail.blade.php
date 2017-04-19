form action="admin/mail/mail" method="POST">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="text" name="ipname">
	<button type="submit">Gửi</button>
</form>