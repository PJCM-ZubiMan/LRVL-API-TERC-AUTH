@extends('layouts.main')

@section('head_content')
        <meta name="description" content="Detalle de POST directo desde la ruta recibido de una API externa.">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Detalle de POST directo desde la Ruta</title>
@endsection

@section('content')
            <h1>Publicación (obtenida desde <a href="https://jsonplaceholder.typicode.com/" title="Ir a la web de la API" target="_blank">API externa</a>) :: desde Ruta</h1>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ $post->id }} - {{ $post->title }}
                    </h4>
                    <p class="card-text">
                        {{ $post->body }}
                    </p>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('index') }}" title="Volver al listado directo" class="card-link">Volver al listado directo</a>
                </div>
            </div>

@endsection

@section('footer_scripts_content')
    {{-- jQuery, Bootstrap --}}
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
