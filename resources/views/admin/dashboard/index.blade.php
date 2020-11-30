@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Controle de Equipamentos e empréstimos</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $brands->count() }}</h3>
                        <p>Marcas Cadastradas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('brands.index') }}" class="small-box-footer">
                        Ver
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

