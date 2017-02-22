@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">PEGAWAI</div>
                <br>
                <div align=right class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4>
               
                    <a href="{{route('pegawai.create')}}" class="btn btn-success">Tambah Data Pegawai</a>
    <br>            
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th>No</th>
				<th>NIP</th>
				<th>User Id</th>
				<th>Jabatan Id</th>
				<th>Golongan Id</th>
				<th>Photo</th>
				
				<th colspan="3"><center>Action</center></th>
				
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($pegawai as $pegawai1)
		<tbody>
			<tr>
				<td>{{$no++}}</td>
				<td>{{$pegawai1->nip}}</td>
				<td>{{$pegawai1->User->name}}</td>
				<td>{{$pegawai1->Jabatan->nama_jabatan}}</td>
				<td>{{$pegawai1->Golongan->nama_golongan}}</td>
				<td><img src="{{ asset('gambar/'.$pegawai1->photo.'') }}" width="30" height="30"></td>
				<td><center><a href="{{route('pegawai.edit', $pegawai1->id)}}" class="btn btn-warning">Edit</a></center></td>
				<td><center>
					<form method="POST" action="{{route('pegawai.destroy', $pegawai1->id)}}">
					{{csrf_field()}}
					<input type="hidden" name="_method" value="DELETE">
					<input class="btn btn-danger" onclick="return confirm('Yakin Mau Menghapus Data? ');" type="submit" value="Hapus"></form>
				</center></td>
				
			</tr>
			@endforeach
		</tbody>
	</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
