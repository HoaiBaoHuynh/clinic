<?php

namespace Modules\Doctor\Entities;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'dichvu';
    protected $fillable = [
    	'maSo',
    	'tenDichVu',
    	'chiTiet',
    	'ghiChu',
    	'dvDinhKem',
    	'gia',
    	'created_at',
    ];
}
