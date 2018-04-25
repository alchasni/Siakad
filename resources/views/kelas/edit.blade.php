@extends('adminlte::page')

@section('title')
    Edit Kelas
@endsection

@section('content')
    <div class="panel panel-default">
    <div class="panel-body">
	    <h4><i class="fa fa-check-square"></i> EDIT Kelas</h4>
	    <hr>
        <div class="row">
	    	<div class="col-md-3">
				<div class="list-group">
				  <a href="#" class="list-group-item active">
				    <i class="fa fa-cogs"></i> MENU Kelas
				  </a>
				  <a href="/kelas" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
				  <a href="/" class="list-group-item"><i class="fa fa-home"></i> Home</a>
				</div>
	        </div>

            <div class="col-md-6">
		    	<div class="panel panel-default">
	  				<div class="panel-body">
						{!! Form::model($kls,['method'=>'PATCH','action'=>['KelasController@update',$kls->kodekelas]]) !!}
						<div class="form-group">
							{!! Form::label('kodematkul', 'Nama Matkul') !!}
							{!! Form::select('kodematkul', $mksnya, null, array('class' => 'form-control')) !!}
						</div>
                        <div class="form-group">
							{!! Form::label('kodekelas', 'Nama Kelas') !!}
							{!! Form::text('kodekelas', null, array('class' => 'form-control','placeholder'=>'Nama Kelas')) !!}
						</div>
                        <div class="form-group">
							{!! Form::label('nip', 'Dosen Ajar') !!}
                            {!! Form::select('nip', $dsnnya ,null , array('class' => 'form-control')) !!}
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
