<?php

namespace Modules\Treatment\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $table = 'treatment__categories';
    public $translatedAttributes = [];
    protected $fillable = [];
}
