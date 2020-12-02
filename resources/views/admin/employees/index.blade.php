@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Cadastro de Marcas</h1>
   
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.messages')
            <a href="{{ route('brands.create') }}" class="btn btn-success">Cadastrar</a>
        </div>
        <div class="card-body">

            @if ($brands->count() == 0)
                <p>Não existem marcas cadastradas</p>
            @else

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Marca</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-warning" class="form form-inline">Editar</a>
                                    <form action="{{ route('brands.destroy', $brand->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            @endif
           
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop

