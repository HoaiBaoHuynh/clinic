<?php

namespace Modules\Doctor\Repositories\Cache;

use Modules\Doctor\Repositories\ReportRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheReportDecorator extends BaseCacheDecorator implements ReportRepository
{
    public function __construct(ReportRepository $report)
    {
        parent::__construct();
        $this->entityName = 'doctor.reports';
        $this->repository = $report;
    }
}
