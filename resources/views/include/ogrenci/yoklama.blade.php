@extends('layout.ogrenci')
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="alert alert-success left-icon-big alert-dismissible fade show">

                            <div class="media">
                                <div class="alert-left-icon-big">
                                    <span><i class="mdi mdi-check-circle-outline"></i></span>
                                </div>

                                <div class="media-body">
                                    <h6 class="mt-1 mb-2">Yoklama Takip Sistemi</h6>
                                    <p class="mb-0">Yoklamalarınızı bu sayfamızdan görüntüleyebilir ve kontrollerinizi sağlayabilirsiniz.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table style-1" id="ListDatatableView">
                                <thead>
                                <tr>

                                    <th>Ders Tarihi</th>
                                    <th>Ders Saati</th>
                                    <th>Ders Adı</th>
                                    <th>Durum</th>

                                </tr>
                                </thead>

                                <tbody>

                                @foreach($yoklamalar as $yoklama)
                                    @foreach($dersprogramlari as $program)
                                        @if($program['sinifId'] == $ogrenci['sinifId'])
                                            @if($yoklama['programId'] == $program['id'] && $yoklama['ogrenciId'] == $ogrenci['id'])
                                                <tr>
                                                    <td>{{$yoklama['created_at']}}</td>
                                                    @foreach($saatler as $saat)
                                                        @if($saat['id'] == $program['saatId'])
                                                            <td>{{$saat['isim']}}</td>
                                                        @endif
                                                    @endforeach
                                                    @foreach($konular as $konu)
                                                        @if($konu['id'] == $program['konuId'])
                                                            <td>{{$konu['isim']}}</td>
                                                        @endif
                                                    @endforeach
                                                    @if($yoklama['yoklama'] == 1)
                                                        <td>Geldi</td>
                                                    @endif
                                                    @if($yoklama['yoklama'] == 2)
                                                        <td>Gelmedi</td>
                                                    @endif
                                                    @if($yoklama['yoklama'] == 3)
                                                        <td>Geç Geldi</td>
                                                    @endif
                                                    @if($yoklama['yoklama'] == 4)
                                                        <td>Nöbetçi</td>
                                                    @endif
                                                    @if($yoklama['yoklama'] == 5)
                                                        <td>Raporlu</td>
                                                    @endif
                                                    @if($yoklama['yoklama'] == 6)
                                                        <td>İzinli</td>
                                                    @endif
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach





                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
