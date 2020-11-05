<?php

namespace Modules\Doctor\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'doctor__category_translations';
}
