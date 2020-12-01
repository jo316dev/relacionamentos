@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Cadastro de Memoria</h1>
   
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.messages')
            <a href="{{ route('memory.create') }}" class="btn btn-success">Cadastrar</a>
        </div>
        <div class="card-body">

            @if ($memories->count() == 0)
                <p>Não existem memorias cadastrados</p>
            @else

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($memories as $memory)
                            <tr>
                                <td>{{ $memory->id }}</td>
                                <td>{{ $memory->name }}</td>
                                <td>
                                    <a href="{{ route('memory.edit', $memory->id) }}" class="btn btn-warning" class="form form-inline">Editar</a>
                                    <form action="{{ route('memory.destroy', $memory->id) }}" method="POST">
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

