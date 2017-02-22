@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading">Tambah Golongan</div>

                <div class="panel-body">
                    {!! Form::open(['url'=>'golongan']) !!}
                    <div class="form-group{{ $errors->has('kode_golongan') ? ' has-error' : 'pesan' }}">
                        {!! Form::label ('Kode golongan', 'Kode golongan :') !!}
                        <input type="text" name="kode_golongan" class="form-control" required>
                        @if ($errors->has('kode_golongan'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('kode_golongan') }}</strong>
                                                    </span>
                                                @endif
                    </div>

                    <div class="form-group{{ $errors->has('nama_golongan') ? ' has-error' : 'pesan' }}">
                        {!! Form::label ('Nama golongan', 'Nama golongan :') !!}
                        <input type="text" name="nama_golongan" class="form-control" required>
                        @if ($errors->has('nama_golongan'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('nama_golongan') }}</strong>
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