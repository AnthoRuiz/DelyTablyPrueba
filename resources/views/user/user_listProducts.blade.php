@extends('layouts.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 align="center">Listado de Contenidos</h1>
                        <a href="{{route('product_create_path')}}" class="btn btn-primary"
                           align="right">Crear Producto</a>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <br>
                            @foreach($contents as $content)
                                <li>
                                    <p class="lead">
                                        <a href="{{route('product_show_path',$content->id )}}">
                                            <h1>{{ $content->title }}</h1>
                                        </a>
                                    </p>
                                    Creado: {{ $content->publishing_date }}
                                    <br>
                                    Categoria: {{$content->categoryContent->name}}
                                    <hr>
                                </li>
                                @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


