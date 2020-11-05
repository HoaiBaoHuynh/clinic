<?php

namespace Modules\Doctor\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $table = 'doctor__categories';
    public $translatedAttributes = [];
    protected $fillable = [];
}
