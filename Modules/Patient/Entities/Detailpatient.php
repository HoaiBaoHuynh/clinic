<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Detailpatient extends Model
{

    protected $table = 'lichsukham';
    protected $fillable = [
    'id',
    'id_benhNhan',
    'id_nhanVien',
    'id_dichVu',
    'ghiChu',
    'date'
    ];
}