@extends('layouts._layout')

@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-lg-3 col-xlg-3 col-md-5">
    </div>
    <div class="col-lg-6 col-xlg-3 col-md-5">
        <div class="card">
            <div class="user-bg"> <img width="100%" alt="user" src="{{$post->foto}}"> </div>
            <div class="card-body">
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-6 b-r">
                        <strong>Name</strong>
                        <p>{{$post->nama_seller}}</p>
                    </div>
                    <div class="col-md-6 b-r">
                        <strong>Name</strong>
                        <p>{{$post->judul}}</p>
                    </div>
                </div>
                <hr>
                <!-- /.row -->
                <!-- .row -->
                <div class="row m-t-10">
                    <div class="col-md-12 b-r"><strong>Deskripsi</strong>
                        <hr>
                        <p style="text-align: justify;">{{$post->deskripsi}}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Column -->
</div>
@endsection