@extends('adminlte::page')

@section('title')
    Tambah Mahasiwa
@endsection

@section('content')
    <div class="panel panel-default">
    <div class="panel-body">
	    <h4><i class="fa fa-plus-square"></i> TAMBAH AMBIL KELAS</h4>
	    <hr>
        <div class="row">
	    	<div class="col-md-3">
				<div class="list-group">
				  <a href="#" class="list-group-item active">
				    <i class="fa fa-cogs"></i> MENU AMBIL KELAS
				  </a>
				  <a href="/ambilKelas" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
				  <a href="/" class="list-group-item"><i class="fa fa-home"></i> Home</a>
				</div>
	        </div>

            <div class="col-md-6">
		    	<div class="panel panel-default">
	  				<div class="panel-body">
						{!! Form::open(array('url' => '/ambilKelas')) !!}
						<div class="form-group">
							{!! Form::label('nrp', 'NRP') !!}
							{!! Form::select('nrp', $mhs, null, array('class' => 'form-control')) !!}
						</div>
                        <div class="form-group">
							{!! Form::label('kodekelas', 'Kode Kelas') !!}
							{!! Form::select('kodekelas', $kls, null, array('class' => 'form-control')) !!}
						</div>
                        <div class="form-group">
							{!! Form::label('uts', 'Nilai UTS') !!}
							{!! Form::text('uts', null , array('class' => 'form-control', 'placeholder'=>'Nilai UTS')) !!}
						</div>
                        <div class="form-group">
							{!! Form::label('uas', 'Nilai UAS') !!}
							{!! Form::text('uas', null , array('class' => 'form-control', 'placeholder'=>'Nilai UAS')) !!}
						</div>
                        
						{!! Form::button('<i class="fa fa-plus-square"></i>'. ' Simpan', array('type' => 'submit', 'class' => 'btn btn-primary'))!!}
                        {!! Form::button('<i class="fa fa-times"></i>'. ' Reset', array('type' => 'reset', 'class' => 'btn btn-danger'))!!}

						{!! Form::close()!!}
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection
