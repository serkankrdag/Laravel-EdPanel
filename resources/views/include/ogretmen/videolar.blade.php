@extends('layout.ogretmen')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="alert alert-danger left-icon-big alert-dismissible fade show">



                        <div class="media">
                            <div class="alert-left-icon-big">
                                <span><i class="flaticon-381-add-2"></i></span>
                            </div>

                            <div class="media-body">
                                <h6 class="mt-1 mb-2">Ters Düz Eğitim</h6>
                                <p class="mb-0">Online eğitim videolarımızı bu sayfamızdan takip edebilirsiniz. Aşağıdan <b>"KONU"</b> seçerek sadece o konuya ait eğitimleri görüntüleyebilirsiniz. </p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <select class="form-control default-select form-control-lg">
                            <option>Tüm Konular</option>
                            <option>Coğrafya</option>
                            <option>Matematik</option>
                            <option>Edebiyat</option>
                        </select>
                    </div>


                </div>



                @foreach($videolar as $video)
                    <div class="col-xl-4 col-lg-12">
                        <div class="card project-card">
                            <div class="card-body">
                                <div class="d-flex mb-4 align-items-start">
                                    <div class="dz-media mr-3">
                                        <a href="videodetayogretmen?id={{$video['id']}}" class="text-black">
                                            <img src="assets/upload/video/{{$video['resim']}}" class="img-fluid"></a>
                                    </div>
                                    <div class="mr-auto">

                                        <h5 class="title font-w600 mb-2">
                                            <a href="videodetayogretmen?id={{$video['id']}}" class="text-black">
                                                {{$video['baslik']}}</a></h5>
                                    </div>
                                    <span class="badge badge-success d-sm-inline-block d-none">
                                    @foreach($konular as $konu)
                                        @foreach(json_decode($video['konuId']) as $videokonu)
                                            @if($konu['id'] == $videokonu)
                                                {{$konu['isim']}}
                                            @endif
                                        @endforeach
                                    @endforeach
                                    </span> </div>

                                <p class="mb-4">{{$video['detay']}}</p>

                                <div class="row mb-4">
                                    <div class="col-sm-6 mb-sm-0 mb-3 d-flex">
                                        <div class="dt-icon bgl-info mr-3">

                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19 5H18V3C18 2.73478 17.8946 2.48043 17.7071 2.29289C17.5196 2.10536 17.2652 2 17 2C16.7348 2 16.4804 2.10536 16.2929 2.29289C16.1054 2.48043 16 2.73478 16 3V5H8V3C8 2.73478 7.89464 2.48043 7.70711 2.29289C7.51957 2.10536 7.26522 2 7 2C6.73478 2 6.48043 2.10536 6.29289 2.29289C6.10536 2.48043 6 2.73478 6 3V5H5C4.20435 5 3.44129 5.31607 2.87868 5.87868C2.31607 6.44129 2 7.20435 2 8V9H22V8C22 7.20435 21.6839 6.44129 21.1213 5.87868C20.5587 5.31607 19.7957 5 19 5Z" fill="#92caff"/>
                                                <path d="M2 19C2 19.7956 2.31607 20.5587 2.87868 21.1213C3.44129 21.6839 4.20435 22 5 22H19C19.7957 22 20.5587 21.6839 21.1213 21.1213C21.6839 20.5587 22 19.7956 22 19V11H2V19Z" fill="#51A6F5"/>
                                            </svg>
                                        </div>

                                        <div>

                                            <span>Eklenme Tarihi</span>
                                            <p class="mb-0 pt-1 font-w500 text-black">{{$video['created_at']}}</p>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 d-flex">
                                        <div class="dt-icon mr-3 bgl-danger">
                                            <svg width="19" height="24" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.6601 8.6858C18.5437 8.44064 18.2965 8.28427 18.025 8.28427H10.9728L15.2413 1.06083C15.3697 0.843469 15.3718 0.573844 15.2466 0.354609C15.1214 0.135375 14.8884 -9.37014e-05 14.6359 4.86277e-08L8.61084 0.000656299C8.3608 0.000750049 8.12957 0.1335 8.00362 0.349453L0.0958048 13.905C-0.0310859 14.1224 -0.0319764 14.3911 0.0934142 14.6094C0.218805 14.8277 0.451352 14.9624 0.703117 14.9624H7.71037L5.66943 23.1263C5.58955 23.4457 5.74213 23.7779 6.03651 23.9255C6.13691 23.9757 6.24459 24 6.35123 24C6.55729 24 6.75923 23.9094 6.89638 23.7413L18.5699 9.43186C18.7415 9.22148 18.7766 8.93105 18.6601 8.6858V8.6858Z" fill="#FF4C41"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <span>Ders Süresi</span>
                                            <p class="mb-0 pt-1 font-w500 text-black">{{$video['videosure']}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h6>İlerleme
                                            <span class="pull-right">15%</span>
                                        </h6>

                                        <div class="progress ">
                                            <div class="progress-bar bg-info progress-animated" style="width: 15%; height:6px;" role="progressbar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach




            </div>


            <nav class="mt-5">

                <ul class="pagination pagination-gutter pagination-primary no-bg">
                    <li class="page-item page-indicator">
                        <a class="page-link" href="javascript:void(0)">
                            <i class="la la-angle-left"></i></a></li>

                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>

                    <li class="page-item page-indicator">
                        <a class="page-link" href="javascript:void(0)">
                            <i class="la la-angle-right"></i></a>
                    </li>
                </ul>

            </nav>





        </div>
    </div>

@endsection
