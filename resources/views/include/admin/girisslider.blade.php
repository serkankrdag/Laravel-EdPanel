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
                            <h4 class="card-title">Kurum Ekle</h4>
                            <hr>

                            <form action="{{route('girissliderekle')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Resim</label>

                                    <input class="form-control" type="file" name="resim" >
                                </div>

                                <div class="form-group">
                                    <label>Başlık</label>

                                    <input class="form-control" type="text" name="baslik" value="{{$girisslider['baslik']}}">
                                </div>

                                <div class="form-group">
                                    <label>Durum</label>

                                    <select name="durum" class="form-control default-select" id="sel2">

                                        <option {{$aktif = ($girisslider['durum'] == 1) ? 'selected' : ''}} value="1">Aktif</option>
                                        <option {{$pasif = ($girisslider['durum'] == 0) ? 'selected' : ''}} value="0">Pasif</option>

                                    </select>
                                </div>

                                <button type="submit" class="btn btn-danger" name="OdevEkle">Kayıt Et</button>
                                <a href="yoneticiler" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection