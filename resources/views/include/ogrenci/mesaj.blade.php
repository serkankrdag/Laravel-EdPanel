@extends('layout.ogrenci')
@section('content')

    <div class="content-body chat-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body chat-wrapper p-0">
                            <div class="chat-hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="chat-left-sidebar">
                                <div class="d-flex chat-fix-search align-items-center">
                                    <img src="assets/images/user.png" alt="" class="rounded-circle mr-3">
                                    <div class="input-group message-search-area">
                                        <input type="text" class="form-control" placeholder="İsim ara..">
                                        <div class="input-group-append">
                                            <button class="input-group-text"><i class="flaticon-381-search-2"></i></button>
                                        </div>
                                    </div>
                                </div>



                                <div class="card-body message-bx px-0 pt-3" >
                                    <div class="tab-content dz-scroll" id="message-bx">
                                        @foreach($ogretmenler as $ogretmen)
                                            @foreach(json_decode($ogretmen['sinif']) as $sinifim)
                                                @if($kurum['sinifId'] == $sinifim)
                                                    <a href="mesajogrenci?id={{$ogretmen['id']}}">
                                                        <div class="chat-list-area" data-chat="person3">
                                                            <div class="image-bx">
                                                                <img src="assets/images/user.png" alt="" class="rounded-circle img-1">
                                                                <span class="active"></span>
                                                            </div>
                                                            <div class="info-body">
                                                                <div class="d-flex">
                                                                    <h6 class="text-black user-name mb-0 font-w600 fs-16" data-name="Ad Soyad">{{$ogretmen['isim']}}</h6>
                                                                    <span class="ml-auto fs-14"></span>
                                                                </div>
                                                                <p class=""></p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            <div class="chart-right-sidebar">
                                <div class="message-bx chat-box">


                                    <div class="d-flex justify-content-between chat-box-header">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/user.png" alt="" class="rounded-circle main-img mr-3">
                                            <h5 class="text-black font-w500 mb-sm-1 mb-0 title-nm">{{$ogretmensecili['isim']}}</h5>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="d-sm-inline-block d-none"></span>

                                        </div>
                                    </div>


                                    <div class="chat-box-area dz-scroll" id="chartBox" style="background-image:url('images/chat-bg.png');">
                                        <div id="mesaj" data-chat="person2" class="chat active-chat">
                                            @foreach($mesajlar as $mesaj)
                                                @if($mesaj->kullanici == session('ogrenci') && $mesaj->gonderen=='ogrenci' && $mesaj->ogrenci==session('ogrenci'))
                                                    <div class="media mb-4 justify-content-end align-items-end">
                                                        <div class="message-sent">
                                                            <br>
                                                            <p class="mb-1">
                                                                {{$mesaj->mesaj}}
                                                            </p>
                                                            <span class="fs-12 text-black">9.30 AM</span>
                                                        </div>
                                                        <div class="image-bx ml-sm-3 ml-2 mb-4">
                                                            <img src="assets/images/user.png" alt="" class="rounded-circle img-1">
                                                        </div>
                                                    </div>
                                                @elseif($mesaj->ogrenci==session('ogrenci'))
                                                    <div class="media mb-4 received-msg  justify-content-start align-items-start">
                                                        <div class="image-bx mr-sm-3 mr-2">
                                                            <img src="assets/images/user.png" alt="" class="rounded-circle img-1">
                                                        </div>
                                                        <div class="message-received">
                                                            <p class="mb-1">
                                                                {{$mesaj->mesaj}}
                                                            </p>
                                                            <span class="fs-12 text-black">4.30 AM</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="card-footer border-0 type-massage">
                                        <div class="input-group">
                                            <textarea class="form-control" name="yenimesaj" id="yenimesaj" rows="1" placeholder="Mesajını yaz..."></textarea>
                                            <input id="id" type="hidden" class="form-control" value="{{session('ogrenci')}}"/>
                                            <input id="ogrenci" type="hidden" class="form-control" value="{{session('ogrenci')}}"/>
                                            <input id="ogretmen" type="hidden" class="form-control" value="{{$ogretmensecili['id']}}"/>
                                            <input id="kurum" type="hidden" class="form-control" value="{{$kurum['kurum']}}"/>
                                            <div class="input-group-append">
                                                <button type="button" class="btn p-0 mr-3"><i class="las la-paperclip scale5 text-secondary"></i></button>
                                                <button type="button" class="btn p-0 mr-3"><i class="las la-image scale5 text-secondary"></i></button>
                                                <button id="mesajenter" type="button" onclick="add_message()" class="send-btn btn-primary btn">Gönder</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function add_message()
        {
            var type = "ogrenci";
            var id = document.getElementById("id").value;
            var ogrenci = document.getElementById("ogrenci").value;
            var ogretmen = document.getElementById("ogretmen").value;
            var kurum = document.getElementById("kurum").value;
            var msg = document.getElementById("yenimesaj").value;
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {type,id,msg,kurum,ogrenci,ogretmen},
                dataType: "JSON",
                success: function (response) {
                    if(response['durum'] == 'success' ){
                        $('#mesaj').append(response['sonuc']);
                        $('#yenimesaj').val('');
                    }
                    else {
                        alert("Mesaj Gönderilemedi");
                    }
                }
            });
        }
    </script>

@endsection
