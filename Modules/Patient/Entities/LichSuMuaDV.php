<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class LichSuMuaDV extends Model
{

    protected $table = 'lichsumuadichvu';
    protected $fillable = [
    'id_benhNhan',
    'maHoaDon',
    'id_dichVu',
    'gia',
    'date',
    ];
}