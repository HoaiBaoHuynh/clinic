<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class ReportTranslation extends Model
{
	
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'patient__report_translations';
}
