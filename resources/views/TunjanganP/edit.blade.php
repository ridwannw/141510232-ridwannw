@extends('layouts.app')

@section('content')

<div class="col-md-offset-1">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Edit Tunjangan Pegawai</div>
                    
                <div class="panel-body">
                     {!!Form::model($tunjanganp,['method'=>'PATCH','route'=>['tunjanganpegawai.update',$tunjanganp->id]])!!}

                            <div class="col-md-6">
                            <label>Nama Pegawai Lama</label>
                                <input type="text" class="form-control" value="{{$tunjanganp->pegawai->User->name}}" readonly="">
                            </div>

                            <div class="col-md-6">
                                <label>Nama Pegawai Baru</label>
                                <select name="id_pegawai" class="form-control">
                                @foreach($pegawai as $pegawai1)
                                    <option value="{{$pegawai1->id}}">
                                        {{$pegawai1->User->name}}
                                    </option>
                                @endforeach
                                </select>
                                <span class="help-block">
                                        <strong>{{ $errors->first('id_pegawai') }}</strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label>Kode Tunjangan</label>
                                <input type="text" class="form-control" name="kode_tunjangan" value="{{$tunjanganp->tunjangan->kode_tunjangan}}" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label>Jumlah Anak</label>
                                <input type="text" class="form-control" name="jumlah_anak" value="{{$tunjanganp->tunjangan->jumlah_anak}}" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_anak') }}</strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label for="Jabatan">Status Lama</label>
                                <input type="text" class="form-control" value="{{$tunjanganp->tunjangan->status}}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="Jabatan">Status Baru</label>
                                    <select class="col-md-6 form-control" name="status">
                                            <option name="status">Single</option>
                                            <option name="status">Menikah</option>
                                    </select>
                            </div>


                            <div class="col-md-12">
                                <label>Besaran Uang</label>
                                <input type="text" value="{{$tunjanganp->tunjangan->besaran_uang}}" class="form-control" name="besaran_uang" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
                                    </span>
                            </div>
                        
                           <div class="col-md-12">
                            <button type="submit" class="btn btn-primary form-control">Tambah</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
    
@endsection