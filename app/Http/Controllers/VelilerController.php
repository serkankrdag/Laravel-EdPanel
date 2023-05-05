<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veliler;
use App\Models\Ogrenciler;
use App\Models\Sistemkullanicilari;
use App\Models\Yoneticiler;

class VelilerController extends Controller
{
    public function velisil() {
        $id=$_GET['id'];
        Veliler::where('id',$id)->delete();
        return redirect()->back();
    }

    public function veliler() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $veliler = Veliler::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.veliler',array('veliler'=>$veliler));
        } else {
            return redirect('login');
        }
    }

    public function veliekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $ogrenciler = Ogrenciler::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.veliekle',array('ogrenciler'=>$ogrenciler));
        } else {
            return redirect('login');
        }
    }

    public function veliduzenle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $id=$_GET['id'];
            $veli = Veliler::find($id);
            $ogrenciler = Ogrenciler::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.veliduzenle',array('ogrenciler'=>$ogrenciler,'veli'=>$veli));
        } else {
            return redirect('login');
        }
    }

    public function veliyiekle(Request $request) {
        if ($request->isim!='' && $request->eposta!='' && $request->telefon!='' && $request->sifre!='' && $request->ogrenci!='' && $request->adres!='') {
            $control = Veliler::whereEposta($request->eposta)->first();
            if (isset($control) && !empty($control)) {
                return redirect()->back()->with('error', 'Girilen Eposta Kullanımda');
            } else {

                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();

                Veliler::create([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'telefon' => $request->telefon,
                    'sifre' => md5(sha1($request->sifre)),
                    'ogrenciId' => json_encode($request->ogrenci),
                    'adres' => $request->adres,
                    'durum' => $request->durum,
                    'kurum' => $kurum->kurum,
                ]);

                Sistemkullanicilari::create([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'telefon' => $request->telefon,
                    'resim' => 'yok',
                    'parola' => md5(sha1($request->sifre)),
                    'yetki' => 5,
                    'durum' => $request->durum,
                ]);
                return redirect()->back()->with('success', 'Kayıt Ekleme Başarılı');
            }
        }
    }

    public function veliyiduzenle(Request $request) {
        if (isset($request->ogrenci) && !empty($request->ogrenci)) {
            if (isset($request->sifre) && !empty($request->sifre)) {
                if ($request->isim!='' && $request->eposta!='' && $request->telefon!='' && $request->adres!='') {
                    Veliler::whereId($request->id)->update([
                        'isim' => $request->isim,
                        'eposta' => $request->eposta,
                        'telefon' => $request->telefon,
                        'sifre' => md5(sha1($request->sifre)),
                        'ogrenciId' => json_encode($request->ogrenci),
                        'adres' => $request->adres,
                        'durum' => $request->durum,
                    ]);

                    Sistemkullanicilari::whereEposta($request->eposta)->update([
                        'isim' => $request->isim,
                        'eposta' => $request->eposta,
                        'telefon' => $request->telefon,
                        'parola' => md5(sha1($request->sifre)),
                        'yetki' => 5,
                        'durum' => $request->durum,
                    ]);
                    return redirect()->back()->with('success', 'Kayıt Ekleme Başarılı');
                }
            } else {
                if ($request->isim!='' && $request->eposta!='' && $request->telefon!='' && $request->adres!='') {
                    Veliler::whereId($request->id)->update([
                        'isim' => $request->isim,
                        'eposta' => $request->eposta,
                        'telefon' => $request->telefon,
                        'ogrenciId' => json_encode($request->ogrenci),
                        'adres' => $request->adres,
                        'durum' => $request->durum,
                    ]);

                    Sistemkullanicilari::whereEposta($request->eposta)->update([
                        'isim' => $request->isim,
                        'eposta' => $request->eposta,
                        'telefon' => $request->telefon,
                        'yetki' => 5,
                        'durum' => $request->durum,
                    ]);
                    return redirect()->back()->with('success', 'Kayıt Ekleme Başarılı');
                }
            }
        } else {
            if (isset($request->sifre) && !empty($request->sifre)) {
                if ($request->isim!='' && $request->eposta!='' && $request->telefon!='' && $request->adres!='') {
                    Veliler::whereId($request->id)->update([
                        'isim' => $request->isim,
                        'eposta' => $request->eposta,
                        'telefon' => $request->telefon,
                        'sifre' => md5(sha1($request->sifre)),
                        'adres' => $request->adres,
                        'durum' => $request->durum,
                    ]);

                    Sistemkullanicilari::whereEposta($request->eposta)->update([
                        'isim' => $request->isim,
                        'eposta' => $request->eposta,
                        'telefon' => $request->telefon,
                        'parola' => md5(sha1($request->sifre)),
                        'yetki' => 5,
                        'durum' => $request->durum,
                    ]);
                    return redirect()->back()->with('success', 'Kayıt Ekleme Başarılı');
                }
            } else {
                if ($request->isim!='' && $request->eposta!='' && $request->telefon!='' && $request->adres!='') {
                    Veliler::whereId($request->id)->update([
                        'isim' => $request->isim,
                        'eposta' => $request->eposta,
                        'telefon' => $request->telefon,
                        'adres' => $request->adres,
                        'durum' => $request->durum,
                    ]);

                    Sistemkullanicilari::whereEposta($request->eposta)->update([
                        'isim' => $request->isim,
                        'eposta' => $request->eposta,
                        'telefon' => $request->telefon,
                        'yetki' => 5,
                        'durum' => $request->durum,
                    ]);
                    return redirect()->back()->with('success', 'Kayıt Ekleme Başarılı');
                }
            }
        }
    }

    // Toplu Ekle


    public function topluveliekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.topluveliekle');
        } else {
            return redirect('login');
        }
    }

    public function ornekveliexcel() {
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile('assets/upload/excel/velilerexcel.xlsx');
        return redirect()->back();
    }

    public function topluveliyiekle(Request $request) {
        if (isset($request->excelveli) && !empty($request->excelveli)) {

            $excelAdi=time().rand(0,1000).'.'.$request->excelveli->getClientOriginalExtension();
            $yukle=$request->excelveli->move('assets/upload/excel/',$excelAdi);

            if ($xlsx=SimpleXLSX::parse('assets/upload/excel/'.$excelAdi)) {
                foreach ($xlsx->rows() as $key => $satir) {
                    if ($key!=0) {
                        $control = sistemkullanicilari::whereEposta($satir[1])->first();
                        if (isset($control) && !empty($control)) {
                            $filtre = 'Bazı epostalar Kullanılıyor';
                        } else {
                            $ogrenciExcel = explode(",", $satir[5]);

                            foreach ($ogrenciExcel as $key => $ogrenciAd) {
                                $ogrenciler = Ogrenciler::where('isim',$ogrenciAd)->first();
                                if ($ogrenciler!=NULL) {
                                $ogrenci[$key] = $ogrenciler['id'];
                                }
                            }

                            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();

                            if (isset($ogrenci) && !empty($ogrenci)) {
                                Veliler::create([
                                    'isim' => $satir[0],
                                    'eposta' => $satir[1],
                                    'telefon' => $satir[2],
                                    'adres' => $satir[4],
                                    'ogrenciId' => json_encode($ogrenci),
                                    'sifre' => md5(sha1($satir[3])),
                                    'durum' => 1,
                                    'kurum' => $kurum->kurum,
                                ]);
                                Sistemkullanicilari::create([
                                    'isim' => $satir[0],
                                    'eposta' => $satir[1],
                                    'telefon' => $satir[2],
                                    'parola' => md5(sha1($satir[3])),
                                    'yetki' => 5,
                                    'durum' => 1,
                                ]);
                            } else {
                                return redirect()->back()->with('error', 'Bazı Öğrenciler Bulunamadı');
                            }
                        }
                    }
                }
                if (isset($filtre) && !empty($filtre)) {
                    return redirect()->back()->with('error', $filtre);
                }
                return redirect()->back()->with('success', 'Veli Oluşturma Başarılı');
            } else {
                echo SimpleXLSX::parseError();
            }

        } else {
            return redirect()->back()->with('error', 'Lütfen Bir Dosya Seçin');
        }
    }
}
