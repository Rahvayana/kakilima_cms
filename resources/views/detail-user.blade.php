@extends('layouts._layout')

@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{$user->name}} Profile</h4>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
    </div>
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="user-bg"> <img width="100%" alt="user" src="{{$user->foto}}"> </div>
            <div class="card-body">
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-6 b-r">
                        <strong>Name</strong>
                        <p>{{$user->name}}</p>
                    </div>
                    <div class="col-md-6"><strong>Occupation</strong>
                        <p>
                            @if ($user->id_seller)
                            Penjual
                            @else
                            Pembeli
                            @endif
                        </p>
                    </div>
                </div>
                <hr>
                <!-- /.row -->
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-6 b-r"><strong>Email</strong>
                        <p>{{$user->email}}</p>
                    </div>
                    <div class="col-md-6"><strong>Phone</strong>
                        <p>{{$user->no_hp}}</p>
                    </div>
                </div>
                <!-- /.row -->
                <hr>
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-12"><strong>Alamat</strong>
                        <p>{{$user->alamat}}</p>
                    </div>
                </div>
                <hr>
                <br/>
                <div class="row m-t-15">
                    <div class="col-md-4 col-sm-4 text-center">
                        <p class="text-purple"><i class="ti-home"></i></p>
                        <p>{{$user->provinsi}}</p> </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <p class="text-blue"><i class="ti-home"></i></p>
                        <p>{{$user->kota}}</p> </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <p class="text-danger"><i class="ti-home"></i></p>
                        <p>{{$user->kecamatan}}</p> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
@endsection