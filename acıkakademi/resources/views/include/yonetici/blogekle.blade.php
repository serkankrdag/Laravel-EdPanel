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
                            <h4 class="card-title">Blog Yazısı Ekle</h4>
                            <hr>


                            <form action="{{route('bloguekle')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Resim</label>
                                    <input name="resim" type="file" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label>Başlık</label>
                                    <input type="text" class="form-control" name="baslik">
                                </div>

                                <div class="form-group">
                                    <label>Detay</label>
                                    <textarea class="form-control" rows="5" name="detay"></textarea>
                                </div>

                                <button type="submit" class="btn btn-danger" name="OdevEkle">Kayıt Et</button>
                                <a href="home" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
