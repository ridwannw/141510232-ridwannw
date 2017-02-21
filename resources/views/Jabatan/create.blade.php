@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading">Tambah Data Jabatan</div>

                <div class="panel-body">
                    {!! Form::open(['url'=>'jabatan']) !!}
                    <div class="form-group{{ $errors->has('kode_jabatan') ? ' has-error' : 'pesan' }}">
                        {!! Form::label ('Kode Jabatan', 'Kode Jabatan :') !!}
                        <input type="text" name="kode_jabatan" class="form-control" required>
                        @if ($errors->has('kode_jabatan'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('kode_jabatan') }}</strong>
                                                    </span>
                                                @endif
                    </div>

                    <div class="form-group{{ $errors->has('nama_jabatan') ? ' has-error' : 'pesan' }}">
                        {!! Form::label ('Nama Jabatan', 'Nama Jabatan :') !!}
                        <input type="text" name="nama_jabatan" class="form-control" required>
                        @if ($errors->has('nama_jabatan'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('nama_jabatan') }}</strong>
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
                    {!! Form::submit('Save', ['class' => 'btn btn-primary form control']) !!}
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection