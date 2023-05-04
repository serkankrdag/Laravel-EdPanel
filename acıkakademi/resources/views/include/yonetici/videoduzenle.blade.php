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
                            <h4 class="card-title">Video Düzenle</h4>
                            <hr>

                            <form action="{{route('videoyuduzenle')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Resim</label>
                                    <input name="resim" type="file" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Sınıf Seç (Çoklu seçim yapabilirsiniz)</label>

                                    <select multiple name="sinif[]" class="form-control default-select" id="sel2">
                                        @foreach($siniflar as $key => $sinif)
                                            <option value="{{$sinif['id']}}">{{$sinif['isim']}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Konu Seç (Çoklu seçim yapabilirsiniz)</label>

                                    <select multiple name="konu[]" class="form-control default-select" id="sel2">
                                        @foreach($konular as $key => $konu)
                                            <option value="{{$konu['id']}}">{{$konu['isim']}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Başlık</label>
                                    <input type="text" class="form-control" name="baslik" value="{{$video['baslik']}}">
                                </div>

                                <div class="form-group">
                                    <label>Videoyu Yükle (Eğitim videosunu bilgisayardan yüklemek isterseniz buradan seçin)</label>
                                    <input type="file" class="form-control" name="video">
                                </div>

                                <div class="form-group">
                                    <label>Video Kodu</label>
                                    <input name="videokod" class="form-control" rows="5" value="{{$video['videokod']}}">
                                </div>

                                <div class="form-group">
                                    <label>Eğitim Açıklaması</label>
                                    <textarea class="form-control" rows="5" name="detay">{{$video['detay']}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Video Süresi</label>
                                    <input type="text" class="form-control" name="videosure" value="{{$video['videosure']}}">
                                </div>

                                <div class="form-group">
                                    <label>Durum</label>

                                    <select name="durum" class="form-control default-select" id="sel2">
                                        <option {{$aktif = ($video['durum'] == 1) ? 'selected' : ''}} value="1">Aktif</option>
                                        <option {{$pasif = ($video['durum'] == 0) ? 'selected' : ''}} value="0">Pasif</option>
                                    </select>
                                </div>

                                <input type="hidden" name="id" value="{{$video['id']}}">

                                <button type="submit" class="btn btn-danger" name="OdevEkle">Kayıt Et</button>
                                <a href="home" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
