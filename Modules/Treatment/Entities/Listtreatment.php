<?php

namespace Modules\Treatment\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Listtreatment extends Model
{
    use Translatable;

    protected $table = 'treatment__listtreatments';
    public $translatedAttributes = [];
    protected $fillable = [];
}
