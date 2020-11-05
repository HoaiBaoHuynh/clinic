<?php

namespace Modules\Doctor\Repositories\Cache;

use Modules\Doctor\Repositories\ListdoctorRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheListdoctorDecorator extends BaseCacheDecorator implements ListdoctorRepository
{
    public function __construct(ListdoctorRepository $listdoctor)
    {
        parent::__construct();
        $this->entityName = 'doctor.listdoctors';
        $this->repository = $listdoctor;
    }
}
