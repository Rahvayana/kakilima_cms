@extends('layouts._layout')

@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Doctor Profile</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Doctor Profile</li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
        </div>
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
        <div class="card">
            <div class="user-bg"> <img width="100%" alt="user" src="{{$user->foto}}"> </div>
            <div class="card-body">
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-6 b-r">
                        <strong>Name</strong>
                        <p>{{$seller->nama_seller}}</p>
                    </div>
                    <div class="col-md-6"><strong>Sebagai</strong>
                        <p>Penjual</p>
                    </div>
                </div>
                <hr>
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-12"><strong>Address</strong>
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
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Postingan</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Detail</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="card-body">
                        <div class="profiletimeline">
                            @foreach ($posts as $post)
                            <div class="sl-item">
                                <div class="sl-left"> <img src="{{$user->foto}}" alt="user" class="img-circle" /> </div>
                                <div class="sl-right">
                                    <div><a href="javascript:void(0)" class="link">{{$seller->nama_seller}}</a>
                                        <p>{{$post->judul}}</p>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 m-b-20"><img src="{{$post->foto}}" class="img-responsive radius" /></div>
                                        </div>
                                        <p style="text-align: justify">{{$post->deskripsi}}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--second tab-->
                <div class="tab-pane" id="profile" role="tabpanel">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-xs-6 b-r"> <strong>Nama</strong>
                                <br>
                                <p class="text-muted">{{$user->name}}</p>
                            </div>
                            <div class="col-md-4 col-xs-6 b-r"> <strong>Mobile</strong>
                                <br>
                                <p class="text-muted">{{$user->no_hp}}</p>
                            </div>
                            <div class="col-md-4 col-xs-6 b-r"> <strong>Email</strong>
                                <br>
                                <p class="text-muted">{{$user->email}}</p>
                            </div>
                        </div>
                        <hr>
                        <p class="m-t-30">{{$seller->deskripsi}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
@endsection