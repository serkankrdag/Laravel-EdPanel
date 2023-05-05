@extends('layout.ogrenci')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles mx-0">

                @foreach($etkinlikler as $etkinlik)
                    @foreach(json_decode($etkinlik['sinifId']) as $etkinliksinif)
                        @if($etkinliksinif == $sinifId)
                            <div class="col-xl-3">
                                <div class="card mb-3">
                                    <a href="etkinlikdetayogretmen?id={{$etkinlik['id']}}">
                                        @if($etkinlik['resim']!='')
                                            <img class="card-img-top img-fluid" src="assets/upload/etkinlikler/{{$etkinlik['resim']}}">
                                        @else
                                            <img class="card-img-top img-fluid" src="https://isplanim.com.tr/v1/images/slider/633def4b70104.png">
                                        @endif
                                    </a>
                                    <div class="card-header">
                                        <a href="etkinlikdetayogrenci?id={{$etkinlik['id']}}">
                                            <h5 class="card-title">{{$etkinlik['baslik']}}</h5></a>
                                    </div>

                                    <div class="card-body">
                                        {{$etkinlik['detay']}}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach

            </div>
        </div>
    </div>

@endsection
