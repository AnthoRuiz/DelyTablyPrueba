@extends('layouts.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('auth.welcome_to') Future</div>
                    <div class="panel-body">
                        <h1>Titulo</h1> - <h4>{{ $content->title }}</h4>
                        <br>
                        <h1>Autor</h1> - <h3>{{ $content->author }}</h3>

                        <a href="{{route('product_details_path', $content->id)}}">@lang('auth.details')</a>

                </div>
            </div>
        </div>
    </div>
@endsection