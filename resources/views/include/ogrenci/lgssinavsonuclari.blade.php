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
                            <p class="text-primary mb-1">LGS</p>
                            <h5 class="title font-w600 mb-2"> {{$sonuc['sinavid']}} </h5>
                            <div class="text-dark"><i class="fa fa-calendar-o mr-3"></i>Sınav No : {{$sonuc['sinavid']}}</div>
                        </div>

                        <div class="col-xl-2 my-2 col-lg-4 col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="project-media">
                                </div>

                                <div class="ml-2">
                                    <span>LGS Puan</span>
                                    <h5 class="mb-0 pt-1 font-w50 text-black">{{$sonuc['toplampuan']}}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 my-2 col-lg-4 col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="project-media">
                                </div>

                                <div class="ml-2">
                                    <span>LGS Net</span>
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
                                    <h5 class="mb-0 pt-1 font-w500 text-black">{{$sonuc['sinavbasarisira']}}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 my-2 col-lg-6 col-sm-6">
                            <div class="d-flex project-status align-items-center">
                                <a href="lgssonucdetayogrenci?id={{$sonuc['id']}}">
                                    <span class="btn bgl-danger text-warning status-btn mr-3"><i class="fa fa-check"></i> Sonuçları Görüntüle</span></a>
                                <div class="dropdown">

                                </div>
                            </div>
                        </div>

{{--                        <?php--}}
{{--                                $arrayim = array(--}}
{{--                                    "puan" => $sonuc["toplampuan"],--}}
{{--                                    "net" => $sonuc["toplamnet"]);--}}
{{--                            ?>--}}

                        <?php
                            $arrayim[$key] = $sonuc["toplampuan"];
                            $arrayim1[$key] = $sonuc["toplamnet"];
                            $turkcearray[$key] = $sonuc["turkcenet"];
                            $matematikarray[$key] = $sonuc["matematiknet"];
                            $fenarray[$key] = $sonuc["fennet"];
                            $dinarray[$key] = $sonuc["dinnet"];
                            $ingilizcearray[$key] = $sonuc["ingilizcenet"];

                            $sosyalarray[$key] = $sonuc["sosyalnet"];

                            ?>
                    @endforeach

{{--                        <div class="col-md-6" id="containerr">--}}
{{--                        </div>--}}


                        <div class="col-md-6" id="turkce">

                        </div>

                        <div class="col-md-6" id="matematik">

                        </div>
                        <div class="col-md-6" id="fen">

                        </div>
                        <div class="col-md-6" id="din">

                        </div>
                        <div class="col-md-6" id="ing">

                        </div>
                        <div class="col-md-6" id="sosyal">

                        </div>
                        <a href="javascript:yazdir()" class="btn btn-primary">yazdır</a>

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


                           <?php if (isset($fenarray[0])) { ?>
                            var fen1 = <?php echo $fenarray[0]?>;
                            <?php } else { ?>
                            var fen1 = '';
                            <?php } ?>

                            <?php if (isset($fenarray[1])) { ?>
                            var fen2 = <?php echo $fenarray[1]?>;
                            <?php } else { ?>
                            var fen2 = '';
                            <?php } ?>

                            <?php if (isset($fenarray[2])) { ?>
                            var fen3 = <?php echo $fenarray[2]?>;
                            <?php } else { ?>
                            var fen3 = '';
                            <?php } ?>

                            <?php if (isset($fenarray[3])) { ?>
                            var fen4 = <?php echo $fenarray[3]?>;
                            <?php } else { ?>
                            var fen4 = '';
                            <?php } ?>

                            <?php if (isset($fenarray[4])) { ?>
                            var fen5 = <?php echo $fenarray[4]?>;
                            <?php } else { ?>
                            var fen5 = '';
                            <?php } ?>

                            <?php if (isset($fenarray[5])) { ?>
                            var fen6 = <?php echo $fenarray[5]?>;
                            <?php } else { ?>
                            var fen6 = '';
                            <?php } ?>

                            <?php if (isset($fenarray[6])) { ?>
                            var fen7 = <?php echo $fenarray[6]?>;
                            <?php } else { ?>
                            var fen7 = '';
                            <?php } ?>

                            <?php if (isset($fenarray[7])) { ?>
                            var fen8 = <?php echo $fenarray[7]?>;
                            <?php } else { ?>
                            var fen8 = '';
                            <?php } ?>

                            <?php if (isset($fenarray[8])) { ?>
                           var fen9 = <?php echo $fenarray[6]?>;
                           <?php } else { ?>
                           var fen9 = '';
                           <?php } ?>

                           <?php if (isset($fenarray[9])) { ?>
                           var fen10 = <?php echo $fenarray[9]?>;
                           <?php } else { ?>
                           var fen10 = '';
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




                           <?php if (isset($ingilizcearray[0])) { ?>
                            var ing1 = <?php echo $ingilizcearray[0]?>;
                            <?php } else { ?>
                            var ing1 = '';
                            <?php } ?>

                            <?php if (isset($ingilizcearray[1])) { ?>
                            var ing2 = <?php echo $ingilizcearray[1]?>;
                            <?php } else { ?>
                            var ing2 = '';
                            <?php } ?>

                            <?php if (isset($ingilizcearray[2])) { ?>
                            var ing3 = <?php echo $ingilizcearray[2]?>;
                            <?php } else { ?>
                            var ing3 = '';
                            <?php } ?>

                            <?php if (isset($ingilizcearray[3])) { ?>
                            var ing4 = <?php echo $ingilizcearray[3]?>;
                            <?php } else { ?>
                            var ing4 = '';
                            <?php } ?>

                            <?php if (isset($ingilizcearray[4])) { ?>
                            var ing5 = <?php echo $ingilizcearray[4]?>;
                            <?php } else { ?>
                            var ing5 = '';
                            <?php } ?>

                            <?php if (isset($ingilizcearray[5])) { ?>
                            var ing6 = <?php echo $ingilizcearray[5]?>;
                            <?php } else { ?>
                            var ing6 = '';
                            <?php } ?>

                            <?php if (isset($ingilizcearray[6])) { ?>
                            var ing7 = <?php echo $ingilizcearray[6]?>;
                            <?php } else { ?>
                            var ing7 = '';
                            <?php } ?>


                            <?php if (isset($ingilizcearray[7])) { ?>
                            var ing8 = <?php echo $ingilizcearray[7]?>;
                            <?php } else { ?>
                            var ing8 = '';
                            <?php } ?>

                            <?php if (isset($ingilizcearray[8])) { ?>
                           var ing9 = <?php echo $ingilizcearray[8]?>;
                           <?php } else { ?>
                           var ing9 = '';
                           <?php } ?>


                           <?php if (isset($ingilizcearray[9])) { ?>
                           var ing10 = <?php echo $ingilizcearray[9]?>;
                           <?php } else { ?>
                           var ing10 = '';
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




                            <?php if (isset($sosyalarray[0])) { ?>
                            var sosyal1 = <?php echo $sosyalarray[0]?>;
                            <?php } else { ?>
                            var sosyal1 = '';
                            <?php } ?>

                            <?php if (isset($sosyalarray[1])) { ?>
                            var sosyal2 = <?php echo $sosyalarray[1]?>;
                            <?php } else { ?>
                            var sosyal2 = '';
                            <?php } ?>

                            <?php if (isset($sosyalarray[2])) { ?>
                            var sosyal3 = <?php echo $sosyalarray[2]?>;
                            <?php } else { ?>
                            var sosyal3 = '';
                            <?php } ?>

                            <?php if (isset($sosyalarray[3])) { ?>
                            var sosyal4 = <?php echo $sosyalarray[3]?>;
                            <?php } else { ?>
                            var sosyal4 = '';
                            <?php } ?>

                            <?php if (isset($sosyalarray[4])) { ?>
                            var sosyal5 = <?php echo $sosyalarray[4]?>;
                            <?php } else { ?>
                            var sosyal5 = '';
                            <?php } ?>

                            <?php if (isset($sosyalarray[5])) { ?>
                            var sosyal6 = <?php echo $sosyalarray[5]?>;
                            <?php } else { ?>
                            var sosyal6 = '';
                            <?php } ?>

                            <?php if (isset($sosyalarray[6])) { ?>
                            var sosyal7 = <?php echo $sosyalarray[6]?>;
                            <?php } else { ?>
                            var sosyal7 = '';
                            <?php } ?>


                            <?php if (isset($sosyalarray[7])) { ?>
                            var sosyal8 = <?php echo $sosyalarray[7]?>;
                            <?php } else { ?>
                            var sosyal8 = '';
                            <?php } ?>

                            <?php if (isset($sosyalarray[8])) { ?>
                           var sosyal9 = <?php echo $sosyalarray[8]?>;
                           <?php } else { ?>
                           var sosyal9 = '';
                           <?php } ?>

                           <?php if (isset($sosyalarray[9])) { ?>
                           var sosyal10 = <?php echo $sosyalarray[9]?>;
                           <?php } else { ?>
                           var sosyal10 = '';
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

                            $("#fen").highcharts({
                                plotOptions: {
                                    // type: 'column'
                                },
                                title: {
                                    text: 'fen sonuçları grafiği'
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
                                    name: 'fen net sayıları',
                                    data: [fen1,fen2,fen3,fen4,fen5,fen6,fen7,fen8,fen9,fen10],
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

                            $("#ing").highcharts({
                                plotOptions: {
                                    // type: 'column'
                                },
                                title: {
                                    text: 'ingilizce sonuçları grafiği'
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
                                    name: 'ingilizce net sayıları',
                                    data: [ing1,ing2,ing3,ing4,ing5,ing6,ing7,ing8,ingilizce9,ingilizce10],
                                }]

                            });
                            $("#sosyal").highcharts({
                                plotOptions: {
                                    // type: 'column'
                                },
                                title: {
                                    text: 'sosyal sonuçları grafiği'
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
                                    name: 'sosyal net sayıları',
                                    data: [sosyal1,sosyal2,sosyal3,sosyal4,sosyal5,sosyal6,sosyal7,sosyal8,sosyal9,sosyal10],
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
