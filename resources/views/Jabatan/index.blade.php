@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading ">JABATAN</div>
               <br>
                <div align=right class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4>
                
                <a href="{{route('jabatan.create')}}" class="btn btn-success">Tambah Data</a>
				
	<br>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th>No</th>
				<th>Kode Jabatan</th>
				<th>Nama Jabatan</th>
				<th>Besaraan Uang</th>
				<th colspan="3"><center>Action</center></th>
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($jabatan as $jabatan1)
		<tbody>
			<tr>
				
				<td>{{$no++}}</td>
				<td>{{$jabatan1->kode_jabatan}}</td>
				<td>{{$jabatan1->nama_jabatan}}</td>
				<?php $jabatan1->besaran_uang=number_format($jabatan1->besaran_uang,2,',','.'); ?>
				<td>Rp.{{$jabatan1->besaran_uang}}</td>
				<td><center><a href="{{route('jabatan.edit', $jabatan1->id)}}" class="btn btn-warning">Edit</a></center></td>
				<td><center>
					<form method="POST" action="{{route('jabatan.destroy', $jabatan1->id)}}">
					{{csrf_field()}}
					<input type="hidden" name="_method" value="DELETE">
					<input class="btn btn-danger" onclick="return confirm('Yakin Mau Menghapus Jabatan? ');" type="submit" value="Hapus"></form>
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
