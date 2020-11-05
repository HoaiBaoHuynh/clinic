<?php

namespace Modules\Treatment\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Treatment\Events\Handlers\RegisterTreatmentSidebar;

class TreatmentServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterTreatmentSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('listtreatments', array_dot(trans('treatment::listtreatments')));
            $event->load('categories', array_dot(trans('treatment::categories')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('treatment', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Treatment\Repositories\ListtreatmentRepository',
            function () {
                $repository = new \Modules\Treatment\Repositories\Eloquent\EloquentListtreatmentRepository(new \Modules\Treatment\Entities\Listtreatment());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Treatment\Repositories\Cache\CacheListtreatmentDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Treatment\Repositories\CategoryRepository',
            function () {
                $repository = new \Modules\Treatment\Repositories\Eloquent\EloquentCategoryRepository(new \Modules\Treatment\Entities\Category());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Treatment\Repositories\Cache\CacheCategoryDecorator($repository);
            }
        );
// add bindings


    }
}
