<?php

namespace Modules\Treatment\Repositories\Cache;

use Modules\Treatment\Repositories\CategoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCategoryDecorator extends BaseCacheDecorator implements CategoryRepository
{
    public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->entityName = 'treatment.categories';
        $this->repository = $category;
    }
}
