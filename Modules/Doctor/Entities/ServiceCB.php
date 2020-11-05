<?php

namespace Modules\Doctor\Entities;

use Illuminate\Database\Eloquent\Model;

class ServiceCB extends Model
{
    protected $table = 'dvcombo';
    protected $fillable = [
    	'id_dichvu',
    	'status',
    ];
    public $timestamps = false;
}