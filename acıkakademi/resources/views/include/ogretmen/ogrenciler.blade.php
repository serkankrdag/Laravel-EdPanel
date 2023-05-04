@extends('layout.ogretmen')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="tab-content">
                <div class="tab-pane fade show active" id="navpills-1" >
                    <div class="row dz-scroll  loadmore-content searchable-items list" id="allContactListContent">
                        <div class="items items-header-section">
                        </div>

                        @foreach($ogrenciler as $ogrenci)
                            @foreach(json_decode($ogretmen['sinif']) as $sinif)
                                @if($ogrenci['sinifId'] == $sinif)

                                    <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
                                        <div class="card contact-bx item-content">
                                            <div class="card-header border-0">
                                                <div class="action-dropdown">
                                                </div>
                                            </div>
                                            <div class="card-body user-profile">
                                                <div class="image-bx">

                                                    <img src="assets/images/user.png" class="rounded-circle">

                                                </div>

                                                <div class="media-body user-meta-info">
                                                    <h6 class="fs-20 font-w500 my-1">
                                                        {{$ogrenci['isim']}}</h6>
                                                    @foreach($siniflar as $sinifim)
                                                        @if($ogrenci['sinifId'] == $sinifim['id'])
                                                            <p class="fs-14 mb-3 user-work" data-occupation="UI Designer">{{$sinifim['isim']}}</p>
                                                        @endif
                                                    @endforeach
                                                    <ul>


                                                        <font title="Telefon ile Ara">
                                                            <li><a href="tel:5425333383">
                                                                    <i class="fa fa-phone" aria-hidden="true"></i></a></li></font>


                                                        <font title="Mesaj Gönder">
                                                            <li><a href="mesaj.php">
                                                                    <i class="las la-sms"></i></a></li></font>

                                                    </ul>
                                                </div>
                                            </div>
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

@endsection
