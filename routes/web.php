<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    $router->post('/login', 'AuthController@_login');
    $router->post('/logout', 'AuthController@_logout');

    $router->group(['middleware' => 'auth'], function () use ($router) {

        /**
         * Items URI
         */
        $router->get('/items', 'ItemController@index');
        $router->get('/item/{id}', 'ItemController@show');
        $router->post('/items', 'ItemController@store');
        $router->post('item/update-image/{id}', 'ItemController@updateImage');
        $router->put('/item/{id}', 'ItemController@update');
        $router->delete('/items/{id}', 'ItemController@delete');
        /**
         * Item Detail URI
         */
        $router->put('/item/{id}/update-detail/', 'ItemDetailController@update');

        /**
         * Purchase Order URI
         */
        $router->get('/purchase-orders', 'PurchaseOrderController@index');
        $router->post('/purchase-order', 'PurchaseOrderController@store');
            /**
             * Purchase Order Item URI
             */
            $router->put('/purchase-order/{po_id}/item', 'PurchaseOrderItemController@update');


        /**
         * Posts URI
         */
        $router->get('/posts', 'PostController@index'); 
        $router->get('/post/{id}', 'PostController@show'); 
        $router->post('/posts', 'PostController@store');
        $router->put('/posts/{id}', 'PostController@update');
        $router->delete('/posts/{id}', 'PostController@delete');
    });
});
