<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yoneticiler;
use App\Models\Sistemkullanicilari;
use App\Models\Kurumlar;

class YoneticileryonetimController extends Controller
{
    public function yoneticisil() {
        $id=$_GET['id'];
        Yoneticiler::where('id',$id)->delete();
        return redirect()->back();
    }

    public function yoneticileryonetim() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $yonetici = Yoneticiler::where('kullaniciId',session('id'))->first();
            $yoneticiler = Yoneticiler::where('kurumId',$yonetici['kurumId'])->get();
            $kullanicilar = sistemkullanicilari::all();
            return view('include.yonetici.yoneticiler', array('yoneticiler'=>$yoneticiler,'kullanicilar'=>$kullanicilar));
        } else {
            return redirect('login');
        }
    }

    public function yoneticiyonetimekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.yoneticiekle');
        } else {
            return redirect('login');
        }
    }

    public function yoneticiyonetimduzenle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $id=$_GET['id'];
            $yonetici = Yoneticiler::where('id',$id)->first();
            $kullanici = sistemkullanicilari::where('id',$yonetici['kullaniciId'])->first();
            return view('include.yonetici.yoneticiduzenle', array('yonetici'=>$yonetici,'kullanici'=>$kullanici));
        } else {
            return redirect('login');
        }
    }

    public function yoneticiyonetimiekle(Request $request) {
        if ($request->isim!='' && $request->eposta!='' && $request->sifre!='' && $request->durum!='') {
            $control = sistemkullanicilari::whereEposta($request->eposta)->first();
            if (isset($control) && !empty($control)) {
                return redirect()->back()->with('error', 'Girilen Eposta Adresi Kullanımda');
            } else {
                sistemkullanicilari::create([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'resim' => 'yok',
                    'parola' => md5(sha1($request->sifre)),
                    'durum' => $request->durum,
                    'yetki' => 2,
                ]);
                $yonetici = sistemkullanicilari::whereEposta($request->eposta)->first();
                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                if (isset($yonetici) && !empty($yonetici)) {
                    yoneticiler::create([
                        'kurumId' => $kurum->kurumId,
                        'kullaniciId' => $yonetici['id'],
                        'eposta' => $request->eposta,
                        'parola' => md5(sha1($request->parola)),
                        'durum' => $request->durum,
                        'kurum' => $kurum->kurumId,
                        'resim' => 'yok',
                    ]);
                    return redirect()->back()->with('success', 'Kayıt Ekleme Başarılı');
                }
            }
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }

    public function yoneticiyonetimiduzenle(Request $request) {
        if (isset($request->sifre) && !empty($request->sifre)) {
            if ($request->isim!='' && $request->eposta!='' && $request->durum!='') {
                sistemkullanicilari::whereId($request->kullaniciId)->update([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'parola' => md5(sha1($request->sifre)),
                    'durum' => $request->durum,
                    'yetki' => 2,
                ]);
                $yonetici = sistemkullanicilari::whereEposta($request->eposta)->first();
                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                if (isset($yonetici) && !empty($yonetici)) {
                    yoneticiler::whereId($request->yoneticiId)->update([
                        'kurumId' => $kurum->kurumId,
                        'kullaniciId' => $yonetici['id'],
                        'eposta' => $request->eposta,
                        'parola' => md5(sha1($request->parola)),
                        'durum' => $request->durum,
                        'kurum' => $kurum->kurumId,
                    ]);
                    return redirect()->back()->with('success', 'Kayıt Ekleme Başarılı');
                }
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        } else {
            if ($request->isim!='' && $request->eposta!='' && $request->durum!='') {
                sistemkullanicilari::whereId($request->kullaniciId)->update([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'durum' => $request->durum,
                    'yetki' => 2,
                ]);
                $yonetici = sistemkullanicilari::whereEposta($request->eposta)->first();
                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                if (isset($yonetici) && !empty($yonetici)) {
                    yoneticiler::whereId($request->yoneticiId)->update([
                        'kurumId' => $kurum->kurumId,
                        'kullaniciId' => $yonetici['id'],
                        'eposta' => $request->eposta,
                        'durum' => $request->durum,
                        'kurum' => $kurum->kurumId,
                    ]);
                    return redirect()->back()->with('success', 'Kayıt Ekleme Başarılı');
                }
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }
}
