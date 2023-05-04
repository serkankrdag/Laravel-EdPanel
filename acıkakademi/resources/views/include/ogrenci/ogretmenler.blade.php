@extends('layout.ogrenci')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="alert alert-info left-icon-big alert-dismissible fade show">

                        <div class="media">
                            <div class="alert-left-icon-big">
                                <span><i class="mdi mdi-check-circle-outline"></i></span>
                            </div>

                            <div class="media-body">
                                <h6 class="mt-1 mb-2">Öğretmenler</h6>
                                <p class="mb-0">Öğretmenlerinizi görüntüleyebilir, Mesaj gönderebilir veya Telefon iconuna tıklayarak Telefonu kayıtlı Öğretmenleri arayabilirsiniz.</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navpills-1" >
                            <div class="row dz-scroll  loadmore-content searchable-items list" id="allContactListContent">
                                <div class="items items-header-section">
                                </div>

                                @foreach($ogretmenler as $ogretmen)
                                    @foreach(json_decode($ogretmen['sinif']) as $ogretmensinif)
                                        @foreach($siniflar as $sinif)
                                            @if($ogretmensinif == $sinif['id'])
                                                @if($ogretmensinif == $sinifim)
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
                                                                    <h6 class="fs-20 font-w500 my-1"><a href="app-profile.html" class="text-black user-name" data-name="Alan Green">
                                                                        {{$ogretmen['isim']}}</a></h6>
                                                                    <p class="fs-14 mb-3 user-work" data-occupation="UI Designer">{{$sinif['isim']}}</p>
                                                                    <ul>


                                                                        <font title="Telefon ile Ara">
                                                                            <li><a href="tel:">
                                                                                    <i class="fa fa-phone" aria-hidden="true"></i></a></li></font>


                                                                        <font title="Mesaj Gönder">
                                                                            <li><a href="mesaj.php">
                                                                                    <i class="las la-sms"></i></a></li></font>

                                                                        <font title="Yakında Aktif Edilecek">
                                                                            <li><a href="#"><i class="fa fa-video-camera" aria-hidden="true"></i></a></li></font>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endforeach



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
