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
                            <h4 class="card-title">Kurum Ekle</h4>
                            <hr>


                            <form action="{{route('kurumduzenle')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Kurum Logo</label>

                                    <input class="form-control" type="file" name="logo">
                                </div>

                                <div class="form-group">
                                    <label>Kurum Adı</label>

                                    <input class="form-control" type="text" name="isim" value="{{$kurum['isim']}}">
                                </div>

                                <div class="form-group">
                                    <label>Kurum Lisans Bitiş Süresi</label>

                                    <input class="form-control" type="text" name="lisansbitis" value="{{$kurum['lisansbitis']}}">
                                </div>

                                <div class="form-group">
                                    <label>Alınan Ücret</label>

                                    <input class="form-control" type="text" name="ucret" value="{{$kurum['ucret']}}">
                                </div>

                                <div class="form-group">
                                    <label>Şehir</label>

                                    <input class="form-control" type="text" name="sehir" value="{{$kurum['sehir']}}">
                                </div>


                                <div class="form-group">
                                    <label>Durum</label>

                                    <select class="form-control default-select" name="durum">
                                            <option {{$aktif = ($kurum['durum'] == 1) ? 'selected' : ''}} value="1">Aktif</option>
                                            <option {{$aktif = ($kurum['durum'] == 0) ? 'selected' : ''}} value="0">Pasif</option>
                                    </select>
                                </div>

                                <input type="hidden" name="kurumId" value="{{$kurum['id']}}">

                                <button type="submit" class="btn btn-danger">Kayıt Et</button>
                                <a href="kurumlar" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
