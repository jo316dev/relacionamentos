@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Editar: <b>{{ $memory->name }}</b></h1>
   
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.messages')
            <a href="{{ route('memory.index') }}" class="btn btn-primary">Cancelar</a>
        </div>
        <div class="card-body">
            <form action="{{ route('memory.update', $memory->id) }}" method="POST">
                @method('PUT')
                @include('admin.hardware.memory._partials.form')

            </form>
            
           
           
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop