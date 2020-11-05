<?php

namespace Modules\Calendars\Entities;

use Illuminate\Database\Eloquent\Model;

class LichLamViec extends Model
{
    protected $table = 'lichlamviec';
    protected $fillable = ['id_ca','id_ngaylamviec'];
    public $timestamps = false;
}
