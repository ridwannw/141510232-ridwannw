@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading">Edit Jabatan</div>
                    <div class="panel-body">
                    {!! Form::model($jabatan,['method'=>'PATCH', 'route'=>['jabatan.update', $jabatan->id]]) !!}
                        <div class="form-group {{ $errors->has('kode_golongan') ? ' has-error' : 'pesan' }}">

                            {!! Form::label('Kode Jabatan','Kode Jabatan :') !!}
                            {!!Form::text('kode_jabatan',null,['class'=>'form-control']) !!}
                            @if ($errors->has('kode_jabatan'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('kode_jabatan') }}</strong>
                                                    </span>
                                                @endif
                        
                        </div>
                        <div class="form-group">
                            {!! Form::label('Nama Jabatan','Nama Jabatan :') !!}
                            {!!Form::text('nama_jabatan',null,['class'=>'form-control']) !!}
                        
                        </div>
                        <div class="form-group">
                            {!! Form::label('Besaran Uang','Besaran Uang :') !!}
                            {!!Form::text('besaran_uang',null,['class'=>'form-control']) !!}
                        
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Save', ['class'=>'btn btn-primary form control']) !!}
                            {!! Form::close() !!}
                        </div>

            </div>
        </div>
    </div>
</div>
@endsection

