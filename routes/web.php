<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//importando librería para peticiones a API
use GuzzleHttp\Client;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


//Realizando peticiones a la API de forma directa desde las rutas :: ini
//=========================================================================================

Route::get('/listado-directo', function () {
    $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'https://jsonplaceholder.typicode.com',
        // You can set any number of default request options.
        ////'timeout'  => 2.0,
        //Para darle más tiempo límite
        'timeout'  => 10.0,
        //Para darle un tiempo límite infinito, poner a 0 o quitar la línea
        ////'timeout'  => 0,
    ]);

    //Petición hacia recurso deseado
    $response = $client->request('GET', '/posts');
    //>> base_uri + '/posts' >> https://jsonplaceholder.typicode.com/posts

    //Haciendo una inspección de la respuesta recibida
    ////dd($response->getBody()->getContents());

    //Devolviendo la respuesta de la API en vez de la vista sugerida
    ////return view('welcome');
    ////return $response->getBody()->getContents();

    //Decodificando la respuesta a un formato de ARRAY de objetos JSON
    $posts = json_decode( $response->getBody()->getContents() );
    //Devolviendo los REGISTROS directamente
    ////return $posts;
    //Devolviendo los REGISTROS a la vista
    return view('index')->with([
        'posts' => $posts,
    ]);
})->name('index');

Route::get('/detalle-directo/{id}', function ($id) {
    $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'https://jsonplaceholder.typicode.com',
        // You can set any number of default request options.
        ////'timeout'  => 2.0,
        //Para darle más tiempo límite
        'timeout'  => 10.0,
        //Para darle un tiempo límite infinito, poner a 0 o quitar la línea
        ////'timeout'  => 0,
    ]);

    //Petición hacia recurso deseado - detalle según ID recibido
    //                              >> Vale tanto esto
    ////$response = $client->request('GET', '/posts/' . $id);
    //                              >> como esto otro (¡¡ATENCIÓN!! En este caso con "")
    $response = $client->request('GET', "/posts/{$id}");

    //Decodificando la respuesta a un formato de ARRAY de objetos JSON
    $post = json_decode( $response->getBody()->getContents() );

    //Devolviendo el REGISTRO a la vista
    return view('detalle')->with([
        'post' => $post,
    ]);
})->name('detalle');

//=========================================================================================
//Realizando peticiones a la API de forma directa desde las rutas :: fin


//--------------------------------------------------------------------------------------------


//Realizando peticiones a la API desde un controlador :: ini
//=========================================================================================

Route::get('/listado-x-ctrl', 'PostController@index')
    ->name('index_x_ctrl');

Route::get('/detalle-x-ctrl/{id}', 'PostController@show')
    ->name('detalle_x_ctrl');

//=========================================================================================
//Realizando peticiones a la API desde un controlador :: fin

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
