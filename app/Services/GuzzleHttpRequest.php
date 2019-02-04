<?php

namespace App\Services;

use GuzzleHttp\Client;

class GuzzleHttpRequest
{
    protected $client;

    /*public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://jsonplaceholder.typicode.com',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        //SUSTITUIR ESTE BLOQUE POR LO QUE SE MUESTRA EN EL BLOQUE SIGUIENTE
        //$this->client = $client;
    }*/

    public function __construct(Client $client)
    {
        //SUSTITUIR EL BLOQUE ANTERIOR POR ESTO
        $this->client = $client;
    }

    public function get($url)
    {
        //Petición hacia recurso deseado
        $response = $this->client->request('GET', $url);

        //Decodificando la respuesta a un formato de ARRAY de objetos JSON
        return json_decode( $response->getBody()->getContents() );
    }

    //otras peticiones a la API, como una petición POST
    public function post()
    {
        //...
    }
}
