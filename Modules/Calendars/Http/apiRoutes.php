<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/lich'], function (Router $router) {
	$router->get('/test', [
		'as' => 'api.lich.test.index',
		'uses' => 'testController@index',
	]);
});