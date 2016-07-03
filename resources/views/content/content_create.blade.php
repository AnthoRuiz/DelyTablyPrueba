@extends('layouts.default')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Crear Contenido</h1>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('product_store_path') }}" method="post"
                              enctype="multipart/form-data">

                            <label for="title">Titulo del Contenido</label>
                            <input placeholder="titulo" class="form-control" id="title" type="text" name="title" value="{{ old('title') }}">

                            <label for="description">descripción</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">
                                {{ old('description') }}
                            </textarea>

                            <label for="publishing_date">Fecha Creacion</label>
                            <input type="date" name="publishing_date" id="publishing_date"  step="1" min="2016-01-01" max="2030-12-31" value={{ old('publishing_date') }}>

                            <label for="exp_date">Fecha Vencimiento</label>
                            <input type="date" name="exp_date" id="exp_date" step="1" min="2016-01-01" max="2030-12-31" value={{ old('exp_date') }}>
                            <br>
                            <label for="category">Categoria</label>
                            <select class="form-control" name="category" id="category">
                                @foreach($categories as $category)
                                    <option>{{$category->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <input class="btn btn-success" name="submit" type="submit" value="Crear">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection