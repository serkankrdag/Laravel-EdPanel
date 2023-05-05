<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ogretmenler;
use App\Models\Siniflar;
use App\Models\Konular;
use App\Models\Sistemkullanicilari;
use App\Models\Yoneticiler;
use App\Models\Ogrenciler;

class OgretmenlerController extends Controller
{
    public function ogretmensil() {
        $id=$_GET['id'];
        Ogretmenler::where('id',$id)->delete();
        return redirect()->back();
    }

    public function ogretmenler() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $ogretmenler = Ogretmenler::where('kurum',$kurum['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.ogretmenler',array('siniflar'=>$siniflar,'ogretmenler'=>$ogretmenler));
        } else {
            return redirect('login');
        }
    }

    public function ogretmenlerogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $kurum = Ogrenciler::where('id',session('ogrenci'))->first();
            $sinifim = $kurum['sinifId'];
            $ogretmenler = Ogretmenler::where('kurum',$kurum['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.ogrenci.ogretmenler',array('siniflar'=>$siniflar,'ogretmenler'=>$ogretmenler,'sinifim'=>$sinifim));
        } else {
            return redirect('login');
        }
    }

    public function ogretmenekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.ogretmenekle',array('siniflar'=>$siniflar,'konular'=>$konular));
        } else {
            return redirect('login');
        }
    }

    public function ogretmenduzenle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $id=$_GET['id'];
            $ogretmen = Ogretmenler::find($id);
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.ogretmenduzenle',array('siniflar'=>$siniflar,'konular'=>$konular,'ogretmen'=>$ogretmen));
        } else {
            return redirect('login');
        }
    }

    public function ogretmeniekle(Request $request) {
        $control = sistemkullanicilari::whereEposta($request->eposta)->first();
        if (isset($control) && !empty($control)) {
            return redirect()->back()->with('error', 'Girilen Eposta Kullanımda');
        } else {
            if ($request->isim!='' && $request->eposta!='' && $request->sinif!='' && $request->konu!='' && $request->telefon!=''  && $request->sifre!='' && $request->durum!='') {

                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();

                Ogretmenler::create([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'sinif' => json_encode($request->sinif),
                    'konu' => json_encode($request->konu),
                    'telefon' => $request->telefon,
                    'sifre' => md5(sha1($request->sifre)),
                    'durum' => $request->durum,
                    'kurum' => $kurum->kurum,
                ]);

                Sistemkullanicilari::create([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'telefon' => $request->telefon,
                    'resim' => 'yok',
                    'parola' => md5(sha1($request->sifre)),
                    'yetki' => 3,
                    'durum' => $request->durum,
                ]);
                return redirect()->back()->with('success', 'Öğretmen Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }

    public function ogretmeniduzenle(Request $request) {
        if (isset($request->sifre) && !empty($request->sifre)) {
            if ($request->isim!='' && $request->eposta!='' && $request->sinif!='' && $request->konu!='' && $request->telefon!='' && $request->durum!='') {
                Ogretmenler::whereId($request->id)->update([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'sinif' => json_encode($request->sinif),
                    'konu' => json_encode($request->konu),
                    'telefon' => $request->telefon,
                    'sifre' => md5(sha1($request->sifre)),
                    'durum' => $request->durum,
                ]);
                Sistemkullanicilari::whereEposta($request->eposta)->update([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'telefon' => $request->telefon,
                    'parola' => md5(sha1($request->sifre)),
                    'yetki' => 3,
                    'durum' => $request->durum,
                ]);
                return redirect()->back()->with('success', 'Öğretmen Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        } else {
            if ($request->isim!='' && $request->eposta!='' && $request->sinif!='' && $request->konu!='' && $request->telefon!='' && $request->durum!='') {
                Ogretmenler::whereId($request->id)->update([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'sinif' => json_encode($request->sinif),
                    'konu' => json_encode($request->konu),
                    'telefon' => $request->telefon,
                    'durum' => $request->durum,
                ]);

                Sistemkullanicilari::whereEposta($request->eposta)->update([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'telefon' => $request->telefon,
                    'yetki' => 3,
                    'durum' => $request->durum,
                ]);
                return redirect()->back()->with('success', 'Öğretmen Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }




    // Toplu Ekle


    public function topluogretmenekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.topluogretmenekle');
        } else {
            return redirect('login');
        }
    }

    public function ornekogretmenexcel() {
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile('assets/upload/excel/ogretmenlerexcel.xlsx');
        return redirect()->back();
    }

    public function topluogretmeniekle(Request $request) {
        if (isset($request->excelogretmen) && !empty($request->excelogretmen)) {

            $excelAdi=time().rand(0,1000).'.'.$request->excelogretmen->getClientOriginalExtension();
            $yukle=$request->excelogretmen->move('assets/upload/excel/',$excelAdi);

            if ($xlsx=SimpleXLSX::parse('assets/upload/excel/'.$excelAdi)) {
                foreach ($xlsx->rows() as $key => $satir) {
                    if ($key!=0) {
                        $control = sistemkullanicilari::whereEposta($satir[1])->first();
                        if (isset($control) && !empty($control)) {
                            $filtre = 'Bazı epostalar Kullanılıyor';
                        } else {

                            $sinifExcel = explode(",", $satir[4]);
                            $konuExcel = explode(",", $satir[5]);


                            foreach ($sinifExcel as $key => $sinifAd) {
                                $siniflar = Siniflar::where('isim',$sinifAd)->first();
                                if ($siniflar!=NULL) {
                                    $sinif[$key] = $siniflar['id'];
                                }
                            }

                            foreach ($konuExcel as $key => $konuAd) {
                                $konular = Konular::where('isim',$konuAd)->first();
                                if ($konular!=NULL) {
                                    $konu[$key] = $konular['id'];
                                }
                            }

                            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();

                            if (isset($konu) && !empty($konu)) {
                                if (isset($sinif) && !empty($sinif)) {
                                    Ogretmenler::create([
                                        'isim' => $satir[0],
                                        'eposta' => $satir[1],
                                        'telefon' => $satir[2],
                                        'sifre' => md5(sha1($satir[3])),
                                        'durum' => 1,
                                        'sinif' => json_encode($sinif),
                                        'konu' => json_encode($konu),
                                        'kurum' => $kurum->kurum,
                                    ]);
                                    Sistemkullanicilari::create([
                                        'isim' => $satir[0],
                                        'eposta' => $satir[1],
                                        'telefon' => $satir[2],
                                        'parola' => md5(sha1($satir[3])),
                                        'yetki' => 3,
                                        'durum' => 1,
                                    ]);
                                } else {
                                    Ogretmenler::create([
                                        'isim' => $satir[0],
                                        'eposta' => $satir[1],
                                        'telefon' => $satir[2],
                                        'sifre' => md5(sha1($satir[3])),
                                        'durum' => 1,
                                        'konu' => json_encode($konu),
                                        'kurum' => $kurum->kurum,
                                    ]);
                                    Sistemkullanicilari::create([
                                        'isim' => $satir[0],
                                        'eposta' => $satir[1],
                                        'telefon' => $satir[2],
                                        'parola' => md5(sha1($satir[3])),
                                        'yetki' => 3,
                                        'durum' => 1,
                                    ]);
                                }
                            } elseif (isset($sinif) && !empty($sinif)) {
                                Ogretmenler::create([
                                    'isim' => $satir[0],
                                    'eposta' => $satir[1],
                                    'telefon' => $satir[2],
                                    'sifre' => md5(sha1($satir[3])),
                                    'durum' => 1,
                                    'sinif' => json_encode($sinif),
                                    'kurum' => $kurum->kurum,
                                ]);
                                Sistemkullanicilari::create([
                                    'isim' => $satir[0],
                                    'eposta' => $satir[1],
                                    'telefon' => $satir[2],
                                    'parola' => md5(sha1($satir[3])),
                                    'yetki' => 3,
                                    'durum' => 1,
                                ]);
                            } else {
                                Ogretmenler::create([
                                    'isim' => $satir[0],
                                    'eposta' => $satir[1],
                                    'telefon' => $satir[2],
                                    'sifre' => md5(sha1($satir[3])),
                                    'durum' => 1,
                                    'kurum' => $kurum->kurum,
                                ]);
                                Sistemkullanicilari::create([
                                    'isim' => $satir[0],
                                    'eposta' => $satir[1],
                                    'telefon' => $satir[2],
                                    'parola' => md5(sha1($satir[3])),
                                    'yetki' => 3,
                                    'durum' => 1,
                                ]);
                            }
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
