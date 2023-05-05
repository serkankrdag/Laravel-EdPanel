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
                            <h4 class="card-title">Site Mail Ayarları</h4>
                            <hr>


                            <form action="{{route('smsayarekle')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Sms Başlığı</label>

                                    <input class="form-control" type="text" name="baslik" value="{{$smsayar['baslik']}}">
                                </div>

                                <div class="form-group">
                                    <label>Sms Kullanıcı Adı</label>

                                    <input class="form-control" type="text" name="kulAdi" value="{{$smsayar['kulAdi']}}">
                                </div>

                                <div class="form-group">
                                    <label>Sms Şifre</label>

                                    <input class="form-control" type="text" name="parola" value="{{$smsayar['parola']}}">
                                </div>

                                <button type="submit" class="btn btn-danger">Kayıt Et</button>
                                <a href="home" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
