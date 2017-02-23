@extends('layouts.app2')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading">Tunjangan Pegawai</div>
                <br>
                <div align=right class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4>
                
                    <a href="{{route('tunjanganpegawai.create')}}" class="btn btn-success">Tambah Data </a>
    <br>               
	<br>
	<table class="table table-bordered ">
		<tr class="bg-info">
                            <th >No</th>
                            <th>Kode Tunjangan</th>
                            <th>Nip</th>
                            <th>Nama Pegawai</th>
                            <th colspan="2">Jabatan Dan Golongan</th>
                            <th>Status</th>
                            <th>Jumlah Anak</th>
                            <th>Besaran Uang</th>
                            <th colspan="3">Opsi</th>
                        </tr>

                        @php
                            $no=1 ;
                        @endphp

                        @foreach($tunjanganp as $tunjanganp1)


                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$tunjanganp1->tunjangan->kode_tunjangan}}</td>
                                <td>{{$tunjanganp1->pegawai->nip}}</td>
                                <td>{{$tunjanganp1->pegawai->User->name}}</td>
                                <td>{{$tunjanganp1->pegawai->jabatan->nama_jabatan}}</td>
                                <td>{{$tunjanganp1->pegawai->golongan->nama_golongan}}</td>
                                <td>{{$tunjanganp1->tunjangan->status}}</td>
                                <td>{{$tunjanganp1->tunjangan->jumlah_anak}} Anak</td>
                                <?php $tunjanganp1->tunjangan->besaran_uang=number_format($tunjanganp1->tunjangan->besaran_uang,2,',','.'); ?>
                                <td>Rp. {{$tunjanganp1->tunjangan->besaran_uang}}</td>
                                <td><a class="btn btn-success form-control" href="{{route('tunjanganpegawai.edit',$tunjanganp1->id)}}">Edit </a></td>
                                <td>
                                     {!!Form::open(['method'=>'DELETE','route'=>['tunjanganpegawai.destroy',$tunjanganp1->id]])!!}
                                    {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                        
                    </table>
</div>

@endsection