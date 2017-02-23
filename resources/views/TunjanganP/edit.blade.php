@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">EDIT TUNJANGAN PEGAWAI</div>

                <div class="panel-body">
                {!! Form::model($tp,['method'=>'PATCH', 'route'=>['tunjangan_pegawai.update', $tp->id]]) !!}
                <div class="form-group">
						{!! Form::label ('Kode Tunjangan Id', ' Kode Tunjangan Id:') !!}
						<select class="form-control" name="kode_tunjangan_id">
						<option value="">---Kode Tunjangan Id---</option>
							@foreach($tun as $data)
							<option value="{!! $data->id!!}">{!! $data->kode_tunjangan!!} </option>
							@endforeach
						</select>
				</div>
				<div class="form-group{{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
						{!! Form::label ('Nama Pegawai', ' Nama Pegawai:') !!}
						<select class="form-control" name="pegawai_id">
						<option value="">---Nama Pegawai---</option>
							@foreach($peg as $data)
							<option value="{!! $data->id!!}">{!! $data->User->name!!} </option>
							@endforeach
						</select>
						@if ($errors->has('pegawai_id'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
				                                    </span>
				        @endif
					</div>
				<div class="form-group">
				{!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
				{!! Form::close() !!}
				</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	@endsection