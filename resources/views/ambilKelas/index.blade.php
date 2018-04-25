@extends('adminlte::page')

@section('title')
    Data Ambil Kelas
@endsection

@section('content')
    <div class="panel panel-default">
    <div class="panel-body">
        <h4><i class="fa fa-calendar"></i> DAFTAR Ambil Kelas</h4><hr>

        <div class=row>
            <div class="col-md-6">
                <a href="/ambilKelas/create" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</a>
                <a href="/viewak" class="btn btn-primary"><i class="fa fa-refresh"></i> BootGird</a>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-4">
            </div>
        </div><br>
        @if(count($data))
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-condensed tfix">
                    <thead align="center">
                       <tr>
                           <td><b>NRP</b></td>
                           <td><b>Nama Mahasiswa</b></td>
                           <td><b>Mata Kuliah</b></td>
                           <td><b>Kode Kelas</b></td>
                           <td><b>Nilai UTS</b></td>
                           <td><b>Nilai UAS</b></td>
                           <td colspan="2"><b>MENU</b></td>
                       </tr>
                   </thead>
                   @foreach($data as $m)
                       <tr>
                           <td>{{ $m->nrp }}</td>
                           <td>{{ $m->namamhs }}</td>
                           <td>{{ $m->namamatkul }}</td>
                           <td>{{ $m->kodekelas }}</td>
                           <td>{{ $m->uts }}</td>
                           <td>{{ $m->uas }}</td>
                           <td align="center" width="30px">
                               <a href="/ambilKelas/{{ $m->id }}/edit" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i> Edit</a>
                           </td>
                           <td align="center" width="30px">
                               {!! Form::open(array(
                                    'route' => array('ambilKelas.destroy', $m->id),
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
                <i class="fa fa-exclamation-triangle"></i> Data Ambil Kelas belum ada
            </div>
        @endif
    </div>
    </div>
@endsection
