<?php

namespace Modules\Doctor\Entities;

use Illuminate\Database\Eloquent\Model;

class NgayLamViec extends Model
{
    protected $table = 'ngaylamviec';
    protected $fillable = ['id_nhanVien','ngay'];
    public $timestamps = false;
}