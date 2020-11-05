<?php

namespace Modules\Treatment\Entities;

use Illuminate\Database\Eloquent\Model;

class ListtreatmentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'treatment__listtreatment_translations';
}
