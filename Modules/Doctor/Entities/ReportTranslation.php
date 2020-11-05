<?php

namespace Modules\Doctor\Entities;

use Illuminate\Database\Eloquent\Model;

class ReportTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'doctor__report_translations';
}
