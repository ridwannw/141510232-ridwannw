@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Pengguna</div>

                <div class="panel-body">
                    Hello = {{Auth::user()->name}}<br>
                    Email Anda Adalah = {{Auth::user()->email}}<br>
                    Type Login Anda Sebagai = {{Auth::user()->type_user}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
