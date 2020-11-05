<?php

namespace Modules\Doctor\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Doctor\Events\Handlers\RegisterDoctorSidebar;

class DoctorServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterDoctorSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('listdoctors', array_dot(trans('doctor::listdoctors')));
            $event->load('categories', array_dot(trans('doctor::categories')));
            $event->load('reports', array_dot(trans('doctor::reports')));
            $event->load('services', array_dot(trans('doctor::services')));
            $event->load('calendars', array_dot(trans('doctor::calendars')));
            // append translations





        });
    }

    public function boot()
    {
        $this->publishConfig('doctor', 'permissions');

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
            'Modules\Doctor\Repositories\ListdoctorRepository',
            function () {
                $repository = new \Modules\Doctor\Repositories\Eloquent\EloquentListdoctorRepository(new \Modules\Doctor\Entities\Listdoctor());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Doctor\Repositories\Cache\CacheListdoctorDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Doctor\Repositories\CategoryRepository',
            function () {
                $repository = new \Modules\Doctor\Repositories\Eloquent\EloquentCategoryRepository(new \Modules\Doctor\Entities\Category());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Doctor\Repositories\Cache\CacheCategoryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Doctor\Repositories\ReportRepository',
            function () {
                $repository = new \Modules\Doctor\Repositories\Eloquent\EloquentReportRepository(new \Modules\Doctor\Entities\Report());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Doctor\Repositories\Cache\CacheReportDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Doctor\Repositories\ServiceRepository',
            function () {
                $repository = new \Modules\Doctor\Repositories\Eloquent\EloquentServiceRepository(new \Modules\Doctor\Entities\Service());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Doctor\Repositories\Cache\CacheServiceDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Doctor\Repositories\CalendarRepository',
            function () {
                $repository = new \Modules\Doctor\Repositories\Eloquent\EloquentCalendarRepository(new \Modules\Doctor\Entities\LichLamViec());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Doctor\Repositories\Cache\CacheCalendarDecorator($repository);
            }
        );
// add bindings





    }
}
