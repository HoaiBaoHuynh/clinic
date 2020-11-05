<?php

namespace Modules\Doctor\Repositories\Cache;

use Modules\Doctor\Repositories\ServiceRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheServiceDecorator extends BaseCacheDecorator implements ServiceRepository
{
    public function __construct(ServiceRepository $service)
    {
        parent::__construct();
        $this->entityName = 'doctor.services';
        $this->repository = $service;
    }
}
