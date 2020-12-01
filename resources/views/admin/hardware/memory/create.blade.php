@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Cadastro de Memorias</h1>
   
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.messages')
            <a href="{{ route('memory.index') }}" class="btn btn-primary">Cancelar</a>
        </div>
        <div class="card-body">
            <form action="{{ route('memory.store') }}" method="POST">
               
                @include('admin.hardware.memory._partials.form')

            </form>
            
           
           
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop