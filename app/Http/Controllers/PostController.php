<?php

namespace App\Http\Controllers;

//instanciando GuzzleHttp desde esta clase
use App\Services\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $posts;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Posts $posts)
    {
        //Instancia de la clase Posts
        $this->posts = $posts;
    }

    /**
     * Obteniendo listado de registros
     */
    public function index()
    {
        //Recuperando los registros a través del método all() de la instancia de Posts
        $posts = $this->posts->all();

        //Devolviendo los REGISTROS a la vista
        return view('index_ctrl')->with([
            'posts' => $posts,
        ]);
    }

    /**
     * Mostrando detalle del registro referido al parámetro pasado
     */
    public function show($id)
    {
        //Recuperando el registro a través del método find($id) de la instancia de Posts
        $post = $this->posts->find($id);

        //Devolviendo el REGISTRO a la vista
        return view('detalle_ctrl')->with([
            'post' => $post,
        ]);
    }
}
