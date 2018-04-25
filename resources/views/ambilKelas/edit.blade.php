@extends('adminlte::page')

@section('title')
    Edit Ambil Kelas
@endsection

@section('content')
    <div class="panel panel-default">
    <div class="panel-body">
	    <h4><i class="fa fa-check-square"></i> EDIT Ambil Kelas</h4>
	    <hr>
        <div class="row">
	    	<div class="col-md-3">
				<div class="list-group">
				  <a href="#" class="list-group-item active">
				    <i class="fa fa-cogs"></i> MENU Ambil Kelas
				  </a>
				  <a href="/ambilKelas" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
				  <a href="/" class="list-group-item"><i class="fa fa-home"></i> Home</a>
				</div>
	        </div>

            <div class="col-md-6">
		    	<div class="panel panel-default">
	  				<div class="panel-body">
						{!! Form::model($aks,['method'=>'PATCH','action'=>['AmbilKelasController@update',$aks->id]]) !!}
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
                        
						{!! Form::button('<i class="fa fa-check-square"></i>'. ' Update', array('type' => 'submit', 'class' => 'btn btn-primary'))!!}
						{!! Form::close()!!}
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection
