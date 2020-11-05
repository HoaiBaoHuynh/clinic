<?php

namespace Modules\Calendars\Entities;

use Illuminate\Database\Eloquent\Model;

class Patient_calendarTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'calendars__patient_calendar_translations';
}
