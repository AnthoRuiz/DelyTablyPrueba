@extends('layouts.default')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" align="center" >
                        <h1>Perfil</h1>
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        Mi Cuenta <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('user_edit_path', $user->id)}}" >Editar Perfil</a></li>
                                        <li><a href="{{route('user_listProducts_path', $user->id)}}" >Mis Contenidos</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">

                        <ul class="list-unstyled">
                            <br>
                            <li>
                                <h2>Nombre:</h2>
                                {{ $user->name }}
                            </li>
                            <br>
                            <li>
                                <h2>E-mail:</h2>
                                {{ $user->email }}
                            </li>
                            <br>
                        </ul>
                    </div>
            </div>
        </div>
    </div>
    </div>


@endsection