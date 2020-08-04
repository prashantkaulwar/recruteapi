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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->group(['prefix' => 'api'], function () use ($router) {
  $router->get('candidate',  ['uses' => 'CandidateController@showAllcandidate']);

  $router->get('candidate/{id}', ['uses' => 'CandidateController@showOnecandidate']);

  $router->post('candidate', ['uses' => 'CandidateController@create']);

  $router->delete('candidate/{id}', ['uses' => 'CandidateController@delete']);

  $router->put('candidate/{id}', ['uses' => 'CandidateController@update']);
});