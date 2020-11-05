<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Listpatient extends Model
{

    protected $table = 'benhnhan';
    protected $fillable = [
    'id',
    'hoTen',
    'cmnd',
    'sdt',
    'diaChi',
    'ghiChu',
    'ngaySinh',
    'gioiTinh',
    ];
}
