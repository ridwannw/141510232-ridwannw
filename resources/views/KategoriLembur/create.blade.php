@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">Tambah Data Kategori</div>
				<div class="panel-body">
                {!! Form::open(['url'=>'kategori']) !!}
					<div class="form-group{{ $errors->has('kode_lembur') ? ' has-error' : 'pesan' }}">
						{!! Form::label ('Kode Lembur', 'Kode Lembur :') !!}
							<input type="text" name="kode_lembur" class="form-control" required>
							@if ($errors->has('kode_lembur'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('kode_lembur') }}</strong>
				                                    </span>
				            @endif
					</div>
					<div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
						{!! Form::label ('Nama Jabatan', ' Nama Jabatan:') !!}
						<select class="form-control" name="jabatan_id">
						<option value="">---Nama Jabatan---</option>
							@foreach($jabatan as $jabatan1)
							<option value="{!! $jabatan1->id!!}">{!! $jabatan1->nama_jabatan!!} </option>
							@endforeach
						</select>
						@if ($errors->has('jabatan_id'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('jabatan_id') }}</strong>
				                                    </span>
				        @endif
					</div>
					<div class="form-group{{ $errors->has('golongan_id') ? ' has-error' : '' }}">
						{!! Form::label ('Nama Golongan', ' Nama Golongan:') !!}
						<select class="form-control" name="golongan_id">
						<option value="">---Nama Golongan---</option>
							@foreach($golongan as $golongan1)
							<option value="{!! $golongan1->id!!}">{!! $golongan1->nama_golongan!!} </option>
							@endforeach
						</select>
						@if ($errors->has('golongan_id'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('golongan_id') }}</strong>
				                                    </span>
				        @endif
					</div>
					<div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : 'pesan' }}">
						{!! Form::label ('Besaran Uang', 'Besaran Uang :') !!}
							<input type="text" name="besaran_uang" class="form-control" required>
							@if ($errors->has('besaran_uang'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
				                                    </span>
				            @endif
					</div>
					<div class="form-group">
                        {!! Form::submit('Save',['class'=>'btn btn-primary form control']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
