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
                                        <h4 class="mb-1 text-dark">Mail Gönderme Başarısız</h4>
                                        <span>{{session('error')}}</span>
                                    </div>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success d-flex align-items-center mb-5">
                                    <div class="d-flex flex-column">
                                        <h4 class="mb-1 text-dark">Mail Gönderme Başarılı</h4>
                                        <span>{{session('success')}}</span>
                                    </div>
                                </div>
                            @endif
                            <h4 class="card-title">Toplu Mail Gönderimi</h4>
                            <hr>


                            <form action="{{route('toplumailigonder')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Mail Başlığı</label>

                                    <input class="form-control" type="text" name="baslik">
                                </div>

                                <div class="form-group">
                                    <label>Mail Detayı Giriniz</label>
                                    <textarea name="detay" class="form-control" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Sınıf Seç</label>

                                    <select name="sinif" multiple class="form-control default-select" id="sel2">
                                        @foreach($siniflar as $key => $sinif)
                                            <option value="{{$sinif['id']}}">{{$sinif['isim']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kullanıcı Grubu Seç</label>

                                    <select name="kullanici" class="form-control default-select" id="sel2">
                                        <option value="1">Öğrenciler</option>
                                        <option value="2">Öğretmenler</option>
                                        <option value="3">Veliler</option>
                                    </select>
                                </div>




                                <button type="submit" class="btn btn-danger" name="OdevEkle">MAİL GÖNDER</button>
                                <a href="home" type="button" class="btn btn-success">VAZGEÇ</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
