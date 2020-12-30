@extends('layouts._layout')

@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Dashboard</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Info box -->
<!-- ============================================================== -->
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="round align-self-center round-success"><i class="ti-user"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0">{{$jumlah_user}}</h3>
                        <h5 class="text-muted m-b-0">Jumlah User</h5></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="round align-self-center round-info"><i class="ti-shopping-cart"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0">{{$jumlah_seller}}</h3>
                        <h5 class="text-muted m-b-0">Jumlah Seller</h5></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="round align-self-center round-danger"><i class="ti-bookmark-alt"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0">{{$jumlah_post}}</h3>
                        <h5 class="text-muted m-b-0">Total Post.</h5></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="round align-self-center round-success"><i class="ti-heart"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0">{{$selelr_aktif}}</h3>
                        <h5 class="text-muted m-b-0">Seller Aktif</h5></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<div class="row">
    <div id="map2" style="width: 100%; height: 700px;"></div>
</div>
<!-- Row -->
@section('script')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvTkPKa1jErT_Kh9ZPTIP2az48f8y0WGo"></script> 
    <script>
        $( document ).ready(function() {
            $.ajax({
                url: "getPointMap",
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    console.log(res.points_data);
                    var map = new google.maps.Map(document.getElementById('map2'), {
                        zoom: 8,
                        center: new google.maps.LatLng(-7.189950994065144, 110.72271313388333),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });

                    var infowindow = new google.maps.InfoWindow();

                    var marker, i;

                    for (i = 0; i < res.points_data.length; i++) {
                        console.log(res.points_data[i]['latitude'])
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(res.points_data[i]['latitude'], res.points_data[i]['longitude']),
                        map: map,
                        icon: 'assets/images/marker.webp'
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                            infowindow.setContent(res.points_data[i]['name']);
                            infowindow.open(map, marker);
                            }
                        })
                        (marker, i));
                    }
                }
            });
        });

    </script>
@endsection
@endsection
