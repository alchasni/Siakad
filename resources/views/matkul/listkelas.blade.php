@extends('adminlte::page')

@section('title')
    Data Kelas Mata Kuliah
@endsection

@section('content')
    <div class="panel panel-default">
    <div class="panel-body">
        <h4><i class="fa fa-university"></i> DAFTAR Kelas Mata Kuliah : {{$data->namadosen}}</h4>
        <h5>Jumlah Kelas = {{$data->kelas->count()}}</h5><hr>

        <div class=row>
            <div class="col-md-2">
            </div>
            <div class="col-md-4">
            </div>
        </div><br>
        @if($data->count())
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-condensed tfix">
                    <thead align="center">
                       <tr>
                           <td><b>Kode Kelas</b></td>                           
                       </tr>
                   </thead>
                   @foreach($data->kelas as $m)
                       <tr>
                           <td>{{ $m->kodekelas }}</td>
                        </tr>
                   @endforeach
              </table>
          </div>
        @else
            <div class="alert alert-warning">
                <i class="fa fa-exclamation-triangle"></i> Data Dosen tidak ditemukan
            </div>
        @endif
    </div>
    </div>
@endsection
