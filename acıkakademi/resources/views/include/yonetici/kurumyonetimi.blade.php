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
                            <h4 class="card-title">Kurum Bilgileri</h4>
                            <hr>


                            <form action="{{route('kurumyonetimduzenle')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Kurum Adı</label>

                                    <input class="form-control" type="text" name="isim" value="{{$kurum['isim']}}">
                                </div>

                                <div class="form-group">
                                    <label>Lisans Bitiş Tarihi</label>

                                    <input disabled class="form-control" type="text" name="lisansbitis" value="{{$kurum['lisansbitis']}}">
                                </div>

                                <div class="form-group">
                                    <label>Yetkili Kişi</label>

                                    <input disabled class="form-control" type="text" name="yetkili" value="{{session('isim')}}">
                                </div>

                                <div class="form-group">
                                    <label>Kurum Telefon</label>

                                    <input class="form-control" type="text" name="telefon" value="{{$kurum['telefon']}}">
                                </div>


                                <div class="form-group">
                                    <label>E-Posta</label>

                                    <input class="form-control" type="text" name="eposta" value="{{$kurum['mail']}}">
                                </div>


                                <div class="form-group">
                                    <label>Adres</label>

                                    <textarea name="adres" class="form-control" rows="5">{{$kurum['adres']}}</textarea>
                                </div>

                                <input type="hidden" name="id" value="{{$kurum['id']}}">

                                <button type="submit" class="btn btn-danger" name="OdevEkle">Kayıt Et</button>
                                <a href="home" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
