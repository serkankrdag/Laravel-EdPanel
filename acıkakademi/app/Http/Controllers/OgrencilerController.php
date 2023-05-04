<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ogrenciler;
use App\Models\Ogretmenler;
use App\Models\Siniflar;
use App\Models\Sistemkullanicilari;
use App\Models\Yoneticiler;

class OgrencilerController extends Controller
{
    public function ogrencisil() {
        $id=$_GET['id'];
        Ogrenciler::where('id',$id)->delete();
        return redirect()->back();
    }

    public function ogrencilerogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $ogretmen = Ogretmenler::where('eposta',session('eposta'))->first();
            $ogrenciler = Ogrenciler::where('kurum',$ogretmen['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$ogretmen['kurum'])->get();
            return view('include.ogretmen.ogrenciler', array('ogrenciler'=>$ogrenciler,'siniflar'=>$siniflar,'ogretmen'=>$ogretmen));
        } else {
            return redirect('login');
        }
    }

    public function ogrenciler() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $ogrenciler = Ogrenciler::where('kurum',$kurum['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.ogrenciler', array('ogrenciler'=>$ogrenciler,'siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function ogrenciekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.ogrenciekle', array('siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function ogrenciduzenle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $id=$_GET['id'];
            $ogrenci = Ogrenciler::find($id);
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.ogrenciduzenle', array('ogrenci'=>$ogrenci,'siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function ogrenciyiekle(Request $request) {
        if ($request->isim!='' && $request->eposta!='' && $request->sinif!='' && $request->sifre!='' && $request->durum!='') {
            $control = sistemkullanicilari::whereEposta($request->eposta)->first();
            if (isset($control) && !empty($control)) {
                return redirect()->back()->with('error', 'Girilen Eposta Kullanımda');
            } else {

                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();

                Ogrenciler::create([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'telefon' => $request->telefon,
                    'sinifId' => $request->sinif,
                    'sifre' => md5(sha1($request->sifre)),
                    'durum' => $request->durum,
                    'kurum' => $kurum->kurum,
                ]);

                Sistemkullanicilari::create([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'resim' => 'yok',
                    'parola' => md5(sha1($request->sifre)),
                    'durum' => $request->durum,
                    'yetki' => 4,
                ]);
                return redirect()->back()->with('success', 'Kayıt Ekleme Başarılı');
            }
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }

    public function ogrenciyiduzenle(Request $request) {
        if (isset($request->sifre) && !empty($request->sifre)) {
            if ($request->isim!='' && $request->eposta!='' && $request->sinif!='' && $request->sifre!='' && $request->durum!='') {
                Ogrenciler::whereId($request->id)->update([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'sinifId' => $request->sinif,
                    'sifre' => md5(sha1($request->sifre)),
                    'durum' => $request->durum,
                ]);

                Sistemkullanicilari::whereEposta($request->eposta)->update([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'parola' => md5(sha1($request->sifre)),
                    'durum' => $request->durum,
                    'yetki' => 4,
                ]);
                return redirect()->back()->with('success', 'Kayıt Ekleme Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        } else {
            if ($request->isim!='' && $request->eposta!='' && $request->sinif!='' && $request->durum!='') {
                Ogrenciler::whereId($request->id)->update([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'sinifId' => $request->sinif,
                    'durum' => $request->durum,
                ]);

                Sistemkullanicilari::whereEposta($request->eposta)->update([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'durum' => $request->durum,
                    'yetki' => 4,
                ]);
                return redirect()->back()->with('success', 'Kayıt Ekleme Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }






    // Toplu Ekle


    public function topluogrenciekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.topluogrenciekle');
        } else {
            return redirect('login');
        }
    }

    public function ornekogrenciexcel() {
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile('assets/upload/excel/ogrencilerexcel.xlsx');
        return redirect()->back();
    }

    public function topluogrenciyiekle(Request $request) {
        if (isset($request->excelogrenci) && !empty($request->excelogrenci)) {

            $excelAdi=time().rand(0,1000).'.'.$request->excelogrenci->getClientOriginalExtension();
            $yukle=$request->excelogrenci->move('assets/upload/excel/',$excelAdi);

            if ($xlsx=SimpleXLSX::parse('assets/upload/excel/'.$excelAdi)) {
                foreach ($xlsx->rows() as $key => $satir) {
                    if ($key!=0) {
                        $control = sistemkullanicilari::whereEposta($satir[1])->first();
                        if (isset($control) && !empty($control)) {
                            $filtre = 'Bazı epostalar Kullanılıyor';
                        } else {
                            $sinif = Siniflar::where('isim',$satir[4])->first();
                            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                            Ogrenciler::create([
                                'isim' => $satir[0],
                                'eposta' => $satir[1],
                                'telefon' => $satir[2],
                                'sifre' => md5(sha1($satir[3])),
                                'sinifId' => $sinif['id'],
                                'durum' => 1,
                                'kurum' => $kurum->kurum,
                            ]);
                            Sistemkullanicilari::create([
                                'isim' => $satir[0],
                                'eposta' => $satir[1],
                                'telefon' => $satir[2],
                                'parola' => md5(sha1($satir[3])),
                                'yetki' => 4,
                                'resim' => 'yok',
                                'durum' => 1,
                            ]);
                        }
                    }
                }
                if (isset($filtre) && !empty($filtre)) {
                    return redirect()->back()->with('error', $filtre);
                }
                return redirect()->back()->with('success', 'Öğretmen Oluşturma Başarılı');
            } else {
                echo SimpleXLSX::parseError();
            }

        } else {
            return redirect()->back()->with('error', 'Lütfen Bir Dosya Seçin');
        }
    }
}
