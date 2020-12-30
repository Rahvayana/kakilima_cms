@extends('layouts._layout')

@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">List Posts</h4>
    </div>
</div>
<div class="row">
    @foreach ($posts as $post)
        <div class="col-md-4">
            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="{{$post->foto}}" alt="Card image cap">
                <div class="card-body">
                <h4 class="card-title">{{$post->judul}}</h4>
                <p class="card-text" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">{{$post->deskripsi}}</p>
                <a href="{{ route('detail-post',$post->id) }}" class="btn btn-primary">Detail Post</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection