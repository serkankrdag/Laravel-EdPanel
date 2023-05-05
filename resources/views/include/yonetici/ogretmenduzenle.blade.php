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
                                        <h4 class="mb-1 text-dark">Düzenleme Başarısız</h4>
                                        <span>{{session('error')}}</span>
                                    </div>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success d-flex align-items-center mb-5">
                                    <div class="d-flex flex-column">
                                        <h4 class="mb-1 text-dark">Düzenleme Başarılı</h4>
                                        <span>{{session('success')}}</span>
                                    </div>
                                </div>
                            @endif
                            <h4 class="card-title">Öğretmen Düzenle</h4>
                            <hr>


                            <form action="{{route('ogretmeniduzenle')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Adı Soyadı</label>

                                    <input class="form-control" type="text" name="isim" value="{{$ogretmen['isim']}}">
                                </div>

                                <div class="form-group">
                                    <label>E-Posta</label>

                                    <input class="form-control" type="text" name="eposta" value="{{$ogretmen['eposta']}}">
                                </div>


                                <div class="form-group">
                                    <label>Sınıf Seç (Çoklu seçim yapabilirsiniz)</label>

                                    <select multiple name="sinif[]" class="form-control default-select" id="sel2">
                                        @foreach($siniflar as $key => $sinif)
                                            @foreach(json_decode($ogretmen['sinif']) as $ogretmensinif)
                                                @if($sinif['id']==$ogretmensinif)
                                                    <option selected value="{{$sinif['id']}}">{{$sinif['isim']}}</option>
                                                @endif
                                            @endforeach
                                                <option value="{{$sinif['id']}}">{{$sinif['isim']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Konu Seç (Çoklu seçim yapabilirsiniz)</label>

                                    <select multiple name="konu[]" class="form-control default-select" id="sel2">
                                        @foreach($konular as $key => $konu)
                                            @foreach(json_decode($ogretmen['konu']) as $ogretmenkonu)
                                                @if($konu['id']==$ogretmenkonu)
                                                    <option selected value="{{$konu['id']}}">{{$konu['isim']}}</option>
                                                @endif
                                            @endforeach
                                            <option value="{{$konu['id']}}">{{$konu['isim']}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Telefon</label>

                                    <input class="form-control" type="text" name="telefon" value="{{$ogretmen['telefon']}}">
                                </div>

                                <div class="form-group">
                                    <label>Şifre</label>

                                    <input class="form-control" type="text" name="sifre">
                                </div>




                                <div class="form-group">
                                    <label>Durum</label>

                                    <select name="durum" class="form-control default-select" id="sel2">

                                        <option {{$aktif = ($ogretmen['durum'] == 1) ? 'selected' : ''}} value="1">Aktif</option>
                                        <option {{$pasif = ($ogretmen['durum'] == 0) ? 'selected' : ''}} value="0">Pasif</option>

                                    </select>
                                </div>

                                <input type="hidden" name="id" value="{{$ogretmen['id']}}">

                                <button type="submit" class="btn btn-danger" name="OdevEkle">Kayıt Et</button>
                                <a href="home" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
