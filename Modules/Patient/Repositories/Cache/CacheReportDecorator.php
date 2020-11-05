<?php

namespace Modules\Patient\Repositories\Cache;

use Modules\Patient\Repositories\ReportRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheReportDecorator extends BaseCacheDecorator implements ReportRepository
{
    public function __construct(ReportRepository $report)
    {
        parent::__construct();
        $this->entityName = 'patient.reports';
        $this->repository = $report;
    }
}
