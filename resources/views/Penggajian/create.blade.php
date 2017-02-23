@extends('layouts2.app2')

@section('content')
       <div id="content">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">

                        <h3 class="animated fadeInLeft">Tambah Data Gaji</h3>
                        <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Penggajian</p>

                       
                    </div>
                    <div class="col-md-0 col-sm-12">
                        
                       
                             
                              
                                 
                   
           
                <div class="panel-body">
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/penggajian') }}"   enctype="multipart/form-data">
    {!! csrf_field() !!}
<table  class="table" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    
   <h3 class="animated fadeInLeft">
       <div class="col-md-12">
       
                                <label for="Jabatan">Nama Pegawai</label>
                                    <select class="col-md-6 form-control" name="tunjangan_pegawai_id">
                                        @foreach($tunjangan as $datatunjangan)
                                            <option  value="{{$datatunjangan->id}}" >{{$datatunjangan->pegawai->User->name}}</option>
                                        @endforeach
                                    </select>
                                    <tr>
                                    <input type="hidden" name="status_pengembalian" value="0">
        <td colspan="2" align="right"><input type="reset" value="Ulang" class="btn btn-danger"> | <input type="submit" value="Tambah" class="btn btn-success"></input></td>
    </tr>
    </h3>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
                                    </div>

                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!--End simple table example -->

                </div>

                </div>

            </div>

                                    </div>
                          </div>
                        </div>                   
                    </div>
                  </div>                    
                </div>

@endsection
