@extends('layout.ogretmen')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="alert alert-primary left-icon-big alert-dismissible fade show">

                        <div class="media">
                            <div class="alert-left-icon-big">
                                <span><i class="mdi mdi-check-circle-outline"></i></span>
                            </div>

                            <div class="media-body">
                                <h6 class="mt-1 mb-2">Ders Programı</h6>
                                <p class="mb-0">Haftalık Ders Programınızı görüntüleyebilirsiniz.</p>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">


                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" style="min-width: 480px;">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                @foreach($saatler as $key => $saat)
                                                    <th class="text-center text-dark">{{$saat['isim']}}<br>
                                                        <small class="text-muted"><{{$saat['baslangic']}} - {{$saat['bitis']}}></small>
                                                    </th>
                                                @endforeach
                                            </tr>
                                            </thead>

                                            <tbody>


                                               @foreach($gunler as $gun)
                                                   <tr>
                                                    <th class="text-nowrap text-dark" scope="row">{{$gun['GunAdi']}}</th>
                                                    @foreach($dersprogramlari as $program)
                                                            @foreach($saatler as $saat)
                                                                @foreach($konular as $konu)
                                                                    @foreach($siniflar as $sinif)
                                                                        @if($program['konuId']==$konu['id'] && $program['sinifId']==$sinif['id'] && $program['GunId']==$gun['id'])
                                                                            @if($program['saatId']==$saat['id'])
                                                                               <td><center>{{$konu['isim']}}<br>{{$sinif['isim']}}<br>{{$saat['isim']}}</center></td>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            @endforeach
                                                    @endforeach
                                                   </tr>
                                               @endforeach





                                        <!--    <tr>
                                                <th class="text-nowrap text-dark" scope="row">Salı</th>
                                                @foreach($dersprogramlari as $program)
                                                    @if($program['gun'] == 1)
                                                        @foreach($saatler as $saat)
                                                            @foreach($konular as $konu)
                                                                @foreach($siniflar as $sinif)
                                                                    @if($program['saatId']==$saat['id'] && $program['konuId']==$konu['id'] && $program['sinifId']==$sinif['id'])
                                                                        <td><center>{{$konu['isim']}}<br>{{$sinif['isim']}}<br>{{$saat['isim']}}</center></td>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </tr>


                                            </tr>

                                            <tr>

                                                <th class="text-nowrap text-dark" scope="row">Çarşamba</th>
                                                @foreach($dersprogramlari as $program)
                                                    @if($program['gun'] == 2)
                                                        @foreach($saatler as $saat)
                                                            @foreach($konular as $konu)
                                                                @foreach($siniflar as $sinif)
                                                                    @if($program['saatId']==$saat['id'] && $program['konuId']==$konu['id'] && $program['sinifId']==$sinif['id'])
                                                                        <td><center>{{$konu['isim']}}<br>{{$sinif['isim']}}<br>{{$saat['isim']}}</center></td>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </tr>

                                            <tr>
                                                <th class="text-nowrap text-dark" scope="row">Perşembe</th>
                                                @foreach($dersprogramlari as $program)
                                                    @if($program['gun'] == 3)
                                                        @foreach($saatler as $saat)
                                                            @foreach($konular as $konu)
                                                                @foreach($siniflar as $sinif)
                                                                    @if($program['saatId']==$saat['id'] && $program['konuId']==$konu['id'] && $program['sinifId']==$sinif['id'])
                                                                        <td><center>{{$konu['isim']}}<br>{{$sinif['isim']}}<br>{{$saat['isim']}}</center></td>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </tr>

                                            <tr>
                                                <th class="text-nowrap text-dark" scope="row">Cuma</th>
                                                @foreach($dersprogramlari as $program)
                                                    @if($program['gun'] == 4)
                                                        @foreach($saatler as $saat)
                                                            @foreach($konular as $konu)
                                                                @foreach($siniflar as $sinif)
                                                                    @if($program['saatId']==$saat['id'] && $program['konuId']==$konu['id'] && $program['sinifId']==$sinif['id'])
                                                                        <td><center>{{$konu['isim']}}<br>{{$sinif['isim']}}<br>{{$saat['isim']}}</center></td>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </tr>


                                            <tr>
                                                <th class="text-nowrap text-dark" scope="row">Cumartesi</th>
                                                @foreach($dersprogramlari as $program)
                                                    @if($program['gun'] == 5)
                                                        @foreach($saatler as $saat)
                                                            @foreach($konular as $konu)
                                                                @foreach($siniflar as $sinif)
                                                                    @if($program['saatId']==$saat['id'] && $program['konuId']==$konu['id'] && $program['sinifId']==$sinif['id'])
                                                                        <td><center>{{$konu['isim']}}<br>{{$sinif['isim']}}<br>{{$saat['isim']}}</center></td>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </tr>


                                            <tr>
                                                <th class="text-nowrap text-dark" scope="row">Pazar</th>
                                                @foreach($dersprogramlari as $program)
                                                    @if($program['gun'] == 6)
                                                        @foreach($saatler as $saat)
                                                            @foreach($konular as $konu)
                                                                @foreach($siniflar as $sinif)
                                                                    @if($program['saatId']==$saat['id'] && $program['konuId']==$konu['id'] && $program['sinifId']==$sinif['id'])
                                                                        <td><center>{{$konu['isim']}}<br>{{$sinif['isim']}}<br>{{$saat['isim']}}</center></td>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </tr> -->


                                            </tbody>
                                        </table>
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
