@extends('layout.ogrenci')
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">#{{$sonuc['sinavid']}} No'lu Sınav Sonuçları</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="alert alert-primary alert-dismissible fade show">
                                    <strong>TÜRKÇE</strong>  </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Doğru</label>
                                        <input type="text" class="form-control" disabled value="{{$sonuc['turkcedogru']}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Yanlış</label>
                                        <input type="text" class="form-control" disabled value="{{$sonuc['turkceyanlis']}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Net</label>
                                        <input type="text" class="form-control" disabled value="{{$sonuc['turkcenet']}}">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Test Genel</label>
                                        <input type="text" class="form-control" disabled value="{{$sonuc['turkcetestgenel']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-info alert-dismissible fade show">
                                <strong>SOSYAL BİLGİLER</strong>  </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Doğru</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['sosyaldogru']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Yanlış</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['sosyalyanlis']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Net</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['sosyalnet']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Test Genel</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['sosyaltestgenel']}}">
                                </div>
                            </div>


                            <div class="alert alert-success alert-dismissible fade show">
                                <strong>DİN BİLGİSİ</strong>  </div>
                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label>Doğru</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['dindogru']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Yanlış</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['dinyanlis']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Net</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['dinnet']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Test Genel</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['dintestgenel']}}">
                                </div>
                            </div>

                            <div class="alert alert-warning alert-dismissible fade show">
                                <strong>FEN BİLİMLERİ</strong>  </div>
                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label>Doğru</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['fendogru']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Yanlış</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['fenyanlis']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Net</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['fennet']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Test Genel</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['fentestgenel']}}">
                                </div>
                            </div>

                            <div class="alert alert-light alert-dismissible fade show">
                                <strong>MATEMATİK</strong>  </div>
                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label>Doğru</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['matematikdogru']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Yanlış</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['matematikyanlis']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Net</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['matematiknet']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Test Genel</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['matematiktestgenel']}}">
                                </div>
                            </div>

                            <div class="alert alert-secondary alert-dismissible fade show">
                                <strong>İNGİLİZCE</strong>  </div>
                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label>Doğru</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['ingilizcedogru']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Yanlış</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['ingilizceyanlis']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Net</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['ingilizcenet']}}">
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Test Genel</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['ingilizcetestgenel']}}">
                                </div>
                            </div>



                            <div class="alert alert-danger alert-dismissible fade show">
                                <strong>GENEL TOPLAM</strong>  </div>
                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label>Toplam Doğru</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['toplamdogru']}}">
                                </div>


                                <div class="form-group col-md-4">
                                    <label>Toplam Yanlış</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['toplamyanlis']}}">
                                </div>


                                <div class="form-group col-md-4">
                                    <label>Toplam Net</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['toplamnet']}}">
                                </div>


                                <div class="form-group col-md-2">
                                    <label>LGS Puan</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['toplampuan']}}">
                                </div>


                                <div class="form-group col-md-2">
                                    <label>Genel Derece</label>
                                    <input type="text" class="form-control" disabled value="{{$sonuc['sinavbasarisira']}}">
                                </div>
                            </div>

                           <div class="col-md-12" id="containerr">deneme</div>
                            <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script src="https://www.highcharts.com/js/highcharts.src.js"></script>

                            <script>

                                var din = <?=$sonuc["dinnet"]?>;
                                var turkcenet = <?php echo $sonuc["turkcenet"]?>;
                                var sosyalnet = <?php echo  $sonuc["sosyalnet"]?>;
                                var fennet = <?php echo  $sonuc["fennet"]?>;
                                var matnet = <?php echo  $sonuc["matematiknet"]?>;
                                var ingilizcenet = <?php echo  $sonuc["ingilizcenet"]?>;
                                var toplamnet = <?php echo $sonuc["toplamnet"]?>;


                                    $("#containerr").highcharts({
                                        chart: {
                                            type: 'column'
                                        },
                                        title: {
                                            text: 'Sınav sonuçları grafiği'
                                        },
                                        xAxis: {
                                            categories: ['türkçe','din','sosyal','fen','matematik','ingilizce','toplam']
                                        },
                                        yAxis: {
                                            title: {
                                                text: 'Net sayısı'
                                            }
                                        },
                                    series: [{
                                        name: 'sınav sonuc',
                                        data: [turkcenet,din,sosyalnet,fennet,matnet,ingilizcenet,toplamnet]
                                    }]

                                    });
                            </script>


                            <button id="print" class="btn btn-info" type="button" onclick="window.print();"> <span>
                                <i class="ti-printer"></i> Yazdır</span> </button>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
