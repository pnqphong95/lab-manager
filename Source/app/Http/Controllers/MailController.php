<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Mail;
use App\GiaoVien;
use App\ChucVu;
use App\BoMon;
use Redirect; 

class MailController extends Controller
{
	public function getDanhSach()
    {
    	$giaovien = GiaoVien::all();
    	$chucvu = ChucVu::all();
    	$bomon = BoMon::all();
    	return view('admin.mail.danhsach', compact('giaovien','chucvu','bomon'));
    }

    public function getMail($id)
    {
    	$giaovien = GiaoVien::find($id);
    	return view('admin.mail.mail', compact('giaovien'));
    }

    public function postMail(Request $request)
    {
    	$data = [   'idGV'=> $request->idGV,
    				'Email'=> $request->Email,
					'MaGV'=> $request->MaGV,
					'HoGV'=> $request->HoGV,
					'TenGV'=> $request->TenGV,
					'subject'=> $request->subject,
					'noidung'=> $request->noidung, 
					'from' => 'anmapmap2017@gmail.com', 
					'from_name' => 'Admin'
    			];
        $a = GiaoVien::select('id')->where('MaGV',$request->MaGV)->first();
    	Mail::send( 'admin.mail.blanks', $data, function( $message ) use ($data)
		{
		    $message	->to( $data['Email'], $data['HoGV'] )
		    			->from( $data['from'], $data['from_name'] )
		    			->subject( $data['subject'] );
		});
    	echo 
    	//return redirect('admin/giaovien/sua/'.$data['idGV']);
        "<script>
            alert('Bạn đã gửi mail thành công');
            window.location = '".url('admin/mail/danhsach')."'
        </script>";

    }
}
