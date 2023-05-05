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


                            <form action="{{route('kurumekle')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Kurum Logo</label>

                                    <input class="form-control" type="file" name="logo">
                                </div>

                                <div class="form-group">
                                    <label>Kurum Adı</label>

                                    <input class="form-control" type="text" name="isim">
                                </div>

                                <div class="form-group">
                                    <label>E-Posta</label>

                                    <input class="form-control" type="text" name="eposta">
                                </div>

                                <div class="form-group">
                                    <label>Kurum Lisans Bitiş Süresi</label>

                                    <input class="form-control" type="text" name="lisansbitis">
                                </div>

                                <div class="form-group">
                                    <label>Alınan Ücret</label>

                                    <input class="form-control" type="text" name="ucret">
                                </div>

                                <div class="form-group">
                                    <label>Şehir</label>

                                    <input class="form-control" type="text" name="sehir">
                                </div>


                                <div class="form-group">
                                    <label>Durum</label>

                                    <select class="form-control default-select" name="durum">

                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>

                                    </select>
                                </div>

                                <button type="submit" class="btn btn-danger">Kayıt Et</button>
                                <a href="kurumlar" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
