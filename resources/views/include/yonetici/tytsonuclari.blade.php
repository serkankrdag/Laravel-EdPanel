@extends('layout.yonetici')
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-sm-flex d-block">
                    <div class="mr-auto mb-sm-0 mb-3">
                        <h4 class="card-title mb-2">TYT Sınav Sonuçları</h4>
                        <span>Kurumunuza bağlı TYT Sınav Sonuçlarını yükleme ve görüntüleme işlemleri yapabilirsiniz.</span>
                    </div>
                    <a href="toplutytsonuclari" class="btn btn-info light mr-3"><i class="las la-download scale3 mr-2"></i>Sınav Yükle</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table style-1" id="ListDatatableView">
                            <thead>
                            <tr>
                                <th width="20">İD</th>
                                <th>SINAV ADI</th>
                                <th>SINAV TÜRÜ</th>
                                <th width="100"></th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($sonuclar as $key => $sonuc)
                                <tr>
                                    <td> {{$sonuc['id']}} </td>
                                    <td> {{$sonuc['sinavid']}} </td>
                                    @if($sonuc['sinavturu']==1)
                                        <td> TYT </td>
                                    @else
                                        <td> LGS </td>
                                    @endif

                                    <td>
                                        <div class="d-flex action-button">

                                            <a href="lgssil?id={{$sonuc['id']}}" class="ml-2 btn btn-xs px-2 light btn-danger">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
