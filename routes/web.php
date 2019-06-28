<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});
$app->group(['prefix' => 'api/'], function ($app) {
    $app->post('login/','UsersController@authenticate');

    $app->post('todo/','TodoController@store');
    $app->get('todo/', 'TodoController@index');
    $app->get('todo/{id}/', 'TodoController@show');
    $app->put('todo/{id}/', 'TodoController@update');
    $app->delete('todo/{id}/', 'TodoController@destroy');


});

$app->group(['prefix' => 'api/v1','middleware' => 'auth'], function () use ($app) {
    
    $app->get('/templates', 'TemplateController@index');
    $app->post('/templates', 'TemplateController@store');
    $app->get('/templates/{id}', 'TemplateController@show');
    $app->post('/templates/{id}', 'TemplateController@update');
    $app->delete('/templates/{id}', 'TemplateController@destroy');

    // $router->post('/checklists', 'ChecklistController@store');

});