@extends('layout.ogrenci')
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
                                        <h4 class="mb-1 text-dark">Gönderme Başarısız</h4>
                                        <span>{{session('error')}}</span>
                                    </div>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success d-flex align-items-center mb-5">
                                    <div class="d-flex flex-column">
                                        <h4 class="mb-1 text-dark">Gönderme Başarılı</h4>
                                        <span>{{session('success')}}</span>
                                    </div>
                                </div>
                            @endif
                            <h4 class="card-title">Ödev Gönder</h4>
                            <hr>

                            <form action="{{route('odevgonderimogrenci')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Açıklama</label>
                                    <textarea class="form-control" rows="5" name="detay"></textarea>
                                    <input type="hidden" name="id" value="{{$odev['id']}}">
                                </div>

                                <div class="form-group">
                                    <label>Dosya Seçiniz (Çoklu gönderimlerde dosyayı <b>".zip"</b> yaparak gönderiniz)</label>
                                    <input type="file" class="form-control" name="odevfile" multiple>
                                </div>

                                <input type="hidden" name="kurum" value="{{$ogrenci['kurum']}}">


                                <button type="submit" class="btn btn-danger" name="OdevEkle">Ödevi Gönder</button>
                                <a href="home" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <nav>

        </nav>
    </div>
    </div>

@endsection
