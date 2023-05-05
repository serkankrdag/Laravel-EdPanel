@extends('layout.ogrenci')
@section('content')

    <div class="content-body">
        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-8 col-xxl-12 col-lg-12">
                    <div class="card-body">


                        <div class="card">
                            <div class="alert alert-primary alert-dismissible fade show">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="12" r="10"></circle>
                                    <path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line>
                                    <line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                                <strong><?php echo date("d-m-Y"); ?> Tarihli Ders Programınız</strong>
                            </div>

                            <div class="card-body">


                                @foreach($programlar as $program)
                                    @foreach($saatler as $saat)
                                        @foreach($konular as $konu)
                                            @foreach($siniflar as $sinif)
                                                @if($program['tarih'] == date("Y-m-d") && $program['saatId'] == $saat['id'] && $program['sinifId'] == $sinif['id'] && $program['konuId'] == $konu['id'])
                                                    <button type="button" class="btn light btn-info">
                                                        {{$sinif['isim']}} &nbsp; {{$konu['isim']}} <br> {{$saat['isim']}} </button>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-xxl-12 col-lg-12">

                    <div class="card">

                        <div class="alert alert-info alert-dismissible fade show">
                            <li class="flaticon-381-notepad-1"> Duyuru Panosu</li>
                        </div>

                        <div class="card-body">
                            <div id="DZ_W_TimeLine" class="widget-timeline dz-scroll height370">

                                <ul class="timeline">

                                    @foreach($duyurular as $duyuru)
                                        @foreach($siniflar as $sinif)
                                            @foreach(json_decode($duyuru['sinifId']) as $duyurusinif)
                                                @foreach(json_decode($duyuru['grup']) as $duyurugrup)
                                                    @php($control[0] = 0)
                                                    @if($sinif['id'] == $duyurusinif && $duyurugrup == 3 && !in_array($duyuru['id'], $control))
                                                        <li> <div class="timeline-badge primary"></div>
                                                            <a class="timeline-panel text-muted">
                                                                <span>{{$duyuru['baslik']}}</span>
                                                                <h6 class="mb-0">{{$duyuru['duyuru']}}</h6>
                                                            </a>
                                                        </li>
                                                        @php($control[] = $duyuru['id'])
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-xxl-6 col-lg-6">
                    <div class="card">

                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="flaticon-381-success-2">
                                <strong><?php echo date("d-m-Y"); ?> Tarihli</strong> Yemek Menüsü</i>
                        </div>

                        <div class="card-body">
                            <div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1 height370">
                                <ul class="timeline">
                                    <li> <div class="timeline-badge primary"></div>
                                        <a class="timeline-panel text-muted">
                                            <span>Kahvaltı</span>
                                            @if(isset($yemekmenu))
                                                <h7 class="mb-0">{{$yemekmenu['kahvalti']}}</h7>
                                            @endif
                                        </a>
                                    </li>

                                    <li> <div class="timeline-badge info"></div>
                                        <a class="timeline-panel text-muted">
                                            <span>Öğle Yemeği</span>
                                            @if(isset($yemekmenu))
                                                <h7 class="mb-0">{{$yemekmenu['ogleyemek']}}</h7>
                                            @endif
                                        </a>
                                    </li>


                                    <li> <div class="timeline-badge danger"></div>
                                        <a class="timeline-panel text-muted">
                                            <span>Ara Öğün</span>
                                            @if(isset($yemekmenu))
                                                <h7 class="mb-0">{{$yemekmenu['araogun']}}</h7>
                                            @endif
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-xxl-6 col-lg-6">
                    <div class="card">
                        <div class="alert alert-secondary alert-dismissible fade show">
                            <li class="flaticon-381-send-2"> Gelen Ödevler</li>
                        </div>

                        <div class="card-body">

                            <div id="DZ_W_TimeLine" class="widget-timeline dz-scroll height370">
                                <ul class="timeline">

                                        @foreach($ogrenciler as $ogrenci)
                                            @if($ogrenci['sinifId'] == $ogretmen['sinifId'])
                                                @foreach($gelenodevler as $gelenodev)
                                                    @if($ogrenci['id'] == $gelenodev['ogrenci'])
                                                        <li>
                                                            <div class="timeline-badge primary"></div>
                                                            <a class="timeline-panel text-muted" href="#">
                                                                <span>Öğrenci: {{$ogrenci['isim']}}</span>
                                                                <h6 class="mb-0">{{$gelenodev['detay']}}</h6>
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach

                                </ul>
                            </div>
                        </div>

                        </ul>

                    </div>
                </div>

                @if(isset($sliderlar) && !empty($sliderlar))
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body p-4">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"> </li>

                                    </ol>

                                    <div class="carousel-inner">

                                        @foreach($sliderlar as $key => $slider)
                                            @php($selected = ($key == 0) ? 'active' : '')
                                            <div class="carousel-item {{$selected}}">
                                                <a target="_blank" href="{{$slider['link']}}">
                                                    <img class="d-block w-100" src="{{asset("/")}}assets/upload/slider/{{$slider['resim']}}"></a>
                                            </div>
                                        @endforeach

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




            </div>
        </div>
    </div>
    </div>

@endsection
