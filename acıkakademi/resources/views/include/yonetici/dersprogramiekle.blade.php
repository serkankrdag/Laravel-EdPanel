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
                            <h4 class="card-title">Ders Ekle</h4>
                            <hr>


                            <form action="{{'dersprogramekle'}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Konu Seç</label>

                                    <select name="konu" class="form-control default-select" id="sel2">
                                        @foreach($konular as $key => $konu)
                                            <option value="{{$konu['id']}}" >{{$konu['isim']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Öğretmen Seç</label>

                                    <select name="ogretmen" class="form-control default-select" id="sel2">
                                        @foreach($ogretmenler as $key => $ogretmen)
                                            <option value="{{$ogretmen['id']}}" >{{$ogretmen['isim']}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Ders Saati Seç</label>

                                    <select name="saat" class="form-control default-select" id="sel2">
                                        @foreach($saatler as $key => $saat)
                                            <option value="{{$saat['id']}}" >{{$saat['isim']}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Sınıf Seç</label>

                                    <select name="sinif" class="form-control default-select" id="sel2">
                                        @foreach($siniflar as $key => $sinif)
                                            <option value="{{$sinif['id']}}" >{{$sinif['isim']}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Ders Tarihi</label>

                                    <input name="tarih" class="form-control" type="date">
                                </div>

                                <button type="submit" class="btn btn-danger" name="OdevEkle">Kayıt Et</button>
                                <a href="home" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
