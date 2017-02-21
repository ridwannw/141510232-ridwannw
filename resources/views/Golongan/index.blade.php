@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading ">Golongan</div>
                <div class="panel-body">
                <a href="{{route('golongan.create')}}" class="btn btn-success">Tambah Data Golongan</a>
				
	<br>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th>No</th>
				<th>Kode Golongan</th>
				<th>Nama Golongan</th>
				<th>Besaraan Uang</th>
				<th colspan="3"><center>Action</center></th>
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($golongan as $golongan1)
		<tbody>
			<tr>
				
				<td>{{$no++}}</td>
				<td>{{$golongan1->kode_golongan}}</td>
				<td>{{$golongan1->nama_golongan}}</td>
				<?php $golongan1->besaran_uang=number_format($golongan1->besaran_uang,2,',','.'); ?>
				<td>Rp.{{$golongan1->besaran_uang}}</td>
				<td><center><a href="{{route('golongan.edit', $golongan1->id)}}" class="btn btn-warning">Edit</a></center></td>
				<td><center>
					<form method="POST" action="{{route('golongan.destroy', $golongan1->id)}}">
					{{csrf_field()}}
					<input type="hidden" name="_method" value="DELETE">
					<input class="btn btn-danger" onclick="return confirm('Yakin Mau Menghapus Golongan? ');" type="submit" value="Hapus"></form>
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
