@extends('layout.yonetici')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row">

                <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
                    <div class="widget-stat card bg-primary">
                        <div class="card-body  p-4">
                            <div class="media">
                  <span class="mr-3">
                    <i class="la la-users"></i>
                  </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">TOPLAM ÖĞRENCİ</p>
                                    <h3 class="text-white">{{count($ogrenciler)}}</h3>
                                    <div class="progress mb-2 bg-secondary">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
                    <div class="widget-stat card bg-warning">
                        <div class="card-body p-4">
                            <div class="media">
                  <span class="mr-3">
                    <i class="la la-user"></i>
                  </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">TOPLAM ÖĞRETMEN</p>
                                    <h3 class="text-white">{{count($ogretmenler)}}</h3>
                                    <div class="progress mb-2 bg-primary">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
                    <div class="widget-stat card bg-secondary">
                        <div class="card-body p-4">
                            <div class="media">
                  <span class="mr-3">
                    <i class="la la-graduation-cap"></i>
                  </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">TOPLAM ETKİNLİK</p>
                                    <h3 class="text-white">{{count($etkinlikler)}}</h3>
                                    <div class="progress mb-2 bg-primary">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
                    <div class="widget-stat card bg-danger ">
                        <div class="card-body p-4">
                            <div class="media">
                  <span class="mr-3">
                    <i class="la la-users">
                    </i>
                  </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">TOPLAM VİDEO</p>
                                    <h3 class="text-white">{{count($videolar)}}</h3>
                                    <div class="progress mb-2 bg-secondary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">



                @if(isset($yemekmenu) && !empty($yemekmenu))
                <div class="col-xl-4 col-xxl-6 col-lg-6">
                    <div class="card">

                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="flaticon-381-success-2">
                                    <strong>{{$yemekmenu['created_at']}} Tarihli</strong> Yemek Menüsü</i>
                        </div>

                        <div class="card-body">
                            <div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1 height370">
                                <ul class="timeline">
                                    <li> <div class="timeline-badge primary"></div>
                                        <a class="timeline-panel text-muted">
                                            <span>Kahvaltı</span>
                                            <h7 class="mb-0">{{$yemekmenu['kahvalti']}}</h7>
                                        </a>
                                    </li>

                                    <li> <div class="timeline-badge info"></div>
                                        <a class="timeline-panel text-muted">
                                            <span>Öğle Yemeği</span>
                                            <h7 class="mb-0">{{$yemekmenu['ogleyemek']}}</h7>
                                        </a>
                                    </li>


                                    <li> <div class="timeline-badge danger"></div>
                                        <a class="timeline-panel text-muted">
                                            <span>Ara Öğün</span>
                                            <h7 class="mb-0">{{$yemekmenu['araogun']}}</h7>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="col-xl-4 col-xxl-6 col-lg-6">
                    <div class="card">
                        <div class="alert alert-secondary alert-dismissible fade show">
                            <li class="flaticon-381-send-2"> Son Verilen Ödevler</li>
                        </div>

                        <div class="card-body">

                            <div id="DZ_W_TimeLine" class="widget-timeline dz-scroll height370">
                                <ul class="timeline">


                                    <li>
                                        <div class="timeline-badge primary"></div>
                                        <a class="timeline-panel text-muted" href="#">
                                            <span>Öğretmen Adı Soyadı : Burak Güngör</span>
                                            <h6 class="mb-0">Deneme Ödev</h6>
                                        </a>
                                    </li>

                                    <li>
                                        <div class="timeline-badge primary"></div>
                                        <a class="timeline-panel text-muted" href="#">
                                            <span>Öğretmen Adı Soyadı : Faruk Güngör</span>
                                            <h6 class="mb-0">Deneme Ödev-1</h6>
                                        </a>
                                    </li>

                                    <li>
                                        <div class="timeline-badge primary"></div>
                                        <a class="timeline-panel text-muted" href="#">
                                            <span>Öğretmen Adı Soyadı : İrfan Koçak</span>
                                            <h6 class="mb-0">Deneme Ödev-2</h6>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>

                        </ul>

                    </div>
                </div>
                @if(isset($slider) && !empty($slider))
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body p-4">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"> </li>

                                </ol>

                                <div class="carousel-inner">

                                    <div class="carousel-item active">
                                        <a target="_blank" href="{{$slider['link']}}">
                                            <img class="d-block w-100" src="{{asset("/")}}assets/upload/slider/{{$slider['resim']}}"></a>
                                    </div>

                                    <div class="carousel-item ">
                                        <a target="_blank" href="{{$slider['link']}}">
                                            <img class="d-block w-100" src="{{asset("/")}}assets/upload/slider/{{$slider['resim']}}"></a>
                                    </div>

                                </div><a class="carousel-control-prev" href="#carouselExampleIndicators" data-slide="prev">
                                    <span class="carousel-control-prev-icon"> </span>
                                    <span class="sr-only">Geri</span> </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                    <span class="sr-only">İleri</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif


                <div class="col-xl-4 col-xxl-6 col-lg-6">
                    <div class="card border-0 pb-0">

                        <div class="alert alert-danger alert-dismissible fade show">
                            <li class="flaticon-381-send-2"> Son Eklenen Etkinlikler</li>
                        </div>

                        <div class="card-body">
                            <div id="DZ_W_Todo2" class="widget-media dz-scroll height370">
                                <ul class="timeline">

                                    @foreach($etkinlikler as $etkinlik)
                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media mr-2">
                                                    <img alt="image" width="50" src="{{asset("/")}}assets/upload/etkinlikler/{{$etkinlik['resim']}}">
                                                </div>

                                                <div class="media-body">
                                                    <h5 class="mb-1">{{$etkinlik['baslik']}}</h5>
                                                    <small class="d-block">{{$etkinlik['created_at']}}</small>
                                                </div>
                                                <div class="dropdown">
                                                    <a href="etkinlikduzenle?id={{$etkinlik['id']}}" class="btn btn-primary btn-xxs shadow">Etkinliği Düzenle</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-xxl-6 col-lg-6">
                    <div class="card border-0 pb-0">
                        <div class="alert alert-info alert-dismissible fade show">
                            <li class="flaticon-381-send-2"> Son Eklenen Ters Düz Eğitim Videoları</li>
                        </div>

                        <div class="card-body">
                            <div id="DZ_W_Todo3" class="widget-media dz-scroll height370">
                                <ul class="timeline">

                                    @foreach($videolar as $video)
                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media mr-2">
                                                    <img alt="image" width="50" src="{{asset("/")}}assets/upload/video/{{$video['resim']}}">
                                                </div>
                                                <a href="#">
                                                    <div class="media-body">
                                                        <h5 class="mb-1"><small class="text-muted">{{$video['videosure']}}</small></h5>
                                                        <p class="mb-1">{{$video['baslik']}}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-xxl-6 col-lg-6">
                    <div class="card border-0 pb-0">
                        <div class="alert alert-success alert-dismissible fade show">
                            <li class="flaticon-381-send-2"> Son Eklenen Blog Yazıları</li>
                        </div>

                        <div class="card-body">
                            <div id="DZ_W_Todo3" class="widget-media dz-scroll height370">
                                <ul class="timeline">


                                    @foreach($bloglar as $blog)
                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media mr-2">

                                                    <img alt="image" width="50" src="{{asset("/")}}assets/upload/blog/{{$blog['resim']}}">
                                                </div>

                                                <div class="media-body">
                                                    <a href="#">
                                                        <h5 class="mb-1"><small class="text-muted">{{$blog['created_at']}}</small></h5>
                                                        <p class="mb-1">{{$blog['baslik']}}</p></a>
                                                </div>


                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
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
