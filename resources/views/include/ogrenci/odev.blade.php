@extends('layout.ogrenci')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="alert alert-primary left-icon-big alert-dismissible fade show">



                        <div class="media">
                            <div class="alert-left-icon-big">

                                <a ><span><i class="flaticon-381-add-2"></i></span></a>

                            </div>


                            <div class="media-body">
                                <h6 class="mt-1 mb-2">Ödev Takip Sistemi</h6>
                                <p class="mb-0">Ödev takibini bu sayfamızdan yapabilir ve kontrollerinizi gerçekleştirebilirsiniz.</p>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($odevler as $odev)
                    @foreach($siniflar as $sinif)
                        @if($sinif['id'] == $odev['sinif'])
                            @if($odev['sinif'] == $ogrenci['sinifId'])
                                <div class="col-xl-3 col-xxl-4 col-sm-6">
                                    <div class="card user-card">
                                        <div class="card-body pb-0">
                                            <div class="d-flex mb-3 align-items-center">


                                                <div>
                                                    <h5 class="title">{{$odev['baslik']}}</h5>
                                                    @foreach($ogretmenler as $ogretmen)
                                                        @if($odev['ogretmen'] == $ogretmen['id'])
                                                            <span class="text-primary">{{$ogretmen['isim']}}</span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>

                                            <p class="fs-12">{{$odev['aciklama']}}</p>
                                            <ul class="list-group list-group-flush">

                                                <li class="list-group-item">
                                                    <span class="mb-0 title">Durumu</span> :
                                                    @if(date('Y-m-d') > $odev['bitistarih'])
                                                        <span class="text-black ml-2">Süresi Doldu</span>
                                                    @else
                                                        <span class="text-black ml-2">Bekleniyor</span>
                                                    @endif

                                                </li>
                                                <li class="list-group-item">

                                                    <span class="mb-0 title">Bitiş Tarihi</span> :
                                                    <span class="text-black ml-2">{{$odev['bitistarih']}}</span>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="card-footer">

                                            <center>


                                                <form action="{{route('odevdosyaindir')}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn mb-3 btn-danger">Dosyayı İndir</button>
                                                    <input type="hidden" name="id" value="{{$odev['id']}}">

                                                <a href="odevgonderogrenci?id={{$odev['id']}}">
                                                    <button type="button" class="btn mb-3 btn-info">Ödevi Gönder</button></a></form>

                                                <a href="#"><button type="button" class="btn btn-primary"><i class="fa fa-telegram"></i>
                                                        Son Tarih : {{$odev['bitistarih']}}
                                                    </button>
                                                </a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @endforeach


        </div>
    </div>

@endsection
