<?php

namespace Modules\Calendars\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Patient_calendar extends Model
{
    use Translatable;

    protected $table = 'calendars__patient_calendars';
    public $translatedAttributes = [];
    protected $fillable = [];
}
