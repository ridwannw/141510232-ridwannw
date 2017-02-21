@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading">Tunjangan Pegawai</div>

                <div class="panel-body">
                    <center><a href="{{route('tunjanganpegawai.create')}}" class="btn btn-success">Tambah Data </a></center>
                    
	<br>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th>No</th>
				<th>Kode Tunjangan Id</th>
				<th>Nama Pegawai</th>
				<th colspan="3"><center>Action</center></th>
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($tunjanganp as $tunjanganp1)
		<tbody>
			<td>{{$no++}}</td>
			<td>{{$tunjanganp1->Tunjangan->kode_tunjangan}}</td>
			<td>{{$tunjanganp1->Pegawai->User->name}}</td>
			<td><center><a href="{{route('tunjanganpegawai.edit', $tunjanganp1->id)}}" class="btn btn-primary">Edit</a></center></td>
			<td><center>
				<form method="POST" action="{{route('tunjanganpegawai.destroy', $tunjanganp1->id)}}">
					{{csrf_field()}}
					<input type="hidden" name="_method" value="DELETE">
					<input class="btn btn-danger" onclick="return confirm('Yakin Mau Menghapus Data? ');" type="submit" value="Hapus"></form>
				</center></td>
		</tbody>
		@endforeach
		</table>
	</div>
</div>
</div>
</div>
</div>

@endsection