@extends('layout.ogrenci')
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="alert alert-info left-icon-big alert-dismissible fade show">



                        <div class="media">
                            <div class="alert-left-icon-big">
                                <span><i class="fa fa-calendar-o mr-3"></i></span>
                            </div>

                            <div class="media-body">
                                <p class="mb-0">Optik Sınav sonuçlarını bu sayfamızdan inceleyebilirsiniz. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="project-info">


                    @foreach($sonuclar as $key => $sonuc)
                        <div class="col-xl-3 my-2 col-lg-4 col-sm-6">
                            <p class="text-primary mb-1">TYT</p>
                            <h5 class="title font-w600 mb-2"> {{$sonuc['sinavid']}} </h5>
                            <div class="text-dark"><i class="fa fa-calendar-o mr-3"></i>Sınav No : {{$sonuc['sinavid']}}</div>
                        </div>

                        <div class="col-xl-2 my-2 col-lg-4 col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="project-media">
                                </div>

                                <div class="ml-2">
                                    <span>TYT Puan</span>
                                    <h5 class="mb-0 pt-1 font-w50 text-black">{{$sonuc['tytpuani']}}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 my-2 col-lg-4 col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="project-media">
                                </div>

                                <div class="ml-2">
                                    <span>TYT Net</span>
                                    <h5 class="mb-0 pt-1 font-w500 text-black">{{$sonuc['toplamnet']}}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 my-2 col-lg-6 col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="power-ic">
                                    <i class="fa fa-bolt" aria-hidden="true"></i>
                                </div>

                                <div class="ml-2">
                                    <span>Genel Derece</span>
                                    <h5 class="mb-0 pt-1 font-w500 text-black">{{$sonuc['tytpuanigenelsiralama']}}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 my-2 col-lg-6 col-sm-6">
                            <div class="d-flex project-status align-items-center">
                                <a href="tytsonucdetayogrenci?id={{$sonuc['id']}}">
                                    <span class="btn bgl-danger text-warning status-btn mr-3"><i class="fa fa-check"></i> Sonuçları Görüntüle</span></a>
                                <div class="dropdown">


                                </div>
                            </div>
                        </div>


                            <?php
                            $arrayim[$key] = $sonuc["toplampuan"];
                            $arrayim1[$key] = $sonuc["toplamnet"];
                            $turkcearray[$key] = $sonuc["turkcenet"];
                            $matematikarray[$key] = $sonuc["matematiknet"];
                            $felsefearray[$key] = $sonuc["felsefenet"];
                            $dinarray[$key] = $sonuc["dinnet"];
                            $tariharray[$key] = $sonuc["tarihnet"];
                            $biyolojiarray[$key] = $sonuc["biyolojinet"];
                            $fizikarray[$key] = $sonuc["fiziknet"];
                            $kimyaarray[$key] = $sonuc["kimyanet"];
                            $cografyaarray[$key] = $sonuc["cografyanet"];

                            ?>
                    @endforeach







                        <div class="col-md-6" id="turkce">

                        </div>

                        <div class="col-md-6" id="matematik">

                        </div>
                        <div class="col-md-6" id="fizik">

                        </div>
                        <div class="col-md-6" id="din">

                        </div>
                        <div class="col-md-6" id="kimya">

                        </div>
                        <div class="col-md-6" id="biyoloji">

                        </div>
                        <div class="col-md-6" id="felsefe">

                        </div>
                        <div class="col-md-6" id="cografya">

                        </div>
                        <div class="col-md-4" id="tarih">


                        </div>
                        <div class="row">
                            <a href="javascript:yazdir()" class="btn btn-primary">yazdır</a>
                        </div>



                        <script>
                            function yazdir()
                            {
                                window.print();
                            }
                        </script>






                        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script src="https://www.highcharts.com/js/highcharts.src.js"></script>
                        <script>


                            <?php if (isset($fizikarray[0])) { ?>
                            var fizik1 = <?php echo $fizikarray[0]?>;
                            <?php } else { ?>
                            var fizik1 = '';
                            <?php } ?>

                            <?php if (isset($fizikarray[1])) { ?>
                            var fizik2 = <?php echo $fizikarray[1]?>;
                            <?php } else { ?>
                            var fizik2 = '';
                            <?php } ?>

                            <?php if (isset($fizikarray[2])) { ?>
                            var fizik3 = <?php echo $fizikarray[2]?>;
                            <?php } else { ?>
                            var fizik3 = '';
                            <?php } ?>

                            <?php if (isset($fizikarray[3])) { ?>
                            var fizik4 = <?php echo $fizikarray[3]?>;
                            <?php } else { ?>
                            var fizik4 = '';
                            <?php } ?>

                            <?php if (isset($fizikarray[4])) { ?>
                            var fizik5 = <?php echo $fizikarray[4]?>;
                            <?php } else { ?>
                            var fizik5 = '';
                            <?php } ?>

                            <?php if (isset($fizikarray[5])) { ?>
                            var fizik6 = <?php echo $fizikarray[5]?>;
                            <?php } else { ?>
                            var fizik6 = '';
                            <?php } ?>

                            <?php if (isset($fizikarray[6])) { ?>
                            var fizik7 = <?php echo $fizikarray[6]?>;
                            <?php } else { ?>
                            var fizik7 = '';
                            <?php } ?>

                            <?php if (isset($fizikarray[7])) { ?>
                            var fizik8 = <?php echo $fizikarray[7]?>;
                            <?php } else { ?>
                            var fizik8 = '';
                            <?php } ?>

                            <?php if (isset($fizikarray[8])) { ?>
                            var fizik9 = <?php echo $fizikarray[6]?>;
                            <?php } else { ?>
                            var fizik9 = '';
                            <?php } ?>

                            <?php if (isset($fizikarray[9])) { ?>
                            var fizik10 = <?php echo $fizikarray[9]?>;
                            <?php } else { ?>
                            var fizik10 = '';
                            <?php } ?>


                            <?php if (isset($kimyaarray[0])) { ?>
                            var kimya1 = <?php echo $kimyaarray[0]?>;
                            <?php } else { ?>
                            var kimya1 = '';
                            <?php } ?>

                            <?php if (isset($kimyaarray[1])) { ?>
                            var kimya2 = <?php echo $kimyaarray[1]?>;
                            <?php } else { ?>
                            var kimya2 = '';
                            <?php } ?>

                            <?php if (isset($kimyaarray[2])) { ?>
                            var kimya3 = <?php echo $kimyaarray[2]?>;
                            <?php } else { ?>
                            var kimya3 = '';
                            <?php } ?>

                            <?php if (isset($kimyaarray[3])) { ?>
                            var kimya4 = <?php echo $kimyaarray[3]?>;
                            <?php } else { ?>
                            var kimya4 = '';
                            <?php } ?>

                            <?php if (isset($kimyaarray[4])) { ?>
                            var kimya5 = <?php echo $kimyaarray[4]?>;
                            <?php } else { ?>
                            var kimya5 = '';
                            <?php } ?>

                            <?php if (isset($fizikarray[5])) { ?>
                            var kimya6 = <?php echo $fizikarray[5]?>;
                            <?php } else { ?>
                            var kimya6 = '';
                            <?php } ?>

                            <?php if (isset($kimyaarray[6])) { ?>
                            var kimya7 = <?php echo $kimyaarray[6]?>;
                            <?php } else { ?>
                            var kimya7 = '';
                            <?php } ?>

                            <?php if (isset($kimyaarray[7])) { ?>
                            var kimya8 = <?php echo $kimyaarray[7]?>;
                            <?php } else { ?>
                            var kimya8 = '';
                            <?php } ?>

                            <?php if (isset($kimyaarray[8])) { ?>
                            var kimya9 = <?php echo $kimyaarray[6]?>;
                            <?php } else { ?>
                            var kimya9 = '';
                            <?php } ?>

                            <?php if (isset($kimyaarray[9])) { ?>
                            var kimya10 = <?php echo $kimyaarray[9]?>;
                            <?php } else { ?>
                            var kimya10 = '';
                            <?php } ?>



                            <?php if (isset($biyolojiarray[0])) { ?>
                            var biyoloji1 = <?php echo $biyolojiarray[0]?>;
                            <?php } else { ?>
                            var biyoloji1 = '';
                            <?php } ?>

                            <?php if (isset($biyolojiarray[1])) { ?>
                            var biyoloji2 = <?php echo $biyolojiarray[1]?>;
                            <?php } else { ?>
                            var biyoloji2 = '';
                            <?php } ?>

                            <?php if (isset($biyolojiarray[2])) { ?>
                            var biyoloji3 = <?php echo $biyolojiarray[2]?>;
                            <?php } else { ?>
                            var biyoloji3 = '';
                            <?php } ?>

                            <?php if (isset($biyolojiarray[3])) { ?>
                            var biyoloji4 = <?php echo $biyolojiarray[3]?>;
                            <?php } else { ?>
                            var biyoloji4 = '';
                            <?php } ?>

                            <?php if (isset($biyolojiarray[4])) { ?>
                            var biyoloji5 = <?php echo $biyolojiarray[4]?>;
                            <?php } else { ?>
                            var biyoloji5 = '';
                            <?php } ?>

                            <?php if (isset($biyolojiarray[5])) { ?>
                            var biyoloji6 = <?php echo $biyolojiarray[5]?>;
                            <?php } else { ?>
                            var biyoloji6 = '';
                            <?php } ?>

                            <?php if (isset($biyolojiarray[6])) { ?>
                            var biyoloji7 = <?php echo $biyolojiarray[6]?>;
                            <?php } else { ?>
                            var biyoloji7 = '';
                            <?php } ?>

                            <?php if (isset($biyolojiarray[7])) { ?>
                            var biyoloji8 = <?php echo $biyolojiarray[7]?>;
                            <?php } else { ?>
                            var biyoloji8 = '';
                            <?php } ?>

                            <?php if (isset($biyolojiarray[8])) { ?>
                            var biyoloji9 = <?php echo $biyolojiarray[6]?>;
                            <?php } else { ?>
                            var biyoloji9 = '';
                            <?php } ?>

                            <?php if (isset($biyolojiarray[9])) { ?>
                            var biyoloji10 = <?php echo $biyolojiarray[9]?>;
                            <?php } else { ?>
                            var biyoloji10 = '';
                            <?php } ?>




                            <?php if (isset($dinarray[0])) { ?>
                            var din1 = <?php echo $dinarray[0]?>;
                            <?php } else { ?>
                            var din1 = '';
                            <?php } ?>

                            <?php if (isset($dinarray[1])) { ?>
                            var din2 = <?php echo $dinarray[1]?>;
                            <?php } else { ?>
                            var din2 = '';
                            <?php } ?>

                            <?php if (isset($dinarray[2])) { ?>
                            var din3 = <?php echo $dinarray[2]?>;
                            <?php } else { ?>
                            var din3 = '';
                            <?php } ?>

                            <?php if (isset($dinarray[3])) { ?>
                            var din4 = <?php echo $dinarray[3]?>;
                            <?php } else { ?>
                            var din4 = '';
                            <?php } ?>

                            <?php if (isset($dinarray[4])) { ?>
                            var din5 = <?php echo $dinarray[4]?>;
                            <?php } else { ?>
                            var din5 = '';
                            <?php } ?>

                            <?php if (isset($dinarray[5])) { ?>
                            var din6 = <?php echo $dinarray[5]?>;
                            <?php } else { ?>
                            var din6 = '';
                            <?php } ?>

                            <?php if (isset($dinarray[6])) { ?>
                            var din7 = <?php echo $dinarray[6]?>;
                            <?php } else { ?>
                            var din7 = '';
                            <?php } ?>

                            <?php if (isset($dinarray[7])) { ?>
                            var din8 = <?php echo $dinarray[7]?>;
                            <?php } else { ?>
                            var din8 = '';
                            <?php } ?>

                            <?php if (isset($dinarray[8])) { ?>
                            var din9 = <?php echo $dinarray[8]?>;
                            <?php } else { ?>
                            var din9 = '';
                            <?php } ?>

                            <?php if (isset($dinarray[9])) { ?>
                            var din10 = <?php echo $dinarray[9]?>;
                            <?php } else { ?>
                            var din10 = '';
                            <?php } ?>




                            <?php if (isset($felsefearray[0])) { ?>
                            var felsefe1 = <?php echo $felsefearray[0]?>;
                            <?php } else { ?>
                            var felsefe1 = '';
                            <?php } ?>

                            <?php if (isset($felsefearray[1])) { ?>
                            var felsefe2 = <?php echo $felsefearray[1]?>;
                            <?php } else { ?>
                            var felsefe2 = '';
                            <?php } ?>

                            <?php if (isset($felsefearray[2])) { ?>
                            var felsefe3 = <?php echo $felsefearray[2]?>;
                            <?php } else { ?>
                            var felsefe3 = '';
                            <?php } ?>

                            <?php if (isset($felsefearray[3])) { ?>
                            var felsefe4 = <?php echo $felsefearray[3]?>;
                            <?php } else { ?>
                            var felsefe4 = '';
                            <?php } ?>

                            <?php if (isset($felsefearray[4])) { ?>
                            var felsefe5 = <?php echo $felsefearray[4]?>;
                            <?php } else { ?>
                            var felsefe5 = '';
                            <?php } ?>

                            <?php if (isset($felsefearray[5])) { ?>
                            var felsefe6 = <?php echo $felsefearray[5]?>;
                            <?php } else { ?>
                            var felsefe6 = '';
                            <?php } ?>

                            <?php if (isset($felsefearray[6])) { ?>
                            var felsefe7 = <?php echo $felsefearray[6]?>;
                            <?php } else { ?>
                            var felsefe7 = '';
                            <?php } ?>


                            <?php if (isset($felsefearray[7])) { ?>
                            var felsefe8 = <?php echo $felsefearray[7]?>;
                            <?php } else { ?>
                            var felsefe8 = '';
                            <?php } ?>

                            <?php if (isset($felsefearray[8])) { ?>
                            var felsefe9 = <?php echo $felsefearray[8]?>;
                            <?php } else { ?>
                            var felsefe9 = '';
                            <?php } ?>


                            <?php if (isset($felsefearray[9])) { ?>
                            var felsefe10 = <?php echo $felsefearray[9]?>;
                            <?php } else { ?>
                            var felsefe10 = '';
                            <?php } ?>




                            <?php if (isset($matematikarray[0])) { ?>
                            var matematik1 = <?php echo $matematikarray[0]?>;
                            <?php } else { ?>
                            var matematik1 = '';
                            <?php } ?>

                            <?php if (isset($matematikarray[1])) { ?>
                            var matematik2 = <?php echo $matematikarray[1]?>;
                            <?php } else { ?>
                            var matematik2 = '';
                            <?php } ?>

                            <?php if (isset($matematikarray[2])) { ?>
                            var matematik3 = <?php echo $matematikarray[2]?>;
                            <?php } else { ?>
                            var matematik3 = '';
                            <?php } ?>

                            <?php if (isset($matematikarray[3])) { ?>
                            var matematik4 = <?php echo $matematikarray[3]?>;
                            <?php } else { ?>
                            var matematik4 = '';
                            <?php } ?>

                            <?php if (isset($matematikarray[4])) { ?>
                            var matematik5 = <?php echo $matematikarray[4]?>;
                            <?php } else { ?>
                            var matematik5 = '';
                            <?php } ?>

                            <?php if (isset($matematikarray[5])) { ?>
                            var matematik6 = <?php echo $matematikarray[5]?>;
                            <?php } else { ?>
                            var matematik6 = '';
                            <?php } ?>

                            <?php if (isset($matematikarray[6])) { ?>
                            var matematik7 = <?php echo $matematikarray[6]?>;
                            <?php } else { ?>
                            var matematik7 = '';
                            <?php } ?>


                            <?php if (isset($matematikarray[7])) { ?>
                            var matematik8 = <?php echo $matematikarray[7]?>;
                            <?php } else { ?>
                            var matematik8 = '';
                            <?php } ?>

                            <?php if (isset($matematikarray[8])) { ?>
                            var matematik9 = <?php echo $matematikarray[8]?>;
                            <?php } else { ?>
                            var matematik9 = '';
                            <?php } ?>

                            <?php if (isset($matematikarray[9])) { ?>
                            var matematik10 = <?php echo $matematikarray[9]?>;
                            <?php } else { ?>
                            var matematik10 = '';
                            <?php } ?>




                            <?php if (isset($cografyaarray[0])) { ?>
                            var cografya1 = <?php echo $cografyaarray[0]?>;
                            <?php } else { ?>
                            var cografya1 = '';
                            <?php } ?>

                            <?php if (isset($cografyaarray[1])) { ?>
                            var cografya2 = <?php echo $cografyaarray[1]?>;
                            <?php } else { ?>
                            var cografya2 = '';
                            <?php } ?>

                            <?php if (isset($cografyaarray[2])) { ?>
                            var cografya3 = <?php echo $cografyaarray[2]?>;
                            <?php } else { ?>
                            var cografya3 = '';
                            <?php } ?>

                            <?php if (isset($cografyaarray[3])) { ?>
                            var cografya4 = <?php echo $cografyaarray[3]?>;
                            <?php } else { ?>
                            var cografya4 = '';
                            <?php } ?>

                            <?php if (isset($cografyaarray[4])) { ?>
                            var cografya5 = <?php echo $cografyaarray[4]?>;
                            <?php } else { ?>
                            var cografya5 = '';
                            <?php } ?>

                            <?php if (isset($cografyaarray[5])) { ?>
                            var cografya6 = <?php echo $cografyaarray[5]?>;
                            <?php } else { ?>
                            var cografya6 = '';
                            <?php } ?>

                            <?php if (isset($cografyaarray[6])) { ?>
                            var cografya7 = <?php echo $cografyaarray[6]?>;
                            <?php } else { ?>
                            var cografya7 = '';
                            <?php } ?>


                            <?php if (isset($cografyaarray[7])) { ?>
                            var cografya8 = <?php echo $cografyaarray[7]?>;
                            <?php } else { ?>
                            var cografya8 = '';
                            <?php } ?>

                            <?php if (isset($cografyaarray[8])) { ?>
                            var cografya9= <?php echo $cografyaarray[8]?>;
                            <?php } else { ?>
                            var cografya9 = '';
                            <?php } ?>

                            <?php if (isset($cografyaarray[9])) { ?>
                            var cografya10 = <?php echo $cografyaarray[9]?>;
                            <?php } else { ?>
                            var cografya10 = '';
                            <?php } ?>




                            <?php if (isset($turkcearray[0])) { ?>
                            var turkce1 = <?php echo $turkcearray[0]?>;
                            <?php } else { ?>
                            var turkce1 = '';
                            <?php } ?>

                            <?php if (isset($turkcearray[1])) { ?>
                            var turkce2 = <?php echo $turkcearray[1]?>;
                            <?php } else { ?>
                            var turkce2 = '';
                            <?php } ?>

                            <?php if (isset($turkcearray[2])) { ?>
                            var turkce3 = <?php echo $turkcearray[2]?>;
                            <?php } else { ?>
                            var turkce3 = '';
                            <?php } ?>

                            <?php if (isset($turkcearray[3])) { ?>
                            var turkce4 = <?php echo $turkcearray[3]?>;
                            <?php } else { ?>
                            var turkce4 = '';
                            <?php } ?>

                            <?php if (isset($turkcearray[4])) { ?>
                            var turkce5 = <?php echo $turkcearray[4]?>;
                            <?php } else { ?>
                            var turkce5 = '';
                            <?php } ?>

                            <?php if (isset($turkcearray[5])) { ?>
                            var turkce6 = <?php echo $turkcearray[5]?>;
                            <?php } else { ?>
                            var turkce6 = '';
                            <?php } ?>

                            <?php if (isset($turkcearray[6])) { ?>
                            var turkce7 = <?php echo $turkcearray[6]?>;
                            <?php } else { ?>
                            var turkce7 = '';
                            <?php } ?>


                            <?php if (isset($turkcearray[7])) { ?>
                            var turkce8 = <?php echo $turkcearray[7]?>;
                            <?php } else { ?>
                            var turkce8 = '';
                            <?php } ?>


                            <?php if (isset($turkcearray[8])) { ?>
                            var turkce9 = <?php echo $turkcearray[8]?>;
                            <?php } else { ?>
                            var turkce9 = '';
                            <?php } ?>

                            <?php if (isset($turkcearray[9])) { ?>
                            var turkce10 = <?php echo $turkcearray[9]?>;
                            <?php } else { ?>
                            var turkce10 = '';
                            <?php } ?>



                            <?php if (isset($tariharray[0])) { ?>
                            var tarih1 = <?php echo $tariharray[0]?>;
                            <?php } else { ?>
                            var tarih1 = '';
                            <?php } ?>

                            <?php if (isset($tariharray[1])) { ?>
                            var tarih2 = <?php echo $tariharray[1]?>;
                            <?php } else { ?>
                            var tarih2 = '';
                            <?php } ?>

                            <?php if (isset($tariharray[2])) { ?>
                            var tarih3 = <?php echo $tariharray[2]?>;
                            <?php } else { ?>
                            var tarih3 = '';
                            <?php } ?>

                            <?php if (isset($tariharray[3])) { ?>
                            var tarih4 = <?php echo $tariharray[3]?>;
                            <?php } else { ?>
                            var tarih4 = '';
                            <?php } ?>

                            <?php if (isset($tariharray[4])) { ?>
                            var tarih5 = <?php echo $tariharray[4]?>;
                            <?php } else { ?>
                            var tarih5 = '';
                            <?php } ?>

                            <?php if (isset($turkcearray[5])) { ?>
                            var tarih6 = <?php echo $turkcearray[5]?>;
                            <?php } else { ?>
                            var tarih6 = '';
                            <?php } ?>

                            <?php if (isset($tariharray[6])) { ?>
                            var tarih7 = <?php echo $tariharray[6]?>;
                            <?php } else { ?>
                            var tarih7 = '';
                            <?php } ?>


                            <?php if (isset($tariharray[7])) { ?>
                            var tarih8 = <?php echo $tariharray[7]?>;
                            <?php } else { ?>
                            var tarih8 = '';
                            <?php } ?>


                            <?php if (isset($tariharray[8])) { ?>
                            var tarih9 = <?php echo $tariharray[8]?>;
                            <?php } else { ?>
                            var tarih9 = '';
                            <?php } ?>

                            <?php if (isset($tariharray[9])) { ?>
                            var tarih10 = <?php echo $tariharray[9]?>;
                            <?php } else { ?>
                            var tarih10 = '';
                            <?php } ?>














                            // $("#containerr").highcharts({
                            //     chart: {
                            //         type: 'column'
                            //     },
                            //     title: {
                            //         text: 'Sınav sonuçları grafiği'
                            //     },
                            //     xAxis: {
                            //         categories: ['puan','toplamnet']
                            //     },
                            //     yAxis: {
                            //         title: {
                            //             text: 'Gelişim'
                            //         }
                            //     },
                            //     series: [{
                            //         name: 'sınav1',
                            //         data: [puan,net]
                            //     },{
                            //         name: 'sınav2',
                            //         data: [puan2,net1]
                            //     }]
                            //
                            // });
                            $("#turkce").highcharts({
                                plotOptions: {
                                    // type: 'column'
                                },
                                title: {
                                    text: 'türkçe sonuçları grafiği'
                                },
                                xAxis: {
                                    categories: ['toplamnet']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Gelişim'
                                    }
                                },
                                series: [{
                                    allowPointSelect: true,
                                    name: 'türkçe net sayıları',
                                    data: [turkce1,turkce2,turkce3,turkce4,turkce5,turkce6,turkce7,turkce8,turkce9,turkce10],
                                }]

                            });
                            $("#matematik").highcharts({
                                plotOptions: {
                                    // type: 'column'
                                },
                                title: {
                                    text: 'matematik sonuçları grafiği'
                                },
                                xAxis: {
                                    categories: ['toplamnet']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Gelişim'
                                    }
                                },
                                series: [{
                                    allowPointSelect: true,
                                    name: 'matematik net sayıları',
                                    data: [matematik1,matematik2,matematik3,matematik4,matematik5,matematik6,matematik7,matematik8,matematik9,matematik10],
                                }]

                            });
                            $("#fizik").highcharts({
                                plotOptions: {
                                    // type: 'column'
                                },
                                title: {
                                    text: 'fizik sonuçları grafiği'
                                },
                                xAxis: {
                                    categories: ['toplamnet']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Gelişim'
                                    }
                                },
                                series: [{
                                    allowPointSelect: true,
                                    name: 'fizik net sayıları',
                                    data: [fizik1,fizik2,fizik3,fizik4,fizik5,fizik6,fizik7,fizik8,fizik9,fizik10],
                                }]

                            });
                            $("#kimya").highcharts({
                                plotOptions: {
                                    // type: 'column'
                                },
                                title: {
                                    text: 'kimya sonuçları grafiği'
                                },
                                xAxis: {
                                    categories: ['toplamnet']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Gelişim'
                                    }
                                },
                                series: [{
                                    allowPointSelect: true,
                                    name: 'kimya net sayıları',
                                    data: [kimya1,kimya2,kimya3,kimya4,kimya5,kimya6,kimya7,kimya8,kimya9,kimya10],
                                }]

                            });
                            $("#biyoloji").highcharts({
                                plotOptions: {
                                    // type: 'column'
                                },
                                title: {
                                    text: 'biyoloji sonuçları grafiği'
                                },
                                xAxis: {
                                    categories: ['toplamnet']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Gelişim'
                                    }
                                },
                                series: [{
                                    allowPointSelect: true,
                                    name: 'biyoloji net sayıları',
                                    data: [biyoloji1,biyoloji2,biyoloji3,biyoloji4,biyoloji5,biyoloji6,biyoloji7,biyoloji8,biyoloji9,biyoloji10],
                                }]

                            });
                            $("#din").highcharts({
                                plotOptions: {
                                    // type: 'column'
                                },
                                title: {
                                    text: 'din sonuçları grafiği'
                                },
                                xAxis: {
                                    categories: ['toplamnet']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Gelişim'
                                    }
                                },
                                series: [{
                                    allowPointSelect: true,
                                    name: 'din net sayıları',
                                    data: [din1,din2,din3,din4,din5,din6,din7,din8,din9,din10],
                                }]

                            });
                            $("#tarih").highcharts({
                                plotOptions: {
                                    // type: 'column'
                                },
                                title: {
                                    text: 'tarih sonuçları grafiği'
                                },
                                xAxis: {
                                    categories: ['toplamnet']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Gelişim'
                                    }
                                },
                                series: [{
                                    allowPointSelect: true,
                                    name: 'tarih net sayıları',
                                    data: [tarih1,tarih2,tarih3,tarih4,tarih5,tarih6,tarih7,tarih8,tarih9,tarih10],
                                }]

                            });
                            $("#cografya").highcharts({
                                plotOptions: {
                                    // type: 'column'
                                },
                                title: {
                                    text: 'cografya sonuçları grafiği'
                                },
                                xAxis: {
                                    categories: ['toplamnet']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Gelişim'
                                    }
                                },
                                series: [{
                                    allowPointSelect: true,
                                    name: 'cografya net sayıları',
                                    data: [cografya1,cografya2,cografya3,cografya4,cografya5,cografya6,cografya7,cografya8,cografya9,cografya10],
                                }]

                            });
                            $("#felsefe").highcharts({
                                plotOptions: {
                                    // type: 'column'
                                },
                                title: {
                                    text: 'felsefe sonuçları grafiği'
                                },
                                xAxis: {
                                    categories: ['toplamnet']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Gelişim'
                                    }
                                },
                                series: [{
                                    allowPointSelect: true,
                                    name: 'felsefe net sayıları',
                                    data: [felsefe1,felsefe2,felsefe3,felsefe4,felsefe5,felsefe6,felsefe7,felsefe8,felsefe9,felsefe10],
                                }]

                            });







                        </script>








                </div>
            </div>


        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

@endsection
