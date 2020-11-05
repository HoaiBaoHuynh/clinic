<?php

namespace Modules\Patient\Repositories\Cache;

use Modules\Patient\Repositories\ListpatientRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheListpatientDecorator extends BaseCacheDecorator implements ListpatientRepository
{
    public function __construct(ListpatientRepository $listpatient)
    {
        parent::__construct();
        $this->entityName = 'patient.listpatients';
        $this->repository = $listpatient;
    }
}
