@extends('adminlte::page')

@section('title', 'Hard Disk')

@section('content_header')
    <h1>Cadastro de Discos</h1>
   
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.messages')
            <a href="{{ route('disk.create') }}" class="btn btn-success">Cadastrar</a>
        </div>
        <div class="card-body">

            @if ($disks->count() == 0)
                <p>Não existem discos cadastrados</p>
            @else

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($disks as $disk)
                            <tr>
                                <td>{{ $disk->id }}</td>
                                <td>{{ $disk->name }}</td>
                                <td>
                                    <a href="{{ route('disk.edit', $disk->id) }}" class="btn btn-warning" class="form form-inline">Editar</a>
                                    <form action="{{ route('disk.destroy', $disk->id) }}" method="POST">
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

