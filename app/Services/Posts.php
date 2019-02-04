<?php

namespace App\Services;

//importando librería para peticiones a API
////use GuzzleHttp\Client;
    // se pasó la importación dentro de GuzzleHttpRequest
use Illuminate\Http\Request;

class Posts extends GuzzleHttpRequest
{
    /**
     * Se pasó la propiedad $client y el contructor a la class de GuzzleHttpRequest
     */

    /**
     * Listado de registros venidos de la API
     *
     * @return void
     */
    public function all()
    {
        return $this->get('/posts');
    }

    /**
     * Detalle del registro elegido
     *
     * @param [type] $id parámetro para localizar el registro deseado
     * @return void
     */
    public function find($id)
    {
        /*//Petición hacia recurso deseado - detalle según ID recibido
        //                              >> Vale tanto esto
        ////$response = $this->client->request('GET', '/posts/' . $id);
        //                              >> como esto otro (¡¡ATENCIÓN!! En este caso con "")
        $response = $this->client->request('GET', "/posts/{$id}");

        //Decodificando la respuesta a un formato de ARRAY de objetos JSON
        return json_decode( $response->getBody()->getContents() );
        */
        return $this->get("/posts/{$id}");
    }

    //método get($url) pasado a GuzzleHttpRequest
}
