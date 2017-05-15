<!DOCTYPE html>
<html>
<head>
	<title>BẢNG SỐ LIỆU THỐNG KÊ</title>
</head>
<body>

    <h3>BẢNG SỐ LIỆU THỐNG KÊ
    </h3>
    <p>(Từ tuần {{$tuanBD}} đến tuần {{$tuanKT}})</p>
    <table>
        <tr>
            <th>Tên bộ môn</th>
            <th>Số lần</th>
            <th>Tỉ lệ (%)</th>
        </tr>
        @foreach($sosanhBoMon as $bm)
        <tr>
            <td>
                @foreach($allBoMon as $abm)
                    @if($bm->idBoMon == $abm->id)   
                        {{$abm->TenVietTat}}
                    @endif
                @endforeach
            </td>
            <td>{{$bm->SoLan}}</td>
            <td>
                <?php $phantram = ($bm->SoLan/$tong)*100;
                    echo round($phantram,2);
                 ?>
            </td>
        </tr>
        @endforeach
        <tr>
            <td>
                Tổng
            </td>
            <td>{{$tong}}</td>
            <td>
                100%
            </td>
        </tr>
    </table> 

</body>
</html>
