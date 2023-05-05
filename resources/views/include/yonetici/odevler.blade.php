@extends('layout.yonetici')
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-sm-flex d-block">
                    <div class="mr-auto mb-sm-0 mb-3">
                        <h4 class="card-title mb-2">Ödev Takip</h4>
                        <span>Kurumunuz tarafından Öğretmenlerin öğrencilere verdiği ödevleri görüntüleyebilirsiniz.</span>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table style-1" id="ListDatatableView">
                            <thead>
                            <tr>
                                <th>İD</th>
                                <th>ÖĞRETMEN</th>
                                <th>SINIF</th>
                                <th>BİTİŞ TARİHİ</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($odevler as $odev)
                                <tr>
                                    <td> {{$odev['id']}} </td>
                                    @foreach($ogretmenler as $ogretmen)
                                        @if($odev['ogretmen'] == $ogretmen['id'])
                                            <td> {{$ogretmen['isim']}} </td>
                                        @endif
                                    @endforeach
                                    @foreach($siniflar as $sinif)
                                        @foreach(json_decode($odev['sinif']) as $sinifim)
                                            @if($sinif['id'] == $sinifim)
                                                <td> {{$sinif['isim']}} </td>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    <td> {{$odev['created_at']}} </td>


                                </tr>
                            @endforeach







                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
