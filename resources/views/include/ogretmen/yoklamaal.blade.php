@php
    use App\Models\Yoklama;
@endphp

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
                                    <h6 class="mt-1 mb-2">Yoklama Takip Sistemi</h6>
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
                                                <h4 class="mb-1 text-dark">Ekleme Başarısız</h4>
                                                <span>{{session('error')}}</span>
                                            </div>
                                        </div>
                                    @endif
                                    @if(session('success'))
                                        <div class="alert alert-success d-flex align-items-center mb-5">
                                            <div class="d-flex flex-column">
                                                <h4 class="mb-1 text-dark">Ekleme Başarılı</h4>
                                                <span>{{session('success')}}</span>
                                            </div>
                                        </div>
                                    @endif
                                    <form action="{{route('yoklamaduzenle')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="table-responsive">

                                            <table class="table header-border table-responsive-sm">
                                                <thead>

                                                <tr>
                                                    <th>ÖĞRENCİ ADI SOYADI </th>
                                                    <th></th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($ogrenciler as $key => $ogrenci)
                                                    @foreach($siniflar as $sinif)

                                                        @if($ogrenci['sinifId'] == $sinif['id'])
                                                            <tr>
                                                                <td>{{$ogrenci['isim']}}</td>
                                                                <input type="hidden" name="ogrenci[]" value="{{$ogrenci['id']}}">

                                                                @php
                                                                    $yoklama = Yoklama::where('programId',$_GET['id'])->where('ogrenciId',$ogrenci['id'])->first();
                                                                @endphp

                                                                <td>
                                                                    <div class="form-group">

                                                                        @if(isset($yoklama['yoklama']) && !empty($yoklama['yoklama']))
                                                                            <select name="yoklama[]" class="form-control">
                                                                                <option {{$select = ($yoklama['yoklama'] == 1) ? 'selected' : ''}} value="1">Geldi</option>
                                                                                <option {{$select = ($yoklama['yoklama'] == 2) ? 'selected' : ''}} value="2">Gelmedi</option>
                                                                                <option {{$select = ($yoklama['yoklama'] == 3) ? 'selected' : ''}} value="3">Geç Geldi</option>
                                                                                <option {{$select = ($yoklama['yoklama'] == 4) ? 'selected' : ''}} value="4">Nöbetçi</option>
                                                                                <option {{$select = ($yoklama['yoklama'] == 5) ? 'selected' : ''}} value="5">Raporlu</option>
                                                                                <option {{$select = ($yoklama['yoklama'] == 6) ? 'selected' : ''}} value="6">İzinli</option>
                                                                            </select>
                                                                        @else
                                                                            <select name="yoklama[]" class="form-control">
                                                                                <option  value="0">Seçim Yapılmadı</option>
                                                                                <option  value="1">Geldi</option>
                                                                                <option  value="2">Gelmedi</option>
                                                                                <option  value="3">Geç Geldi</option>
                                                                                <option  value="4">Nöbetçi</option>
                                                                                <option  value="5">Raporlu</option>
                                                                                <option  value="6">İzinli</option>
                                                                            </select>
                                                                        @endif



                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        @endif

                                                    @endforeach
                                                @endforeach

                                                </tbody>

                                            </table>

                                            <input type="hidden" name="program" value="{{$dersprogram['id']}}">

                                            <button type="submit" class="btn btn-danger" name="YoklamaKaydet">YOKLAMAYI KAYDET</button>
                                        </div>
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

@endsection
