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
                            <h4 class="card-title">Etkinlik Düzenle</h4>
                            <hr>


                            <form action="{{route('etkinligiduzenle')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Resim</label>
                                    <input type="file" class="form-control" name="resim">
                                </div>


                                <div class="form-group">
                                    <label>Başlık</label>
                                    <input type="text" class="form-control" name="baslik" value="{{$etkinlik['baslik']}}">
                                </div>

                                <div class="form-group">
                                    <label>Detay</label>
                                    <textarea class="form-control" rows="5" name="detay">{{$etkinlik['detay']}}</textarea>
                                </div>


                                <div class="form-group">
                                    <label>Sınıf Seçiniz (Birden fazla sınıf seçebilirsiniz):</label>

                                    <select multiple="multiple" class="form-control default-select" id="sel2" name="sinif[]">

                                        @foreach($siniflar as $key => $sinif)
                                            <option value="{{$sinif['id']}}">{{$sinif['isim']}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <input type="hidden" name="id" value="{{$etkinlik['id']}}">

                                <div class="form-group">
                                    <label>Detay Çoklu Resim (Birden Fazla Detay resim seçebilirsiniz)</label>
                                    <input type="file" multiple  class="form-control" name="resimler[]" >
                                </div>

                                <button type="submit" class="btn btn-danger" name="OdevEkle">Kayıt Et</button>
                                <a href="home" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
