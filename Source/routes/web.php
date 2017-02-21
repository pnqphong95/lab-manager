<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\TaiKhoan;
use App\BoMon;
use App\ChucVu;
use App\Phong;
use App\GiaoVien;
use App\PhanMem;
use App\Lich;
use App\LopHocPhan;

Route::get('/', 'TrangChuController@getTrangChu')->name('root');

//Route::post('dangnhap', ['as'=> 'dangnhap', 'uses'=> 'TaiKhoanCTL@dangnhap']);

Route::get('test/{id}', function($id){
	$tk = TaiKhoan::add($id);
	
	echo "oke! ".$id;
});

Route::get('xoa/{id}', function($id){
	TaiKhoan::xoa($id);
	
	echo "oke! ".$id;
});

Route::get('all', function(){
	$i = 0;
    $arr = TaiKhoan::get();
    // foreach ($arr as $key => $value) {
    // 	echo $value;
    // }
    
    return view('taikhoan', ['data' => $arr]);
    //view('taikhoan')->with('data', $data);
});

Route::get('allbm', function(){
	$i = 0;
    $arr = BoMon::get();
    // foreach ($arr as $key => $value) {
    // 	echo $value;
    // }
    
    return view('taikhoan', ['data' => $arr]);
    //view('taikhoan')->with('data', $data);
});

Route::get('test', function(){
	$bomon = BoMon::find(1);
	foreach ($bomon->giaovien as $giaovien) {
		echo $giaovien->TenGV;
	}
});

Route::get('test1', function(){
	$chucvu = ChucVu::find(1);
	foreach ($chucvu->giaovien_chucvu as $giaovien_chucvu) {
		$giaovien = GiaoVien::find($giaovien_chucvu->idGiaoVien);
		echo $giaovien->TenGV."<br>";
	}
});



Route::get('test2', function(){
	$lophocphan = LopHocPhan::find(3);
	echo $lophocphan->TenLop;
});


Route::get('login', 'DangNhapController@getDangNhap')->name('getLogin');
Route::post('login', 'DangNhapController@postDangNhap')->name('postLogin');


