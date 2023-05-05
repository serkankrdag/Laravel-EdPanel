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
                            <h4 class="card-title">Ders Saati Düzenle</h4>
                            <hr>


                            <form action="{{'derssaatiduzenle'}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Ders Saati Adı</label>

                                    <input class="form-control" type="text" name="isim" value="{{$saat['isim']}}">
                                </div>

                                <div class="form-group">
                                    <label>Ders Saati Başlangıç</label>

                                    <input class="form-control" type="text"  name="baslangic" value="{{$saat['baslangic']}}">
                                </div>

                                <div class="form-group">
                                    <label>Ders Saati Bitiş</label>

                                    <input class="form-control" type="text"  name="bitis" value="{{$saat['bitis']}}">
                                </div>

                                <div class="form-group">
                                    <label>Sırası</label>

                                    <input class="form-control" type="number" name="sira" value="{{$saat['sira']}}">
                                </div>


                                <div class="form-group">
                                    <label>Durum</label>

                                    <select name="durum" class="form-control default-select" id="sel2">

                                        <option {{$aktif = ($saat['durum'] == 1) ? 'selected' : ''}} value="1">Aktif</option>
                                        <option {{$pasif = ($saat['durum'] == 0) ? 'selected' : ''}} value="0">Pasif</option>

                                    </select>
                                </div>

                                <input type="hidden" name="id" value="{{$saat['id']}}">

                                <button type="submit" class="btn btn-danger" name="OdevEkle">Kayıt Et</button>
                                <a href="home" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
