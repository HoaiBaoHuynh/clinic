<?php

namespace Modules\Doctor\Entities;

use Illuminate\Database\Eloquent\Model;

class ListdoctorTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'doctor__listdoctor_translations';
}
