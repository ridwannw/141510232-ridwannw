@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading"><h3>Kategori Lembur</h3></div>

                <div class="panel-body">
                    <center><a href="{{route('kategori.create')}}" class="btn btn-success">Tambah Data</a></center>
                    
	<br>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th>No</th>
				<th>Kode Lembur</th>
				<th>Nama Jabatan</th>
				<th>Nama Golongan</th>
				<th>Besaran Uang</th>
				<th colspan="3"><center>Action</center></th>
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($kategori as $kategori1)
		<tbody>
			<td>{{$no++}}</td>
			<td>{{$kategori1->kode_lembur}}</td>
			<td>{{$kategori1->Jabatan->nama_jabatan}}</td>
			<td>{{$kategori1->Golongan->nama_golongan}}</td>
			<?php $kategori1->besaran_uang=number_format($kategori1->besaran_uang,2,',','.'); ?>
			<td>Rp.{{$kategori1->besaran_uang}}</td>
			<td><center><a href="{{route('kategori.edit', $kategori1->id)}}" class="btn btn-warning">Edit</a></center></td>
			<td><center>
				<form method="POST" action="{{route('kategori.destroy', $kategori1->id)}}">
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