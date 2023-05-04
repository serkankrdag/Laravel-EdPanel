@extends('layout.yonetici')
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
                                    <th>Sınıf</th>
                                    <th>İşlem</th>

                                </tr>
                                </thead>

                                <tbody>

                                @foreach($dersprogramlari as $program)
                                    <tr>
                                        <td>{{$program['tarih']}}</td>
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
                                        @foreach($siniflar as $sinif)
                                            @if($sinif['id'] == $program['sinifId'])
                                                <td>{{$sinif['isim']}}</td>
                                            @endif
                                        @endforeach
                                        <td>
                                            <a href="yoklamaalyonetici?id={{$program['id']}}&sinif={{$program['sinifId']}}">
                                                <font title="Yoklama Düzenle">
                                                    <button type="button" class="btn btn-primary"> <i class="flaticon-381-edit-1"></i> </button></font></a>
                                        </td>
                                    </tr>
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
