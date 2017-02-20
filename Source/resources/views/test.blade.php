{{-- @if($phong)
@foreach($phong as $phong)
{{$phong->TenPhong}}
@endforeach
@else
{{'khong co phong'}}
@endif --}}

@if($lich)
@foreach($lich as $lich)
{{$lich->idThu."  " .$lich->idPhong}}<br>
@endforeach
@else
{{'khong co phong'}}
@endif