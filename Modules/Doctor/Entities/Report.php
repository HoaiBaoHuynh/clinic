<?php

namespace Modules\Doctor\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use Translatable;

    protected $table = 'doctor__reports';
    public $translatedAttributes = [];
    protected $fillable = [];
}
