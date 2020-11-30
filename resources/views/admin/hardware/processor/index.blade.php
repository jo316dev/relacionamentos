@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Cadastro de Processadores</h1>
   
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.messages')
            <a href="{{ route('brands.create') }}" class="btn btn-success">Cadastrar</a>
        </div>
        <div class="card-body">

            @if ($processors->count() == 0)
                <p>Não existem processadores cadastrados</p>
            @else

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($processors as $processor)
                            <tr>
                                <td>{{ $processor->id }}</td>
                                <td>{{ $processor->name }}</td>
                                <td>
                                    <a href="{{ route('brands.edit', $processor->id) }}" class="btn btn-warning" class="form form-inline">Editar</a>
                                    <form action="{{ route('brands.destroy', $processor->id) }}" method="POST">
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

