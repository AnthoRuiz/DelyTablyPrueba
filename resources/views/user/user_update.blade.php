@extends('layouts.default')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Editar Perfil</h1>
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        Mi Cuenta <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('user_profileShow_path', $user->id)}}" > Perfil</a></li>
                                        <li><a href="{{route('user_listProducts_path', $user->id)}}" >Mis Productos</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('user_update_path', $user->id) }}" method="post"
                              enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="patch">

                            <label for="name">Nombre</label>
                            <input class="form-control" type="text" name="name" value="{{ $user->name }}">

                            <label for="name">E-mail</label>
                            <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                            <br>
                            <input class="btn btn-success" name="submit" type="submit" value="Update">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection