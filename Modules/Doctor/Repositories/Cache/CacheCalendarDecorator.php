<?php

namespace Modules\Doctor\Repositories\Cache;

use Modules\Doctor\Repositories\CalendarRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCalendarDecorator extends BaseCacheDecorator implements CalendarRepository
{
    public function __construct(CalendarRepository $calendar)
    {
        parent::__construct();
        $this->entityName = 'doctor.calendars';
        $this->repository = $calendar;
    }
}
