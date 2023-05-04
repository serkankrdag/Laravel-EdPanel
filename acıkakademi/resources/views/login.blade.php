
<!doctype html>
<html class="no-js" lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Açık Akademi - Online Öğrenci Eğitim Sistemi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("/")}}assets/images/favicon.ico">
    <link rel="stylesheet" href="{{asset("/")}}assets/login/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset("/")}}assets/login/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset("/")}}assets/login/css/vegas.min.css">
    <link rel="stylesheet" href="{{asset("/")}}assets/login/font/flaticon.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("/")}}assets/login/style.css">
</head>

<body>

<div id="preloader" class="preloader">
    <div class='inner'>
        <div class='line1'></div>
        <div class='line2'></div>
        <div class='line3'></div>
    </div>
</div>

<section class="fxt-template-animation fxt-template-layout29">
    <div class="container-fluid">
        <div class="row">
            <div class="vegas-container col-md-6 col-12 fxt-bg-img" id="vegas-slide" data-vegas-options='{"delay":5000, "timer":false,"animation":"kenburns", "transition":"swirlLeft", "slides":[{"src": "{{asset("/")}}assets/upload/slider/{{$girisslider['resim']}}"}, {"src": "{{asset("/")}}assets/upload/slider/{{$girisslider['resim']}}"}]}'>

                <div class="fxt-page-switcher">
                    <a href="login" class="switcher-text1 active">Üye Girişi</a>
                </div>

            </div>
            <div class="col-md-6 col-12 fxt-bg-color">
                <div class="fxt-content">
                    <div class="fxt-header">
                        @if(session('error'))
                            <div class="alert alert-danger d-flex align-items-center mb-5">
                                <div class="d-flex flex-column">
                                    <h4 class="mb-1 text-dark">Giriş Başarısız</h4>
                                    <span>{{session('error')}}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="fxt-form">

                        <div class="fxt-transformY-30 fxt-transition-delay-1">
                            <h2>Üye Girişi</h2>
                        </div>

                        <div class="fxt-transformY-30 fxt-transition-delay-2">
                            <p>Üye Girişi yapmak için bilgilerinizi girin.</p>
                        </div>

                        <form action="{{route('decision')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="fxt-transformY-30 fxt-transition-delay-4">
                                    <input type="text" class="form-control" name="eposta" placeholder="Kullanıcı Adı" required="required" value="{{Cookie::get('mail')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="fxt-transformY-30 fxt-transition-delay-5">
                                    <input type="password" class="form-control" name="parola" placeholder="Şifre" required="required" value="{{Cookie::get('sifre')}}">
                                    <i class="flaticon-padlock"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="fxt-transformY-30 fxt-transition-delay-6">
                                    <div class="fxt-content-between">
                                        <button type="submit" class="fxt-btn-fill">Giriş Yap</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <div class="fxt-footer">
                            <div class="fxt-transformY-30 fxt-transition-delay-8">
                                <h3>Bizi Takip Edin!</h3>
                            </div>

                            <ul class="fxt-socials">
                                <li class="fxt-facebook fxt-transformY-30 fxt-transition-delay-9">
                                    <a target="_blank" href="https://www.facebook.com/acikakademi" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="fxt-twitter fxt-transformY-30 fxt-transition-delay-10">
                                    <a target="_blank" href="https://www.facebook.com/acikakademi" title="twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="fxt-instagram fxt-transformY-30 fxt-transition-delay-11">
                                    <a target="_blank" href="https://www.facebook.com/acikakademi" title="instagram"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li class="fxt-linkedin fxt-transformY-30 fxt-transition-delay-12">
                                    <a target="_blank" href="https://www.facebook.com/acikakademi" title="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li class="fxt-youtube fxt-transformY-30 fxt-transition-delay-13">
                                    <a target="_blank" href="https://www.facebook.com/acikakademi" title="youtube"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>

                        <!--
                        <div class="fxt-checkbox-area">
                            <div class="checkbox">
                                <input id="checkbox1" type="checkbox">
                                <label for="checkbox1">Beni Hatırla</label>
                            </div>
                        </div>
                        -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="{{asset("/")}}assets/login/js/jquery-3.5.0.min.js"></script>
<script src="{{asset("/")}}assets/login/js/bootstrap.min.js"></script>
<script src="{{asset("/")}}assets/login/js/imagesloaded.pkgd.min.js"></script>
<script src="{{asset("/")}}assets/login/js/vegas.min.js"></script>
<script src="{{asset("/")}}assets/login/js/validator.min.js"></script>
<script src="{{asset("/")}}assets/login/js/main.js"></script>
</body>
</html>
