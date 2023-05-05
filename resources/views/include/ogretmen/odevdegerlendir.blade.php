@extends('layout.ogretmen')
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
                                    <h6 class="mt-1 mb-2">Ödev Değerlendirme Sayfası</h6>
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
                                    @if(session('error'))
                                        <div class="alert alert-danger d-flex align-items-center mb-5">
                                            <div class="d-flex flex-column">
                                                <h4 class="mb-1 text-dark">Ödev Değerlendirme Başarısız</h4>
                                                <span>{{session('error')}}</span>
                                            </div>
                                        </div>
                                    @endif
                                    @if(session('success'))
                                        <div class="alert alert-success d-flex align-items-center mb-5">
                                            <div class="d-flex flex-column">
                                                <h4 class="mb-1 text-dark">Ödev Değerlendirme Başarılı</h4>
                                                <span>{{session('success')}}</span>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <form action="{{route('odevdegerlendir')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                        <table class="table header-border table-responsive-sm">
                                            <thead>

                                            <tr>
                                                <th>ÖĞRENCİ ADI SOYADI </th>
                                                <th></th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                                @foreach($ogrenciler as $ogrenci)
                                                    @foreach($siniflar as $sinif)
                                                        @if($ogrenci['sinifId'] == $sinif['id'])
                                                            @foreach(json_decode($ogretmen['sinif']) as $ogretmeninsinifi)
                                                                @if($ogrenci['sinifId'] == $ogretmeninsinifi)
                                                                    @if(isset($odevcontrol) && !empty($odevcontrol))
                                                                        @foreach($odevnot as $odevnotu)
                                                                            @if($odevnotu['ogrenci'] == $ogrenci['id'])
                                                                                <tr>
                                                                                    <td>{{$ogrenci['isim']}}</td>
                                                                                    <input type="hidden" name="ogrenci[]" value="{{$ogrenci['id']}}">
                                                                                    <input type="hidden" name="kurum" value="{{$ogrenci['kurum']}}">
                                                                                    <input type="hidden" name="odev" value="{{$odev['id']}}">
                                                                                    <td>
                                                                                        <div class="form-group">
                                                                                            <select name="odevdurum[]" class="form-control">
                                                                                                <option {{$selveted = ($odevnotu['durum'] == 0) ? 'selected' : '' }}  value="0">Seçim Yapılamdı</option>
                                                                                                <option {{$selveted = ($odevnotu['durum'] == 1) ? 'selected' : '' }}  value="1">Yaptı</option>
                                                                                                <option {{$selveted = ($odevnotu['durum'] == 2) ? 'selected' : '' }}  value="2">Eksik</option>
                                                                                                <option {{$selveted = ($odevnotu['durum'] == 3) ? 'selected' : '' }}  value="3">Yapmadı</option>
                                                                                                <option {{$selveted = ($odevnotu['durum'] == 4) ? 'selected' : '' }}  value="4">Geç Getirdi</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td>{{$ogrenci['isim']}}</td>
                                                                            <input type="hidden" name="ogrenci[]" value="{{$ogrenci['id']}}">
                                                                            <input type="hidden" name="kurum" value="{{$ogrenci['kurum']}}">
                                                                            <input type="hidden" name="odev" value="{{$odev['id']}}">
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="odevdurum[]" class="form-control">
                                                                                        <option  value="0">Seçim Yapılamdı</option>
                                                                                        <option  value="1">Yaptı</option>
                                                                                        <option  value="2">Eksik</option>
                                                                                        <option  value="3">Yapmadı</option>
                                                                                        <option  value="4">Geç Getirdi</option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endforeach


                                            </tbody>
                                        </table>
                                            <hr>

                                            <button name="OdevTeslim" class="btn btn-danger">Ödevi Güncelle</button>
                                        </form>



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
