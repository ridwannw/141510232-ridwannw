@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">PEGAWAI</div>

                <div class="panel-body panel-primary">
                    <center><a href="{{route('pegawai.create')}}" class="btn btn-success">Tambah Data</a></center>
                    
               
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
		@foreach($pegawai as $data)
		<tbody>
			<tr>
				<td>{{$no++}}</td>
				<td>{{$data->nip}}</td>
				<td>{{$data->User->name}}</td>
				<td>{{$data->Jabatan->nama_jabatan}}</td>
				<td>{{$data->Golongan->nama_golongan}}</td>
				<td><img src="{{ asset('gambar/'.$data->photo.'') }}" width="30" height="30"></td>
				<td><center><a href="{{route('pegawai.show', $data->id)}}" class="btn btn-primary">Lihat</a></center></td>
				<td><center><a href="{{route('pegawai.edit', $data->id)}}" class="btn btn-warning">Edit</a></center></td>
				<td><center>
					<form method="POST" action="{{route('pegawai.destroy', $data->id)}}">
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
