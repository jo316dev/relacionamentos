@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Editar: <b>{{ $brand->name }}</b></h1>
   
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.messages')
            <a href="{{ route('brands.index') }}" class="btn btn-primary">Cancelar</a>
        </div>
        <div class="card-body">
            <form action="{{ route('brands.update', $brand->id) }}" method="POST">
                @method('PUT')
                @include('admin.brands._partials.form')

            </form>
            
           
           
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop