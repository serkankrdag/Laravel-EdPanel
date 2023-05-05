@extends('layout.ogretmen')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="alert alert-primary left-icon-big alert-dismissible fade show">



                        <div class="media">
                            <div class="alert-left-icon-big">

                                <a href="odevekleogretmen"><span><i class="flaticon-381-add-2"></i></span></a>

                            </div>


                            <div class="media-body">
                                <h6 class="mt-1 mb-2">Ödev Takip Sistemi</h6>
                                <p class="mb-0">Ödev takibini bu sayfamızdan yapabilir ve kontrollerinizi gerçekleştirebilirsiniz.</p>
                            </div>
                        </div>
                    </div>
                </div>


                @foreach($odevler as $odev)
                <div class="col-xl-3 col-xxl-4 col-sm-6">
                    <div class="card user-card">
                        <div class="card-body pb-0">
                            <div class="d-flex mb-3 align-items-center">

                                <div>
                                    <h5 class="title">{{$odev['baslik']}}<br>
                                        @foreach($siniflar as $sinif)
                                            @if($sinif['id'] == $odev['sinif'])
                                                <span class="text-primary">{{$sinif['isim']}}</span>
                                            @endif
                                        @endforeach
                                </div>
                            </div>

                            <p class="fs-12">{{$odev['aciklama']}}</p>
                            <ul class="list-group list-group-flush">

                                <li class="list-group-item">
                                    <span class="mb-0 title">Bitiş Tarihi</span> :
                                    <span class="text-black ml-2">{{$odev['bitistarih']}}</span>
                                </li>

                            </ul>
                        </div>
                        <div class="card-footer">

                            <center>
                                <a href="gelenodevogretmen">
                                    <font title="Gelen Ödevler">
                                        <button type="button" class="btn btn-info"> <i class="flaticon-381-edit"></i></button></font></a>

                                <a href="odevdegerlendirogretmen?id={{$odev['sinif']}}&odev={{$odev['id']}}">
                                    <font title="Ödevi Değerlendir">
                                        <button type="button" class="btn btn-success"> <i class="flaticon-381-enter"></i> </button></font></a>

                                <a href="odevduzenleogretmen?id={{$odev['id']}}">
                                    <font title="Ödevi Düzenle">
                                        <button type="button" class="btn btn-primary"> <i class="flaticon-381-edit-1"></i> </button></font></a>

                                <font title="Ödevi Sil">
                                    <a href="odevsil?id={{$odev['id']}}">
                                        <button type="button" class="btn btn-danger"> <i class="flaticon-381-trash-1"></i> </button></font></a>
                            </center>

                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            <nav>

            </nav>
        </div>
    </div>

@endsection
