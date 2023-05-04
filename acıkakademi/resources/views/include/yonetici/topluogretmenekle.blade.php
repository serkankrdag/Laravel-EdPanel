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
                            <h4 class="card-title">Toplu Ogretmen Ekle</h4>
                            <hr>

                            <form action="{{route('ornekogretmenexcel')}}" method="post">
                                @csrf
                                <button type="submit" name="ornekexcel" class="btn btn-danger">ÖRNEK EXEL İÇİN TIKLAYIN</button>
                            </form>

                            <form action="{{route('topluogretmeniekle')}}" method="POST" enctype="multipart/form-data">
                                @csrf



                                <hr>
                                <div class="form-group">
                                    <label>Dosya Seçin</label>

                                    <input type="file" class="form-control" name="excelogretmen">
                                </div>
                                <hr>

                                <button type="submit" class="btn btn-danger" name="OdevEkle">Kayıt Et</button>
                                <a href="home" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
