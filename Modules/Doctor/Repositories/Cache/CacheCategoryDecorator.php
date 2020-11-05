<?php

namespace Modules\Doctor\Repositories\Cache;

use Modules\Doctor\Repositories\CategoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCategoryDecorator extends BaseCacheDecorator implements CategoryRepository
{
    public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->entityName = 'doctor.categories';
        $this->repository = $category;
    }
}
