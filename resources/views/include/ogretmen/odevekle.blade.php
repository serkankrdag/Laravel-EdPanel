@extends('layout.ogretmen')
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
                            <h4 class="card-title">Ödev Ekle</h4>
                            <hr>


                            <form action="{{route('odeviekleogretmen')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Başlık</label>
                                    <input type="text" class="form-control" name="baslik">
                                </div>

                                <div class="form-group">
                                    <label>Açıklama</label>
                                    <textarea class="form-control" rows="5" name="aciklama"></textarea>
                                </div>


                                <div class="form-group">
                                    <label>Sınıf Seçiniz (Birden fazla sınıf seçebilirsiniz):</label>

                                    <select multiple="multiple" class="form-control default-select" id="sel2" name="sinif[]">

                                        @foreach($siniflar as $sinif)
                                            @foreach($sinifId as $sinifim)
                                                @if($sinif['id'] == $sinifim)
                                                    <option value="{{$sinif['id']}}">{{$sinif['isim']}}</option>
                                                @endif
                                            @endforeach
                                        @endforeach

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Konu Seçiniz</label>

                                    <select class="form-control default-select" id="sel2" name="konu">

                                        @foreach($konular as $konu)
                                            @foreach($konuId as $konum)
                                                @if($konu['id'] == $konum)
                                                    <option value="{{$konu['id']}}">{{$konu['isim']}}</option>
                                                @endif
                                            @endforeach
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Bitiş Tarihi</label>
                                    <input type="date" class="form-control" name="bitistarih">
                                </div>


                                <div class="form-group">
                                    <label>Yönlendirilecek Link</label>
                                    <input type="text" class="form-control" name="link" value="0">
                                </div>


                                <div class="form-group">
                                    <label>Dosya Seçiniz</label>
                                    <input type="file" id="exampleInputFile" class="form-control" name="dosya" >
                                </div>

                                <input type="hidden" name="ogretmen" value="{{$ogretmen['id']}}">

                                <button type="submit" class="btn btn-danger" name="OdevEkle">Kayıt Et</button>
                                <a href="home" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
