@extends('layout.ogrenci')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row">

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="post-details">
                                <h3 class="mb-2 text-black">{{$blog['baslik']}}</h3>
                                <ul class="mb-4 post-meta d-flex flex-wrap">
                                    <li class="post-date mr-3"><i class="fa fa-calender"></i>{{$blog['update_at']}}</li>
                                </ul>

                                <img src="assets/upload/blog/{{$blog['resim']}}" class="img-fluid mb-3 w-50">

                                <p>{{$blog['detay']}}</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="row">



                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-news">
                                        <h5 class="text-primary d-inline">Diğer Blog Yazıları</h5>

                                        @foreach($bloglar as $blog)
                                            <div class="media pt-3 pb-3">
                                                <img src="assets/upload/blog/{{$blog['resim']}}" alt="image" class="mr-3 rounded" width="75">
                                                <div class="media-body">
                                                    <h5 class="m-b-5"><a href="blogdetayogrenci?id={{$blog['id']}}" class="text-black">{{$blog['baslik']}}</a></h5>
                                                    <p class="mb-0">{{$blog['detay']}}</p>
                                                </div>
                                            </div>
                                        @endforeach

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
