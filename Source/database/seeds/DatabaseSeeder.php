<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
		$admin->name         = 'admin';
		$admin->display_name = 'Administrator';
		$admin->description  = 'User is allowed to manage and edit other users';
		$admin->save();

		$user = User::where('MaGV', '=', '0001')->first();

		$user->attachRole($admin);

		$quanLiNguoiDung = new Permission();
		$quanLiNguoiDung->name         = 'quanlinguoidung';
		$quanLiNguoiDung->display_name = 'Quản lí người dùng';
		// Allow a user to...
		$quanLiNguoiDung->description  = 'quan li nguoi dung';
		$quanLiNguoiDung->save();

		$quanLiDanhMuc = new Permission();
		$quanLiDanhMuc->name         = 'quanlidanhmuc';
		$quanLiDanhMuc->display_name = 'Quản lí danh mục';
		// Allow a user to...
		$quanLiDanhMuc->description  = 'quan li danh muc';
		$quanLiDanhMuc->save();

		$admin->attachPermission ($quanLiNguoiDung);
    }
}
