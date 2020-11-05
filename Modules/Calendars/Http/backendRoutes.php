<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/calendars'], function (Router $router) {
    $router->bind('patient_calendar', function ($id) {
        return app('Modules\Calendars\Repositories\Patient_calendarRepository')->find($id);
    });
    $router->get('patient_calendars', [
        'as' => 'admin.calendars.patient_calendar.index',
        'uses' => 'Patient_calendarController@index',
        'middleware' => 'can:calendars.patient_calendars.index'
    ]);
    ////////////////////////////////
    $router->get('/patient-load-events',[
        'as' => 'routePatientLoadEvents',
        'uses' => 'Patient_calendarController@Patient_Events'
    ]);
    $router->put('/patient-event-update',[
        'as' => 'routePatientEventUpdate',
        'uses' => 'Patient_calendarController@update'
    ]);

    $router->post('/patient-event-store',[
        'as' => 'routePatientEventStore',
        'uses' => 'Patient_calendarController@store'
    ]);

    $router->delete('/patient-event-destroy',[
        'as' => 'routePatientEventDestroy',
        'uses' => 'Patient_calendarController@destroy'
    ]);
    /////////////////////////////
    $router->get('patient_calendars/create', [
        'as' => 'admin.calendars.patient_calendar.create',
        'uses' => 'Patient_calendarController@create',
        'middleware' => 'can:calendars.patient_calendars.create'
    ]);
    $router->post('patient_calendars', [
        'as' => 'admin.calendars.patient_calendar.store',
        'uses' => 'Patient_calendarController@store',
        'middleware' => 'can:calendars.patient_calendars.create'
    ]);
    $router->get('patient_calendars/{patient_calendar}/edit', [
        'as' => 'admin.calendars.patient_calendar.edit',
        'uses' => 'Patient_calendarController@edit',
        'middleware' => 'can:calendars.patient_calendars.edit'
    ]);
    $router->put('patient_calendars/{patient_calendar}', [
        'as' => 'admin.calendars.patient_calendar.update',
        'uses' => 'Patient_calendarController@update',
        'middleware' => 'can:calendars.patient_calendars.edit'
    ]);
    $router->delete('patient_calendars/{patient_calendar}', [
        'as' => 'admin.calendars.patient_calendar.destroy',
        'uses' => 'Patient_calendarController@destroy',
        'middleware' => 'can:calendars.patient_calendars.destroy'
    ]);

    //Lich lam viec Nhan vien
    $router->bind('doctor_calendar', function ($id) {
        return app('Modules\Calendars\Repositories\Doctor_calendarRepository')->find($id);
    });
    $router->get('doctor_calendars', [
        'as' => 'admin.calendars.doctor_calendar.index',
        'uses' => 'Doctor_calendarController@index',
        'middleware' => 'can:calendars.doctor_calendars.index'
    ]);
    $router->get('doctor_calendars/create', [
        'as' => 'admin.calendars.doctor_calendar.create',
        'uses' => 'Doctor_calendarController@create',
        'middleware' => 'can:calendars.doctor_calendars.create'
    ]);
    /*$router->post('doctor_calendars', [
        'as' => 'admin.calendars.doctor_calendar.store',
        'uses' => 'Doctor_calendarController@store',
        'middleware' => 'can:calendars.doctor_calendars.create'
    ]);
    $router->get('doctor_calendars/{doctor_calendar}/edit', [
        'as' => 'admin.calendars.doctor_calendar.edit',
        'uses' => 'Doctor_calendarController@edit',
        'middleware' => 'can:calendars.doctor_calendars.edit'
    ]);
    $router->put('doctor_calendars/{doctor_calendar}', [
        'as' => 'admin.calendars.doctor_calendar.update',
        'uses' => 'Doctor_calendarController@update',
        'middleware' => 'can:calendars.doctor_calendars.edit'
    ]);
    $router->delete('doctor_calendars/{doctor_calendar}', [
        'as' => 'admin.calendars.doctor_calendar.destroy',
        'uses' => 'Doctor_calendarController@destroy',
        'middleware' => 'can:calendars.doctor_calendars.destroy'
    ]);*/
    $router->get('/doctor-load-events',[
        'as' => 'routeDoctorLoadEvents',
        'uses' => 'Doctor_calendarController@LoadEvents'
    ]);

    $router->put('/doctor-event-update',[
        'as' => 'routeDoctorEventUpdate',
        'uses' => 'Doctor_calendarController@UpdateEvents'
    ]);

    $router->post('/doctor-event-store',[
        'as' => 'routeDoctorEventStore',
        'uses' => 'Doctor_calendarController@StoreEvents'
    ]);

    $router->delete('/doctor-event-destroy',[
        'as' => 'routeDoctorEventDestroy',
        'uses' => 'Doctor_calendarController@DestroyEvents'
    ]);
// append


});
