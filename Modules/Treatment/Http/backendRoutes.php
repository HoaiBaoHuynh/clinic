<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/treatment'], function (Router $router) {
    $router->bind('listtreatment', function ($id) {
        return app('Modules\Treatment\Repositories\ListtreatmentRepository')->find($id);
    });
    $router->get('listtreatments', [
        'as' => 'admin.treatment.listtreatment.index',
        'uses' => 'ListtreatmentController@index',
        'middleware' => 'can:treatment.listtreatments.index'
    ]);
    $router->get('listtreatments/create', [
        'as' => 'admin.treatment.listtreatment.create',
        'uses' => 'ListtreatmentController@create',
        'middleware' => 'can:treatment.listtreatments.create'
    ]);
    $router->post('listtreatments', [
        'as' => 'admin.treatment.listtreatment.store',
        'uses' => 'ListtreatmentController@store',
        'middleware' => 'can:treatment.listtreatments.create'
    ]);
    $router->get('listtreatments/{listtreatment}/edit', [
        'as' => 'admin.treatment.listtreatment.edit',
        'uses' => 'ListtreatmentController@edit',
        'middleware' => 'can:treatment.listtreatments.edit'
    ]);
    $router->put('listtreatments/{listtreatment}', [
        'as' => 'admin.treatment.listtreatment.update',
        'uses' => 'ListtreatmentController@update',
        'middleware' => 'can:treatment.listtreatments.edit'
    ]);
    $router->delete('listtreatments/{listtreatment}', [
        'as' => 'admin.treatment.listtreatment.destroy',
        'uses' => 'ListtreatmentController@destroy',
        'middleware' => 'can:treatment.listtreatments.destroy'
    ]);
    $router->bind('category', function ($id) {
        return app('Modules\Treatment\Repositories\CategoryRepository')->find($id);
    });
    $router->get('categories', [
        'as' => 'admin.treatment.category.index',
        'uses' => 'CategoryController@index',
        'middleware' => 'can:treatment.categories.index'
    ]);
    $router->get('categories/create', [
        'as' => 'admin.treatment.category.create',
        'uses' => 'CategoryController@create',
        'middleware' => 'can:treatment.categories.create'
    ]);
    $router->post('categories', [
        'as' => 'admin.treatment.category.store',
        'uses' => 'CategoryController@store',
        'middleware' => 'can:treatment.categories.create'
    ]);
    $router->get('categories/{category}/edit', [
        'as' => 'admin.treatment.category.edit',
        'uses' => 'CategoryController@edit',
        'middleware' => 'can:treatment.categories.edit'
    ]);
    $router->put('categories/{category}', [
        'as' => 'admin.treatment.category.update',
        'uses' => 'CategoryController@update',
        'middleware' => 'can:treatment.categories.edit'
    ]);
    $router->delete('categories/{category}', [
        'as' => 'admin.treatment.category.destroy',
        'uses' => 'CategoryController@destroy',
        'middleware' => 'can:treatment.categories.destroy'
    ]);
// append


});
