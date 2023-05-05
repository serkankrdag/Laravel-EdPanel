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
                            <h4 class="card-title">LGS Sınav Yükleme İşlemleri</h4>
                            <hr>

                                <form action="{{route('orneklgsexcel')}}" method="post">
                                    @csrf
                                    <a href="assets/upload/excel/1671447261300.xlsx" type="submit" name="ornekexcel" class="btn btn-danger">ÖRNEK EXEL İÇİN TIKLAYIN</a>
                                </form>

                            <form action="{{route('lgssonucuekle')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <a href="#">

                                <hr>
                                <div class="form-group">
                                    <label>Dosya Seçin</label>

                                    <input type="file" class="form-control" name="lgsexcel">
                                </div>


                                <hr>

                                <div class="col-xl-12">
                                    <div class="alert alert-primary notification">
                                        <p class="notificaiton-title mb-2"><strong>Bilgilendirme!</strong></p>
                                        <p>Exel tablosunda sıralamaya göre verileri eklemeniz önemli. Sınıf ve Kullanıcı adı isimleri nasıl yüklediyseniz (Boşluk vs.) bire bir aynı olmalıdır. Exel tablosunda ki İlk satır dahil tamamını temizeyip o şekilde yükleme yapın lütfen.</p>
                                    </div>
                                </div>





                                <button type="submit" class="btn btn-danger" name="OdevEkle">Kayıt Et</button>
                                <button type="button" class="btn btn-success" onclick="history.back();">Vazgeç</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  </div>


@endsection
