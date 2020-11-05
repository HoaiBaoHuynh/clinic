<?php

namespace Modules\Treatment\Repositories\Cache;

use Modules\Treatment\Repositories\ListtreatmentRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheListtreatmentDecorator extends BaseCacheDecorator implements ListtreatmentRepository
{
    public function __construct(ListtreatmentRepository $listtreatment)
    {
        parent::__construct();
        $this->entityName = 'treatment.listtreatments';
        $this->repository = $listtreatment;
    }
}
