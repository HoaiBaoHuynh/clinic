<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/patient'], function (Router $router) {
    $router->bind('listpatient', function ($id) {
        return app('Modules\Patient\Repositories\ListpatientRepository')->find($id);
    });
    $router->get('listpatients', [
        'as' => 'admin.patient.listpatient.index',
        'uses' => 'ListpatientController@index',
        'middleware' => 'can:patient.listpatients.index'
    ]);


    $router->post('timkiem', [
        'as' => 'admin.patient.listpatient.search',
        'uses' => 'ListpatientController@search',
    ]);

     $router->post('listpatients', [
        'as' => 'admin.patient.listpatient.index',
        'uses' => 'ListpatientController@index',
        'middleware' => 'can:patient.listpatients.index'
    ]);

    $router->get('listpatients/create', [
        'as' => 'admin.patient.listpatient.create',
        'uses' => 'ListpatientController@create',
        'middleware' => 'can:patient.listpatients.create'
    ]);
    $router->post('listpatients', [
        'as' => 'admin.patient.listpatient.store',
        'uses' => 'ListpatientController@store',
        'middleware' => 'can:patient.listpatients.create'
    ]);

    $router->get('listpatients/{listpatient}/edit', [
        'as' => 'admin.patient.listpatient.edit',
        'uses' => 'ListpatientController@edit',
        'middleware' => 'can:patient.listpatients.edit'
    ]);

    $router->put('listpatients/{listpatient}', [
        'as' => 'admin.patient.listpatient.update',
        'uses' => 'ListpatientController@update',
        'middleware' => 'can:patient.listpatients.edit'
    ]);

    $router->delete('listpatients/{listpatient}', [
        'as' => 'admin.patient.listpatient.destroy',
        'uses' => 'ListpatientController@destroy',
        'middleware' => 'can:patient.listpatients.destroy'
    ]);

     $router->get('listpatients/{listpatient}/detail', [
        'as' => 'admin.patient.listpatient.detail',
        'uses' => 'ListpatientController@load_detail',
        'middleware' => 'can:patient.listpatients.edit'
    ]);

     $router->post('listpatients/detail', [
        'as' => 'admin.patient.listpatient.lichsukhams',
        'uses' => 'ListpatientController@Lichsukham',
    ]);

    $router->put('listpatients/{listpatient}', [
        'as' => 'admin.patient.listpatient.update',
        'uses' => 'ListpatientController@update',
        'middleware' => 'can:patient.listpatients.edit'
    ]);

    $router->post('listpatients/updatedetail',[
        'as' => 'admin.patient.listpatient.updatelsk',
        'uses' => 'ListpatientController@update_lichsukham',
    ]);

    $router->delete('listpatients/detail/{moi}', [
        'as' => 'admin.patient.listpatient.delete_LSkham',
        'uses' => 'ListpatientController@xoa_lichsukham'
    ]);
    //them ls mua dich vu
    $router->post('listpatients/detail/lsmuadichvu', [
        'as' => 'admin.patient.listpatient.lsmuadichvu',
        'uses' => 'ListpatientController@LSmuadichvu',
    ]);
    //Xoa lich su mua dich vu
    $router->delete('listpatients/{lsmuadichvu}/{listpatient}', [
        'as' => 'admin.patient.listpatient.lsmuadichvu.destroy',
        'uses' => 'ListpatientController@delete_LSmuadichvu',
    ]);
    // update lich su mua dich vu
    $router->post('listpatients/updateLSmuadichvu', [
        'as' => 'admin.patient.lsmuadichvu.updateLSmuadichvu',
        'uses' => 'ListpatientController@updateLSmuadichvu',
    ]);

    $router->bind('report', function ($id) {
        return app('Modules\Patient\Repositories\ReportRepository')->find($id);
    });
    $router->get('reports', [
        'as' => 'admin.patient.report.index',
        'uses' => 'ReportController@index',
        'middleware' => 'can:patient.reports.index'
    ]);
    $router->get('reports/create', [
        'as' => 'admin.patient.report.create',
        'uses' => 'ReportController@create',
        'middleware' => 'can:patient.reports.create'
    ]);
    $router->post('reports', [
        'as' => 'admin.patient.report.store',
        'uses' => 'ReportController@store',
        'middleware' => 'can:patient.reports.create'
    ]);
    $router->get('reports/{report}/edit', [
        'as' => 'admin.patient.report.edit',
        'uses' => 'ReportController@edit',
        'middleware' => 'can:patient.reports.edit'
    ]);
    $router->put('reports/{report}', [
        'as' => 'admin.patient.report.update',
        'uses' => 'ReportController@update',
        'middleware' => 'can:patient.reports.edit'
    ]);
    $router->delete('reports/{report}', [
        'as' => 'admin.patient.report.destroy',
        'uses' => 'ReportController@destroy',
        'middleware' => 'can:patient.reports.destroy'
    ]);

// append


});
