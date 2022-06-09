@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue">
                    <i class="fas fa-fw fa-edit"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Report Perawatan</span>
                    <span class="info-box-number"></span>
                </div>
            </div>
        </div>
    </div>
@stop