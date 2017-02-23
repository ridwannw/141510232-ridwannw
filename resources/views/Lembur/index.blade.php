@extends('layouts.app2')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading">Lembur Pegawai</div>
                <br>
                <div align=right class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4>
                
                    <a href="{{route('lembur.create')}}" class="btn btn-success">Tambah Data Lembur</a>
                    
	<br>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th>No</th>
				<th>Kode Lembur Id</th>
				<th>Nama Pegawai</th>
				<th>Jumlah Jam</th>
				<th colspan="3"><center>Action</center></th>
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($lembur as $lembur1)
		<tbody>
			<td>{{$no++}}</td>
			<td>{{$lembur1->KategoriLembur->kode_lembur}}
			<td>{{$lembur1->Pegawai->User->name}}</td>
			<td>{{$lembur1->jumlah_jam}}</td>
			<td><center><a href="{{route('lembur.edit', $lembur1->id)}}" class="btn btn-warning">Edit</a></center></td>
			<td><center>
				<form method="POST" action="{{route('lembur.destroy', $lembur1->id)}}">
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