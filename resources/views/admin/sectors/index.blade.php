@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Cadastro de Setores</h1>
   
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.messages')
            <a href="{{ route('sectors.create') }}" class="btn btn-success">Cadastrar</a>
        </div>
        <div class="card-body">

            @if ($sectors->count() == 0)
                <p>Não existem setores cadastrados</p>
            @else

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Marca</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($sectors as $sector)
                            <tr>
                                <td>{{ $sector->id }}</td>
                                <td>{{ $sector->name }}</td>
                                <td>
                                    <a href="{{ route('sectors.edit', $sector->id) }}" class="btn btn-warning" class="form form-inline">Editar</a>
                                    <form action="{{ route('sectors.destroy', $sector->id) }}" method="POST">
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

