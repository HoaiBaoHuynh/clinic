<?php

namespace Modules\Calendars\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Calendars\Events\Handlers\RegisterCalendarsSidebar;

class CalendarsServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterCalendarsSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('patient_calendars', array_dot(trans('calendars::patient_calendars')));
            $event->load('doctor_calendars', array_dot(trans('calendars::doctor_calendars')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('calendars', 'permissions');

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
            'Modules\Calendars\Repositories\Patient_calendarRepository',
            function () {
                $repository = new \Modules\Calendars\Repositories\Eloquent\EloquentPatient_calendarRepository(new \Modules\Calendars\Entities\Patient_calendar());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Calendars\Repositories\Cache\CachePatient_calendarDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Calendars\Repositories\Doctor_calendarRepository',
            function () {
                $repository = new \Modules\Calendars\Repositories\Eloquent\EloquentDoctor_calendarRepository(new \Modules\Calendars\Entities\Doctor_calendar());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Calendars\Repositories\Cache\CacheDoctor_calendarDecorator($repository);
            }
        );
// add bindings


    }
}
