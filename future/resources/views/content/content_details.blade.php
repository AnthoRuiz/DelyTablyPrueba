@extends('layouts.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('auth.welcome_to') Future</div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <br>
                            <ul>
                                <li><h1>{{$content->title}}</h1></li>
                                <li><h2>{{$content->description}}</h2></li>
                                <li><h2>{{$content->categoryContent->name}}</h2></li>
                                <br>
                                <hr>
                                @lang('auth.published_by')
                                <ul>
                                    <li>{{$content->author}}</li>
                                </ul>
                                <br>
                                Fechas de Publicacion y Vencimiento
                                <ul>
                                    <li>{{ $content->publishing_date }}</li>
                                    <li>{{ $content->exp_date }}</li>
                                </ul>
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection