<?php

namespace Modules\Patient\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use Translatable;

    protected $table = 'benhnhan';
/*    protected $fillable = [
    'id',
    'hoTen',
    'cmnd',
    'sdt',
    'diaChi',
    'ghiChu',
    'ngaySinh',
    'gioiTinh',
    ];*/
    
}
