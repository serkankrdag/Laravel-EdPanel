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
                            <h4 class="card-title">Site Genel Ayarları</h4>
                            <hr>


                            <form action="{{route('siteayarekle')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>

                                    <input class="form-control" type="text" name="title" value="{{$siteayar['title']}}">
                                </div>

                                <div class="form-group">
                                    <label>Keywords</label>

                                    <input class="form-control" type="text" name="keywords" value="{{$siteayar['keywords']}}">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>

                                    <input class="form-control" type="text" name="description" value="{{$siteayar['description']}}">
                                </div>

                                <div class="form-group">
                                    <label>Telefon</label>

                                    <input class="form-control" type="text" name="telefon" value="{{$siteayar['telefon']}}">
                                </div>

                                <div class="form-group">
                                    <label>WhatsApp</label>

                                    <input class="form-control" type="text" name="whatsapp" value="{{$siteayar['whatsapp']}}">
                                </div>

                                <div class="form-group">
                                    <label>Mail</label>

                                    <input class="form-control" type="text" name="mail" value="{{$siteayar['mail']}}">
                                </div>

                                <div class="form-group">
                                    <label>Facebook</label>

                                    <input class="form-control" type="text" name="facebook" value="{{$siteayar['facebook']}}">
                                </div>

                                <div class="form-group">
                                    <label>Twitter</label>

                                    <input class="form-control" type="text" name="twitter" value="{{$siteayar['twitter']}}">
                                </div>

                                <div class="form-group">
                                    <label>Instagram</label>

                                    <input class="form-control" type="text" name="instagram" value="{{$siteayar['instagram']}}">
                                </div>

                                <div class="form-group">
                                    <label>LinkedIn</label>

                                    <input class="form-control" type="text" name="linkedin" value="{{$siteayar['linkedin']}}">
                                </div>

                                <div class="form-group">
                                    <label>Youtube</label>

                                    <input class="form-control" type="text" name="youtube" value="{{$siteayar['youtube']}}">
                                </div>



                                <div class="form-group">
                                    <label>Logo</label>

                                    <input class="form-control" type="file" name="logo">
                                </div>

                                <div class="form-group">
                                    <label>Favicon</label>

                                    <input class="form-control" type="file" name="favicon">
                                </div>

                                <button type="submit" class="btn btn-danger">Kayıt Et</button>
                                <a href="home" type="button" class="btn btn-success">Vazgeç</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
