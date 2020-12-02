@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Editar: <b>{{ $sector->name }}</b></h1>
   
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.messages')
            <a href="{{ route('sectors.index') }}" class="btn btn-primary">Cancelar</a>
        </div>
        <div class="card-body">
            <form action="{{ route('sectors.update', $sector->id) }}" method="POST">
                @method('PUT')
                @include('admin.sectors._partials.form')

            </form>
            
           
           
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop