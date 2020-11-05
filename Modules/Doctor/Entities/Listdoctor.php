<?php

namespace Modules\Doctor\Entities;

use Illuminate\Database\Eloquent\Model;

class Listdoctor extends Model
{
   	protected $table = 'nhanvien';
    protected $fillable = [
    	'hoTen',
    	'ngaySinh',
    	'gioiTinh',
    	'Avatar',
    	'phanLoai',
    	'chuyenMon',
    	'diaChi',
    ];
}
