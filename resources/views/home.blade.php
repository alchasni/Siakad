@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <br><br>
    <div class="col-md-2">
    </div>
    <div class="col-md-4">
        <div class="panel panel-info text-center">
            <div class="panel-heading">
                <h3>Mahasiswa</h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-user fa-5x"></i></li>
                <li class="list-group-item"><a href="/mhs" class="btn btn-primary"><i class="fa fa-user"></i> DATA Mahasiswa</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-info text-center">
            <div class="panel-heading">
                <h3>Dosen</h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-university fa-5x"></i></li>
                <li class="list-group-item"><a href="/dosen" class="btn btn-primary"><i class="fa fa-university"></i> DATA Dosen</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-info text-center">
            <div class="panel-heading">
                <h3>Mata Kuliah</h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-book fa-5x"></i></li>
                <li class="list-group-item"><a href="/matkul" class="btn btn-primary"><i class="fa fa-book"></i> DATA Mata Kuliah</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-info text-center">
            <div class="panel-heading">
                <h3>Kelas</h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-briefcase fa-5x"></i></li>
                <li class="list-group-item"><a href="/kelas" class="btn btn-primary"><i class="fa fa-briefcase"></i> DATA Kelas</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-info text-center">
            <div class="panel-heading">
                <h3>Ambil Kelas</h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-calendar fa-5x"></i></li>
                <li class="list-group-item"><a href="/ambilKelas" class="btn btn-primary"><i class="fa fa-calendar"></i> DATA Ambil Kelas</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-2">
    </div>
@stop