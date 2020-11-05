<?php

namespace Modules\Calendars\Repositories\Cache;

use Modules\Calendars\Repositories\Patient_calendarRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePatient_calendarDecorator extends BaseCacheDecorator implements Patient_calendarRepository
{
    public function __construct(Patient_calendarRepository $patient_calendar)
    {
        parent::__construct();
        $this->entityName = 'calendars.patient_calendars';
        $this->repository = $patient_calendar;
    }
}
