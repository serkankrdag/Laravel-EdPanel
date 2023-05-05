@extends('layout.ogretmen')
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <button type="button" class="btn btn-danger" onclick="history.back();">GERİ DÖN</button>
            <br><br>
            <div class="card">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="alert alert-success left-icon-big alert-dismissible fade show">



                            <div class="media">
                                <div class="alert-left-icon-big">
                                    <span><i class="mdi mdi-check-circle-outline"></i></span>
                                </div>

                                <div class="media-body">
                                    <h6 class="mt-1 mb-2">Gelen Ödev Takip Sistemi</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">

                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-header">
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table header-border table-responsive-sm">
                                            <thead>

                                            <tr>
                                                <th>ÖĞRENCİ ADI SOYADI </th>
                                                <th>Açıklama </th>
                                                <th>Dosya</th>
                                            </tr>
                                            </thead>

                                            <tbody>


                                            @foreach($odevler as $odev)
                                                @foreach($ogrenciler as $ogrenci)
                                                    @if($odev['ogrenci'] == $ogrenci['id'])
                                                        @foreach($siniflar as $sinif)
                                                            @if($ogrenci['sinifId'] == $sinif['id'])
                                                                @foreach(json_decode($ogretmen['sinif']) as $ogretmeninsinifi)
                                                                    @if($ogrenci['sinifId'] == $ogretmeninsinifi)
                                                                        <tr>
                                                                            <td>{{$ogrenci['isim']}}</td>
                                                                            <td>{{$odev['detay']}}</td>
                                                                            @if(isset($odev['odevfile']) && !empty($odev['odevfile']))
                                                                                <td>
                                                                                    <form action="{{route('odevdosyaindirogretmen')}}" method="post">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$odev['id']}}">
                                                                                        <button type="submit" class="btn mb-3 btn-info">Dosyayı İndir</button>
                                                                                    </form>
                                                                                </td>
                                                                            @else
                                                                                <td></td>
                                                                            @endif
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
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
            </div>
        </div>
    </div>
    </div>

@endsection
