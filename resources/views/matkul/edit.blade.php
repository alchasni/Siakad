@extends('adminlte::page')

@section('title')
    Edit Mata Kuliah
@endsection

@section('content')
    <div class="panel panel-default">
    <div class="panel-body">
	    <h4><i class="fa fa-check-square"></i> EDIT DATA Mata Kuliah</h4>
	    <hr>
        <div class="row">
	    	<div class="col-md-3">
				<div class="list-group">
				  <a href="#" class="list-group-item active">
				    <i class="fa fa-cogs"></i> MENU Mata Kuliah
				  </a>
				  <a href="/matkul" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
				  <a href="/" class="list-group-item"><i class="fa fa-home"></i> Home</a>
				</div>
	        </div>

            <div class="col-md-6">
		    	<div class="panel panel-default">
	  				<div class="panel-body">
                        {!! Form::model($data,['method'=>'PATCH','action'=>['MatkulController@update',$data->kodematkul]]) !!}
						<div class="form-group">
							{!! Form::label('kodematkul', 'kodematkul') !!}
							{!! Form::text('kodematkul',null, array('class' => 'form-control','placeholder'=>'kodematkul')) !!}
						</div>
                        <div class="form-group">
							{!! Form::label('namamatkul', 'Nama matkul') !!}
							{!! Form::text('namamatkul', null, array('class' => 'form-control','placeholder'=>'Nama matkul')) !!}
						</div>
						<div class="form-group">
							{{Form::label('sks', 'SKS')}}
							{{Form::text('sks', null, array('class' => 'form-control','placeholder'=>'SKS'))}}
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
