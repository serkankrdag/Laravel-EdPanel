@extends('layout.ogrenci')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles mx-0">

                @foreach($bloglar as $blog)
                    <div class="col-xl-3">
                        <div class="card mb-3">
                            <a href="blogdetayogrenci?id={{$blog['id']}}">
                                <img class="card-img-top img-fluid" src="assets/upload/blog/{{$blog['resim']}}">
                            </a>
                            <div class="card-header">
                                <a href="blogdetayogrenci?id={{$blog['id']}}">
                                    <h5 class="card-title">{{$blog['baslik']}}</h5>
                                </a>
                            </div>
                            <div class="card-body">{{$blog['detay']}}</div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
