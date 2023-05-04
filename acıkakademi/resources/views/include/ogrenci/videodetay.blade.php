@extends('layout.ogrenci')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row">



                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-xl-4">
                                <p class="img-fluid mb-3 w-100">
                                    <video width="360" height="320" controls="controls">
                                        <source src="assets/upload/video/{{$video['video']}}" type="video/mp4" />
                                        <source src="assets/upload/video/{{$video['video']}}" type="video/ogg" />
                                        Tarayıcınız video etiketini desteklemiyor.
                                    </video>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#genelbakis">
                                            Eğitim Detayları</a> </li>

                                </ul>


                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="genelbakis" role="tabpanel">
                                        <div class="pt-4">
                                            <h4>{{$video['baslik']}}</h4>
                                            <p>{{$video['detay']}}</p>

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

    </div>



    </div>

@endsection
