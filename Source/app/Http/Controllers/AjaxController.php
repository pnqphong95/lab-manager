<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VanDe;
use DB;
use App\User;
use App\Role;

class AjaxController extends Controller
{
    public function getLich ($idHKNK, $tuan) 
    {
    	$idHocKyNienKhoa = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
	    $lich = DB::table('lich')		->join('monhoc','monhoc.id', '=', 'idMonHoc')
	    								->join('giaovien','giaovien.id', '=', 'idGiaoVien')
	    								->where('idTuan', $tuan)
	    								->where ('idHocKyNienKhoa', $idHKNK)
	    								->get();
	    return json_encode($lich);
	}

	public function suaLoi ($id)
	{
		$vande = VanDe::find($id);
		$vande->trangThai = 1;
		$vande->save();
		return ['status' => '200'];
	}

	public function addRole ($magv, $roleName)
	{
		$giaovien = User::where ('MaGV', '=', $magv)->first();
		$role = Role::where('name', '=', $roleName)->first();		
		$giaovien->attachRole($role);
		return header("HTTP/1.1 200 OK");
	}

	public function removeRole ($magv, $roleName)
	{
		$user = User::where('MaGV', '=', $magv)->first();
		$role = Role::where('name', '=', $roleName)->first();
		$user->detachRole($role);
	}
}
