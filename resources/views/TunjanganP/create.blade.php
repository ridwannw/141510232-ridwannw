@extends('layouts.app')
@section('content')

<div class="col-md-offset-1">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Create Tunjangan Pegawai</div>
                    
                <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/tunjanganpegawai') }}">
                        {{ csrf_field() }}

                       <div class="form-group{{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
                            <label for="pegawai_id" class="col-md-4 control-label">Nama Jabatan</label>

                            <div class="col-md-6">
                                <select name="pegawai_id" class="form-control">
                                    <option value="">---Pilih---</option>
                                    @foreach($pegawai as $pegawai1)
                                    <option value="{{$pegawai1->id}}">{{$pegawai1->User->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pegawai_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <label for="status" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <select name="status" class="form-control">
                                    <option value="">---Pilih---</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    </select>
                                    </div>
                                    


                             <div class="form-group{{ $errors->has('jumlah_anak') ? ' has-error' : 'pesan' }}">
                        <label for="jumlah_anak" class="col-md-4 control-label">Jumlah Anak</label>
                        <div class="col-md-6">
                        <input type="text" name="jumlah_anak" class="form-control" required>
                        @if ($errors->has('jumlah_anak'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('jumlah_anak') }}</strong>
                                                    </span>
                                                @endif
                                                </div>
                    </div>
                             <div class="form-group{{ $errors->has('kode_tunjangan') ? ' has-error' : 'pesan' }}">
                         <label for="kode_tunjangan" class="col-md-4 control-label">Kode Tunjangan</label>
                         <div class="col-md-6">
                        <input type="text" name="kode_tunjangan" class="form-control" required>
                        @if ($errors->has('kode_tunjangan'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
                                                    </span>
                                                @endif
                                                </div>
                    </div>


                             <div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : 'pesan' }}">
                        <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang</label>
                        <div class="col-md-6">
                        <input type="text" name="besaran_uang" class="form-control" required>
                        @if ($errors->has('besaran_uang'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
                                                    </span>
                                                @endif
                    </div>
                        
                           <div class="col-md-12">
                            <button type="submit" class="btn btn-primary form-control">Tambah</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
    
@endsection