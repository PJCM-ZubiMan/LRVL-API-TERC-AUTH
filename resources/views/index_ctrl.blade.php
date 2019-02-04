@extends('layouts.main')

@section('head_content')
        <meta name="description" content="Listado por controlador de los POSTS recibidos de una API externa.">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Listado de POSTS desde Controlador</title>
@endsection

@section('content')
            <h1>Publicaciones (obtenidas desde <a href="https://jsonplaceholder.typicode.com/" title="Ir a la web de la API" target="_blank">API externa</a>) :: desde CTRL</h1>
            @foreach ($posts as $post)

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ route('detalle_x_ctrl', ['id' => $post->id]) }}" title="Ver detalle">{{ $post->id }} - {{ $post->title }}</a>
                    </h4>
                    <p class="card-text">
                        {{ str_limit($post->body, 100, ' ...') }}
                    </p>
                </div>
            </div>

            @endforeach
@endsection

@section('footer_scripts_content')
    {{-- jQuery, Bootstrap --}}
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
