@extends('layout.admin')
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
                            <h4 class="card-title">Yönetici Düzenle</h4>
                            <hr>


                            <form action="{{route('yoneticiekle')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Yönetici Avatar</label>

                                        <input class="form-control" type="file" name="avatar">
                                    </div>
                                    <div class="form-group">
                                        <label>Kurum Seç</label>

                                        <select name="kurum" class="form-control default-select" id="sel2">
                                            <option>Seçim Yapılmadı</option>
                                            @foreach($kurumlar as $key => $kurum)
                                                <option value="{{$kurum['id']}}" >{{$kurum['isim']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Yönetici Adı</label>

                                    <input class="form-control" type="text" name="isim">
                                </div>

                                <div class="form-group">
                                    <label>Kullanıcı Giriş Eposta</label>

                                    <input class="form-control" type="eposta" name="eposta">
                                </div>

                                <div class="form-group">
                                    <label>Şifre</label>

                                    <input class="form-control" type="text" name="parola">
                                </div>

                                <div class="form-group">
                                    <label>Telefon Numarası</label>

                                    <input class="form-control" type="text" name="telefon">
                                </div>


                                <div class="form-group">
                                    <label>Durum</label>

                                    <select name="durum" class="form-control default-select" id="sel2">

                                        <option value="1">Aktif</option>
                                        <option value="2">Pasif</option>

                                    </select>
                                </div>


                                <button type="submit" class="btn btn-danger" name="OdevEkle">Kayıt Et</button>
                                <a href="yoneticiler" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
