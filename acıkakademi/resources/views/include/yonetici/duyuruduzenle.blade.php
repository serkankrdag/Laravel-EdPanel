@extends('layout.yonetici')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session('error'))
                                <div class="alert alert-danger d-flex align-items-center mb-5">
                                    <div class="d-flex flex-column">
                                        <h4 class="mb-1 text-dark">Düzenle Başarısız</h4>
                                        <span>{{session('error')}}</span>
                                    </div>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success d-flex align-items-center mb-5">
                                    <div class="d-flex flex-column">
                                        <h4 class="mb-1 text-dark">Düzenle Başarılı</h4>
                                        <span>{{session('success')}}</span>
                                    </div>
                                </div>
                            @endif
                            <h4 class="card-title">Duyuru Düzenle</h4>
                            <hr>


                            <form action="{{route('duyuruyuduzenle')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Başlık</label>

                                    <input class="form-control" type="text" name="baslik" value="{{$duyuru['baslik']}}">
                                </div>

                                <div class="form-group">
                                    <label>Duyuru</label>
                                    <textarea name="duyuru" class="form-control" rows="5">{{$duyuru['duyuru']}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Sınıf Seç (Çoklu seçim yapabilirsiniz)</label>

                                    <select name="sinif[]" multiple class="form-control default-select" id="sel2">
                                        <option value="">Seçim Yapılmadı</option>
                                        @foreach($siniflar as $key => $sinif)
                                            <option value="{{$sinif['id']}}">{{$sinif['isim']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kullanıcı Grubu Seç</label>

                                    <select name="grup[]" multiple class="form-control default-select" id="sel2">
                                        <option value="">Seçim Yapılmadı</option>
                                        @php($ogrenci='')
                                        @php($ogretmen='')
                                        @php($veli='')
                                        @foreach(json_decode($duyuru['grup']) as $duyurugrup)
                                            @if($duyurugrup == 4)
                                                @php($ogrenci = 'selected')
                                            @endif
                                            @if($duyurugrup == 3)
                                                @php($ogretmen = 'selected')
                                            @endif
                                            @if($duyurugrup == 5)
                                                @php($veli = 'selected')
                                            @endif
                                        @endforeach
                                        <option {{$ogrenci}} value="4">Öğrenciler</option>
                                        <option {{$ogretmen}} value="3">Öğretmenler</option>
                                        <option {{$veli}} value="5">Veliler</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Durum</label>

                                    <select name="durum" class="form-control default-select" id="sel2">

                                        <option {{$aktif = ($duyuru['durum'] == 1) ? 'selected' : ''}} value="1">Aktif</option>
                                        <option {{$pasif = ($duyuru['durum'] == 0) ? 'selected' : ''}} value="0">Pasif</option>

                                    </select>
                                </div>

                                <input type="hidden" name="id" value="{{$duyuru['id']}}">

                                <button type="submit" class="btn btn-danger" name="OdevEkle">Kayıt Et</button>
                                <a href="home" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
