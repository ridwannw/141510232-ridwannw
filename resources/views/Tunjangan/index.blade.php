@extends('layouts.app2')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading">TUNJANGAN</div>
                <br>
                <div align=right class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4>
                
                    <a href="{{route('tunjangan.create')}}" class="btn btn-success">Tambah Data</a>
    <br>                
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th>No</th>
				<th>Kode Tunjangan</th>
				<th>Nama Jabatan</th>
				<th>Nama Golongan</th>
				<th>Status</th>
				<th>Jumlah Anak</th>
				<th>Besaran Uang</th>
				<th colspan="3"><center>Action</center></th>
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($tunjangan as $tunjangan1)
		<tbody>
			<td>{{$no++}}</td>
			<td>{{$tunjangan1->kode_tunjangan}}</td>
			<td>{{$tunjangan1->Jabatan->nama_jabatan}}</td>
			<td>{{$tunjangan1->Golongan->nama_golongan}}</td>
			<td>{{$tunjangan1->status}}</td>
			<td>{{$tunjangan1->jumlah_anak}}</td>
			<?php $tunjangan1->besaran_uang=number_format($tunjangan1->besaran_uang,2,',','.'); ?>
			<td>Rp.{{$tunjangan1->besaran_uang}}</td>
			<td><center><a href="{{route('tunjangan.edit', $tunjangan1->id)}}" class="btn btn-warning">Edit</a></center></td>
			<td><center>
				<form method="POST" action="{{route('tunjangan.destroy', $tunjangan1->id)}}">
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