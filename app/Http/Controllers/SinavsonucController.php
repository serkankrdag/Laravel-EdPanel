<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tytsonuclari;
use App\Models\Lgssonuclari;
use App\Models\Ogrenciler;
use App\Models\Yoneticiler;
use App\Models\Sinavsonuc;
use mysql_xdevapi\Session;

class SinavsonucController extends Controller
{
    public function lgssil() {
        $id=$_GET['id'];
        Lgssonuclari::where('id',$id)->delete();
        return redirect()->back();
    }

    public function tytsil() {
        $id=$_GET['id'];
        Tytsonuclari::where('id',$id)->delete();
        return redirect()->back();
    }

    public function tytsonuclari() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $sonuclar = Sinavsonuc::where('kurum',$kurum['kurum'])->where('sinavturu',1)->get();
            return view('include.yonetici.tytsonuclari',array('sonuclar'=>$sonuclar));
        } else {
            return redirect('login');
        }
    }

    public function lgssonuclari() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $sonuclar = Sinavsonuc::where('kurum',$kurum['kurum'])->where('sinavturu',2)->get();
            return view('include.yonetici.lgssonuclari',array('sonuclar'=>$sonuclar));
        } else {
            return redirect('login');
        }
    }
    public function lgssonucdetayogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $id=$_GET['id'];
            $sonuc = Sinavsonuc::where('id',$id)->first();


            return view('include.ogrenci.lgssonucdetay',array('sonuc'=>$sonuc));
        } else {
            return redirect('login');
        }
    }

    public function tytsonucdetayogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $id=$_GET['id'];
            $sonuc = tytsonuclari::where('id',$id)->first();
            return view('include.ogrenci.tytsonucdetay',array('sonuc'=>$sonuc));
        } else {
            return redirect('login');
        }
    }


    public function lgssonuclariogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $kurum = Ogrenciler::where('id',session('ogrenci'))->first();
            $sonuclar = Sinavsonuc::where('kurum',$kurum['kurum'])->where('ogrenci',$kurum['id'])->where('sinavturu',2)->get();
            return view('include.ogrenci.lgssinavsonuclari',array('sonuclar'=>$sonuclar));
        } else {
            return redirect('login');
        }
    }

    public function tytsonuclariogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $kurum = Ogrenciler::where('id',session('ogrenci'))->first();
            $sonuclar = tytsonuclari::where('eposta',session('ogrenci'))->get();
            return view('include.ogrenci.tytsinavsonuclari',array('sonuclar'=>$sonuclar));
        } else {
            return redirect('login');
        }
    }

    public function toplutytsonuclari() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.toplutytsonuclari');
        } else {
            return redirect('login');
        }
    }

    public function toplulgssonuclari() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.toplulgssonuclari');
        } else {
            return redirect('login');
        }
    }


    public function tytsonucuekle(Request $request) {
        if (isset($request->tytexcel) && !empty($request->tytexcel)) {

            $excelAdi=time().rand(0,1000).'.'.$request->tytexcel->getClientOriginalExtension();
            $yukle=$request->tytexcel->move('assets/upload/excel/',$excelAdi);

            $sinavsonuckontrol[] = '';

            if ($xlsx=SimpleXLSX::parse('assets/upload/excel/'.$excelAdi)) {
                foreach ($xlsx->rows() as $key => $satir) {
                    $ogrenci = Ogrenciler::where('eposta',$satir[1])->first();
//                    $sinavsonuclari = tytsonuclari::where('sinavid',$satir[45])->get();
//                    foreach ($sinavsonuclari as $sinavsonuc) {
//                        $sinavsonuckontrol[] = $sinavsonuc['ogrenci'];
//                    }
                    $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                    if ($key!=0) {
                        if (isset($ogrenci) && !empty($ogrenci)) {
                            if (!isset($sinavsonuclari) && empty($sinavsonuclari)) {
                                tytsonuclari::create([
                                    'ogrno' => $satir[0],
                                    'eposta' => $ogrenci['id'],
                                    'sinif' => $ogrenci['sinifId'],
                                    'kitapcik' => $satir[3],
                                    'turkcedogru' => $satir[4],
                                    'turkceyanlis' => $satir[5],
                                    'turkcenet' => $satir[6],
                                    'turkcetestgenel' => $satir[7],
                                    'tarihdogru' => $satir[8],
                                    'tarihyanlis' => $satir[9],
                                    'tarihnet' => $satir[10],
                                    'tarihtestgenel' => $satir[11],
                                    'cografyadogru' => $satir[12],
                                    'cografyayanlis' => $satir[13],
                                    'cografyanet' => $satir[14],
                                    'cografyatestgenel' => $satir[15],
                                    'felsefedogru' => $satir[16],
                                    'felsefeyanlis' => $satir[17],
                                    'felsefenet' => $satir[18],
                                    'felsefenetgenel' => $satir[19],
                                    'dindogru' => $satir[20],
                                    'dinyanlis' => $satir[21],
                                    'dinnet' => $satir[22],
                                    'dinnetgenel' => $satir[23],
                                    'matematikdogru' => $satir[24],
                                    'matematikyanlis' => $satir[25],
                                    'matematiknet' => $satir[26],
                                    'matematiktestgenel' => $satir[27],
                                    'fizikdogru' => $satir[28],
                                    'fizikyanlis' => $satir[29],
                                    'fiziknet' => $satir[30],
                                    'fiziktestgenel' => $satir[31],
                                    'kimyadogru' => $satir[32],
                                    'kimyayanlis' => $satir[33],
                                    'kimyanet' => $satir[34],
                                    'kimyatestgenel' => $satir[35],
                                    'biyolojidogru' => $satir[36],
                                    'biyolojiyanlis' => $satir[37],
                                    'biyolojinet' => $satir[38],
                                    'biyolojitestgenel' => $satir[39],
                                    'toplamdogru' => $satir[40],
                                    'toplamyanlis' => $satir[41],
                                    'toplamnet' => $satir[42],
                                    'tytpuani' => $satir[43],
                                    'tytpuanigenelsiralama' => $satir[44],
                                    'sinavid' => $satir[45],


                                ]);
                            } else {
                                if (in_array($ogrenci['id'],$sinavsonuckontrol)) {

                                } else {
                                    tytsonuclari::create([
                                        'ogrno' => $satir[0],
                                        'eposta' => $ogrenci['eposta'],
                                        'sinif' => $ogrenci['sinifId'],
                                        'kitapcikturu' => $satir[3],
                                        'turkcedogru' => $satir[4],
                                        'turkceyanlis' => $satir[5],
                                        'turkcenet' => $satir[6],
                                        'turkcetestgenel' => $satir[7],
                                        'tarihdogru' => $satir[8],
                                        'tarihyanlis' => $satir[9],
                                        'tarihnet' => $satir[10],
                                        'tarihtestgenel' => $satir[11],
                                        'cografyadogru' => $satir[12],
                                        'cografyayanlis' => $satir[13],
                                        'cografyanet' => $satir[14],
                                        'cografyatestgenel' => $satir[15],
                                        'felsefedogru' => $satir[16],
                                        'felsefeyanlis' => $satir[17],
                                        'felsefenet' => $satir[18],
                                        'felsefenetgenel' => $satir[19],
                                        'dindogru' => $satir[20],
                                        'dinyanlis' => $satir[21],
                                        'dinnet' => $satir[22],
                                        'dinnetgenel' => $satir[23],
                                        'matematikdogru' => $satir[24],
                                        'matematikyanlis' => $satir[25],
                                        'matematiknet' => $satir[26],
                                        'matematiktestgenel' => $satir[27],
                                        'fizikdogru' => $satir[28],
                                        'fizikyanlis' => $satir[29],
                                        'fiziknet' => $satir[30],
                                        'fiziktestgenel' => $satir[31],
                                        'kimyadogru' => $satir[32],
                                        'kimyayanlis' => $satir[33],
                                        'kimyanet' => $satir[34],
                                        'kimyatestgenel' => $satir[35],
                                        'biyolojidogru' => $satir[36],
                                        'biyolojiyanlis' => $satir[37],
                                        'biyolojinet' => $satir[38],
                                        'biyolojitestgenel' => $satir[39],
                                        'toplamdogru' => $satir[40],
                                        'toplamyanlis' => $satir[41],
                                        'toplamnet' => $satir[42],
                                        'tytpuani' => $satir[43],
                                        'tytpuanigenelsiralama' => $satir[44],
                                        'sinavid' => $satir[45]
                                    ]);
                                }
                            }
                        } else {
                            return redirect()->back()->with('error', 'Bazı Öğrenci Bilgileri Hatalı');
                        }
                    }
                }
                return redirect()->back()->with('success', 'Tyt Yükleme Başarılı');
            } else {
                echo SimpleXLSX::parseError();
            }
        } else {
            return redirect()->back()->with('error', 'Lütfen Bir Dosya Seçin');
        }
    }

    public function ornektytexcel() {
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile('assets/upload/excel/1671447261300.xlsx');
        return redirect()->back();
    }

    public function orneklgsexcel() {
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile('assets/upload/excel/1671447261300.xlsx');
        return redirect()->back();
    }

    public function lgssonucuekle(Request $request) {
        if (isset($request->lgsexcel) && !empty($request->lgsexcel)) {

            $excelAdi=time().rand(0,1000).'.'.$request->lgsexcel->getClientOriginalExtension();
            $yukle=$request->lgsexcel->move('assets/upload/excel/',$excelAdi);

            $sinavsonuckontrol[] = '';

            if ($xlsx=SimpleXLSX::parse('assets/upload/excel/'.$excelAdi)) {
                foreach ($xlsx->rows() as $key => $satir) {
                    $ogrenci = Ogrenciler::where('eposta',$satir[1])->first();
                    $sinavsonuclari = Sinavsonuc::where('sinavid',$satir[33])->get();
                    foreach ($sinavsonuclari as $sinavsonuc) {
                        $sinavsonuckontrol[] = $sinavsonuc['ogrenci'];
                    }
                    $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                    if ($key!=0) {
                        if (isset($ogrenci) && !empty($ogrenci)) {
                            if (!isset($sinavsonuclari) && empty($sinavsonuclari)) {
                                Sinavsonuc::create([
                                    'ogrencino' => $satir[0],
                                    'ogrenci' => $ogrenci['id'],
                                    'sinif' => $ogrenci['sinifId'],
                                    'kitapciktur' => $satir[3],
                                    'turkcedogru' => $satir[4],
                                    'turkceyanlis' => $satir[5],
                                    'turkcenet' => $satir[6],
                                    'turkcetestgenel' => $satir[7],
                                    'matematikdogru' => $satir[8],
                                    'matematikyanlis' => $satir[9],
                                    'matematiknet' => $satir[10],
                                    'matematiktestgenel' => $satir[11],
                                    'dindogru' => $satir[12],
                                    'dinyanlis' => $satir[13],
                                    'dinnet' => $satir[14],
                                    'dintestgenel' => $satir[15],
                                    'fendogru' => $satir[16],
                                    'fenyanlis' => $satir[17],
                                    'fennet' => $satir[18],
                                    'fentestgenel' => $satir[19],
                                    'sosyaldogru' => $satir[20],
                                    'sosyalyanlis' => $satir[21],
                                    'sosyalnet' => $satir[22],
                                    'sosyaltestgenel' => $satir[23],
                                    'ingilizcedogru' => $satir[24],
                                    'ingilizceyanlis' => $satir[25],
                                    'ingilizcenet' => $satir[26],
                                    'ingilizcetestgenel' => $satir[27],
                                    'toplamdogru' => $satir[28],
                                    'toplamyanlis' => $satir[29],
                                    'toplamnet' => $satir[30],
                                    'toplampuan' => $satir[31],
                                    'sinavbasarisira' => $satir[32],
                                    'sinavturu' => 2,
                                    'sinavid' => $satir[33],
                                    'kurum' => $kurum->kurum,
                                ]);
                            } else {
                                if (in_array($ogrenci['id'],$sinavsonuckontrol)) {

                                } else {
                                    Sinavsonuc::create([
                                        'ogrencino' => $satir[0],
                                        'ogrenci' => $ogrenci['id'],
                                        'sinif' => $ogrenci['sinifId'],
                                        'kitapciktur' => $satir[3],
                                        'turkcedogru' => $satir[4],
                                        'turkceyanlis' => $satir[5],
                                        'turkcenet' => $satir[6],
                                        'turkcetestgenel' => $satir[7],
                                        'matematikdogru' => $satir[8],
                                        'matematikyanlis' => $satir[9],
                                        'matematiknet' => $satir[10],
                                        'matematiktestgenel' => $satir[11],
                                        'dindogru' => $satir[12],
                                        'dinyanlis' => $satir[13],
                                        'dinnet' => $satir[14],
                                        'dintestgenel' => $satir[15],
                                        'fendogru' => $satir[16],
                                        'fenyanlis' => $satir[17],
                                        'fennet' => $satir[18],
                                        'fentestgenel' => $satir[19],
                                        'sosyaldogru' => $satir[20],
                                        'sosyalyanlis' => $satir[21],
                                        'sosyalnet' => $satir[22],
                                        'sosyaltestgenel' => $satir[23],
                                        'ingilizcedogru' => $satir[24],
                                        'ingilizceyanlis' => $satir[25],
                                        'ingilizcenet' => $satir[26],
                                        'ingilizcetestgenel' => $satir[27],
                                        'toplamdogru' => $satir[28],
                                        'toplamyanlis' => $satir[29],
                                        'toplamnet' => $satir[30],
                                        'toplampuan' => $satir[31],
                                        'sinavbasarisira' => $satir[32],
                                        'sinavturu' => 2,
                                        'sinavid' => $satir[33],
                                        'kurum' => $kurum->kurum,
                                    ]);
                                }
                            }
                        } else {
                            return redirect()->back()->with('error', 'Bazı Öğrenci Bilgileri Hatalı');
                        }
                    }
                }
                return redirect()->back()->with('success', 'Lgs Yükleme Başarılı');
            } else {
                echo SimpleXLSX::parseError();
            }
        } else {
            return redirect()->back()->with('error', 'Lütfen Bir Dosya Seçin');
        }
    }
}
