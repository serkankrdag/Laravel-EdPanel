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
                                        <h4 class="mb-1 text-dark">Düzenle Başarısız</h4>
                                        <span>{{session('error')}}</span>
                                    </div>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success d-flex align-items-center mb-5">
                                    <div class="d-flex flex-column">
                                        <h4 class="mb-1 text-dark">Düzenle Başarılı</h4>
                                        <span>{{session('success')}}</span>
                                    </div>
                                </div>
                            @endif
                            <h4 class="card-title">Yemek Menüsü Düzenle</h4>
                            <hr>


                            <form action="{{route('menuduzenle')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Kahvaltı</label>

                                    <input  name="kahvalti" class="form-control" value="{{$menu['kahvalti']}}">
                                </div>

                                <div class="form-group">
                                    <label>Öğle Yemeği</label>

                                    <input  name="ogleyemek" class="form-control" value="{{$menu['ogleyemek']}}">
                                </div>

                                <div class="form-group">
                                    <label>Ara Öğün</label>

                                    <input  name="araogun" class="form-control" value="{{$menu['araogun']}}">
                                </div>



                                <div class="form-group">
                                    <label>Durum</label>

                                    <select name="durum" class="form-control default-select" id="sel2">

                                        <option {{$aktif = ($menu['durum'] == 1) ? 'selected' : ''}} value="1">Aktif</option>
                                        <option {{$pasif = ($menu['durum'] == 0) ? 'selected' : ''}} value="0">Pasif</option>

                                    </select>
                                </div>

                                <input type="hidden" name="id" value="{{$menu['id']}}">

                                <button type="submit" class="btn btn-danger" name="OdevEkle">Kayıt Et</button>
                                <a home type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
