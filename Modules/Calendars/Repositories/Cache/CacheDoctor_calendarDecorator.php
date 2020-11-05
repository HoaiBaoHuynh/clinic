<?php

namespace Modules\Calendars\Repositories\Cache;

use Modules\Calendars\Repositories\Doctor_calendarRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDoctor_calendarDecorator extends BaseCacheDecorator implements Doctor_calendarRepository
{
    public function __construct(Doctor_calendarRepository $doctor_calendar)
    {
        parent::__construct();
        $this->entityName = 'calendars.doctor_calendars';
        $this->repository = $doctor_calendar;
    }
}
