
<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class DetailpatientTraslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'patient__listpatient_translations';
}