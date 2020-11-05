<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/doctor'], function (Router $router) {
    $router->bind('listdoctor', function ($id) {
        return app('Modules\Doctor\Repositories\ListdoctorRepository')->find($id);
    });
    $router->get('listdoctors', [
        'as' => 'admin.doctor.listdoctor.index',
        'uses' => 'ListdoctorController@index',
        'middleware' => 'can:doctor.listdoctors.index'
    ]);
    $router->post('timkiem',[
        'as'=>'admin.doctor.listdoctor.search',
        'uses'=>'ListdoctorController@timkiem'
    ]);
    $router->get('listdoctors/create', [
        'as' => 'admin.doctor.listdoctor.create',
        'uses' => 'ListdoctorController@create',
        'middleware' => 'can:doctor.listdoctors.create'
    ]);
    $router->post('listdoctors', [
        'as' => 'admin.doctor.listdoctor.store',
        'uses' => 'ListdoctorController@store',
        'middleware' => 'can:doctor.listdoctors.create'
    ]);
    $router->get('listdoctors/{listdoctor}/edit', [
        'as' => 'admin.doctor.listdoctor.edit',
        'uses' => 'ListdoctorController@edit',
        'middleware' => 'can:doctor.listdoctors.edit'
    ]);
    $router->put('listdoctors/{listdoctor}', [
        'as' => 'admin.doctor.listdoctor.update',
        'uses' => 'ListdoctorController@update',
        'middleware' => 'can:doctor.listdoctors.edit'
    ]);
    $router->delete('listdoctors/{listdoctor}', [
        'as' => 'admin.doctor.listdoctor.destroy',
        'uses' => 'ListdoctorController@destroy',
        'middleware' => 'can:doctor.listdoctors.destroy'
    ]);
    $router->bind('category', function ($id) {
        return app('Modules\Doctor\Repositories\CategoryRepository')->find($id);
    });
    $router->get('categories', [
        'as' => 'admin.doctor.category.index',
        'uses' => 'CategoryController@index',
        'middleware' => 'can:doctor.categories.index'
    ]);
    $router->get('categories/create', [
        'as' => 'admin.doctor.category.create',
        'uses' => 'CategoryController@create',
        'middleware' => 'can:doctor.categories.create'
    ]);
    $router->post('categories', [
        'as' => 'admin.doctor.category.store',
        'uses' => 'CategoryController@store',
        'middleware' => 'can:doctor.categories.create'
    ]);
    $router->get('categories/{category}/edit', [
        'as' => 'admin.doctor.category.edit',
        'uses' => 'CategoryController@edit',
        'middleware' => 'can:doctor.categories.edit'
    ]);
    $router->put('categories/{category}', [
        'as' => 'admin.doctor.category.update',
        'uses' => 'CategoryController@update',
        'middleware' => 'can:doctor.categories.edit'
    ]);
    $router->delete('categories/{category}', [
        'as' => 'admin.doctor.category.destroy',
        'uses' => 'CategoryController@destroy',
        'middleware' => 'can:doctor.categories.destroy'
    ]);
    $router->bind('report', function ($id) {
        return app('Modules\Doctor\Repositories\ReportRepository')->find($id);
    });
    $router->get('reports', [
        'as' => 'admin.doctor.report.index',
        'uses' => 'ReportController@index',
        'middleware' => 'can:doctor.reports.index'
    ]);
    $router->get('reports/create', [
        'as' => 'admin.doctor.report.create',
        'uses' => 'ReportController@create',
        'middleware' => 'can:doctor.reports.create'
    ]);
    $router->post('reports', [
        'as' => 'admin.doctor.report.store',
        'uses' => 'ReportController@store',
        'middleware' => 'can:doctor.reports.create'
    ]);
    $router->get('reports/{report}/edit', [
        'as' => 'admin.doctor.report.edit',
        'uses' => 'ReportController@edit',
        'middleware' => 'can:doctor.reports.edit'
    ]);
    $router->put('reports/{report}', [
        'as' => 'admin.doctor.report.update',
        'uses' => 'ReportController@update',
        'middleware' => 'can:doctor.reports.edit'
    ]);
    $router->delete('reports/{report}', [
        'as' => 'admin.doctor.report.destroy',
        'uses' => 'ReportController@destroy',
        'middleware' => 'can:doctor.reports.destroy'
    ]);
    $router->bind('service', function ($id) {
        return app('Modules\Doctor\Repositories\ServiceRepository')->find($id);
    });
    $router->get('services', [
        'as' => 'admin.doctor.service.index',
        'uses' => 'ServiceController@index',
        'middleware' => 'can:doctor.services.index'
    ]);
    $router->get('services/create', [
        'as' => 'admin.doctor.service.create',
        'uses' => 'ServiceController@create',
        'middleware' => 'can:doctor.services.create'
    ]);
    $router->post('services', [
        'as' => 'admin.doctor.service.store',
        'uses' => 'ServiceController@store',
        'middleware' => 'can:doctor.services.create'
    ]);
    $router->get('services/{service}/edit', [
        'as' => 'admin.doctor.service.edit',
        'uses' => 'ServiceController@edit',
        'middleware' => 'can:doctor.services.edit'
    ]);
    $router->put('services/{service}', [
        'as' => 'admin.doctor.service.update',
        'uses' => 'ServiceController@update',
        'middleware' => 'can:doctor.services.edit'
    ]);
    $router->delete('services/{service}', [
        'as' => 'admin.doctor.service.destroy',
        'uses' => 'ServiceController@destroy',
        'middleware' => 'can:doctor.services.destroy'
    ]);


    //Lich lam viec router
    $router->bind('calendar', function ($id) {
        return app('Modules\Doctor\Repositories\CalendarRepository')->find($id);
    });
    $router->get('calendars', [
        'as' => 'admin.doctor.calendar.index',
        'uses' => 'CalendarController@index',
        'middleware' => 'can:doctor.calendars.index'
    ]);
    $router->get('calendars/create', [
        'as' => 'admin.doctor.calendar.create',
        'uses' => 'CalendarController@create',
        'middleware' => 'can:doctor.calendars.create'
    ]);
    /*$router->post('calendars', [
        'as' => 'admin.doctor.calendar.store',
        'uses' => 'CalendarController@store',
        'middleware' => 'can:doctor.calendars.create'
    ]);
    $router->get('calendars/edit/{lichlamviec}', [
        'as' => 'admin.doctor.calendar.edit',
        'uses' => 'CalendarController@edit',
        'middleware' => 'can:doctor.calendars.edit'
    ]);
    $router->put('calendars/{lichlamviec}', [
        'as' => 'admin.doctor.calendar.update',
        'uses' => 'CalendarController@update',
        'middleware' => 'can:doctor.calendars.edit'
    ]);
    $router->get('calendars/{lichlamviec}', [
        'as' => 'admin.doctor.calendar.destroy',
        'uses' => 'CalendarController@destroy',
        'middleware' => 'can:doctor.calendars.destroy'
    ]);*/

    //list calendar

    $router->get('/load-events',[
        'as' => 'routeLoadEvents',
        'uses' => 'CalendarController@listEventjson'
    ]);

    $router->put('/event-update',[
        'as' => 'routeEventUpdates',
        'uses' => 'CalendarController@update'
    ]);

    $router->post('/event-store',[
        'as' => 'routeEventStores',
        'uses' => 'CalendarController@store'
    ]);

    $router->delete('event_destroy',[
        'as' => 'routeEventDestroys',
        'uses' => 'CalendarController@destroy'
    ]);
    // append





});
