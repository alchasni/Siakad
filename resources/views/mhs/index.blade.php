@extends('adminlte::page')

@section('title')
    Data Mahasiswa
@endsection

@section('content')
    <div class="panel panel-default">
    <div class="panel-body">
        <h4><i class="fa fa-user"></i> DAFTAR Mahasiswa</h4><hr>

        <div class=row>
            <div class="col-md-6">
                <a href="/mhs/create" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</a>
                <a href="/viewmhs" class="btn btn-primary"><i class="fa fa-refresh"></i> BootGird</a>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-4">
              {{Form::open(['method'=>'GET','url'=>'carimhs','role'=>'search'])}}
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="search" placeholder="Search Nama Mahasiswa...">
                    <span class="input-group-btn">
                        <span class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Cari</button>
               </span>
                     </span>
                 </div>
              {{Form::close()}}
            </div>
        </div><br>
        @if(count($mhs))
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-condensed tfix">
                    <thead align="center">
                       <tr>
                           <td><b>NRP</b></td>
                           <td><b>Nama Mahasiswa</b></td>
                           <td><b>Nama Dosen Wali</b></td>
                           <td colspan="2"><b>MENU</b></td>
                       </tr>
                   </thead>
                   @foreach($mhs as $m)
                       <tr>
                           <td>{{ $m->nrp }}</td>
                           <td>{{ $m->namamhs }}</td>
                           <td>{{ $m->namadosen }}</td>
                           <td align="center" width="30px">
                               <a href="/mhs/{{$m->nrp}}/edit" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i> Edit</a>
                           </td>
                           <td align="center" width="30px">
                               {!! Form::open(array(
                                    'route' => array('mhs.destroy', $m->nrp),
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
                <i class="fa fa-exclamation-triangle"></i> Data Mahasiswa belum ada
            </div>
        @endif
    </div>
    </div>
@endsection
