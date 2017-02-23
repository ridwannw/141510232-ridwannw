@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading ">Penggajian</div>
               <br>
                <div align=right class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4>
                
                <a href="{{route('penggajian.create')}}" class="btn btn-success">Hitung Penggajian</a>
                
    <br>
    <br>
    @endsection