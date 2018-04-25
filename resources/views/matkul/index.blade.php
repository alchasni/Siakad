@extends('adminlte::page')

@section('title')
    Data Mata Kuliah
@endsection

@section('content')
    <div class="panel panel-default">
    <div class="panel-body">
        <h4><i class="fa fa-book"></i> DAFTAR Mata Kuliah</h4><hr>

        <div class=row>
            <div class="col-md-6">
                <a href="/matkul/create" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</a>
                <a href="/viewmatkul" class="btn btn-primary"><i class="fa fa-refresh"></i> BootGird</a>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-4">
              {{Form::open(['method'=>'GET','url'=>'carimatkul','role'=>'search'])}}
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="search" placeholder="Search Nama Matkul...">
                    <span class="input-group-btn">
                        <span class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Cari</button>
               </span>
                     </span>
                 </div>
              {{Form::close()}}
            </div>
        </div><br>
        @if($data->count())
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-condensed tfix">
                    <thead align="center">
                       <tr>
                           <td><b>Kode Matkul</b></td>
                           <td><b>Nama Matkul</b></td>
                           <td><b>SKS</b></td>
                           <td><b>Kelas</b></td>
                           <td colspan="2"><b>MENU</b></td>
                       </tr>
                   </thead>
                   @foreach($data as $m)
                       <tr>
                           <td>{{ $m->kodematkul }}</td>
                           <td>{{ $m->namamatkul }}</td>
                           <td>{{ $m->sks }}</td>
                           <td align="center" width="30px">
                             <a href="/matkul/listkelas/{{$m->kodematkul}}" class="btn btn-success btn-sm" role="button"><i class="fa fa-pencil-square"> Detail Kelas</i></a>
                           </td>
                           <td align="center" width="30px">
                               <a href="/matkul/{{$m->kodematkul}}/edit" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i> Edit</a>
                           </td>
                           <td align="center" width="30px">
                               {!! Form::open(array(
                                    'route' => array('matkul.destroy', $m->kodematkul),
                                    'method' => 'delete',
                                    'style' => 'display:inline')) !!}
                                    <button class='btn btn-sm btn-danger delete-btn' type='submit'>
                                        <i class='fa fa-times-circle'></i> Delete
                                    </button>
                                {!! Form::close() !!}

                           </td>
                       </tr>
                   @endforeach
              </table>
          </div>
        @else
            <div class="alert alert-warning">
                <i class="fa fa-exclamation-triangle"></i> Data Mata Kuliah tidak ditemukan
            </div>
        @endif
    </div>
    </div>
@endsection
