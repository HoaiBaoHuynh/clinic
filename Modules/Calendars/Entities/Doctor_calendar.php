<?php

namespace Modules\Calendars\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Doctor_calendar extends Model
{
    use Translatable;

    protected $table = 'calendars__doctor_calendars';
    public $translatedAttributes = [];
    protected $fillable = [];
}