@extends('layout.ogrenci')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row">

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="post-details">
                                <h3 class="mb-2 text-black">{{$etkinlik['baslik']}}</h3>
                                <ul class="mb-4 post-meta d-flex flex-wrap">
                                    <li class="post-date mr-3"><i class="fa fa-calender"></i>{{$etkinlik['updated_at']}}</li>
                                </ul>

                                <img src="assets/upload/etkinlikler/{{$etkinlik['resim']}}" class="img-fluid mb-3 w-50">

                                <p>{{$etkinlik['detay']}}</p>


                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="profile-interest">

                                                <div class="row mt-4 sp4" id="lightgallery">


                                                    @foreach(json_decode($etkinlik['resimler']) as $resimler)
                                                        <a href="assets/upload/etkinlikler/{{$resimler}}" data-exthumbimage="assets/upload/etkinlikler/{{$resimler}}" data-src="assets/upload/etkinlikler/{{$resimler}}" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                            <img src="assets/upload/etkinlikler/{{$resimler}}" alt="" class="img-fluid w-50">
                                                        </a>
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

                <div class="col-xl-4">
                    <div class="row">



                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-news">
                                        <h5 class="text-primary d-inline">Diğer Etkinlikler</h5>
                                        @foreach($etkinlikler as $etkinlik)
                                            @foreach(json_decode($etkinlik['sinifId']) as $etkinliksinif)
                                                @if($etkinliksinif == $sinifId)
                                                    <div class="media pt-3 pb-3">
                                                        <img src="assets/upload/etkinlikler/{{$etkinlik['resim']}}" alt="image" class="mr-3 rounded" width="75">
                                                        <div class="media-body">
                                                            <h5 class="m-b-5"><a href="etkinlikdetayogrenci?id={{$etkinlik['id']}}" class="text-black">{{$etkinlik['baslik']}}</a></h5>
                                                            <p class="mb-0">{{$etkinlik['detay']}}</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
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
