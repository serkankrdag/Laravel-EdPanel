<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kurumlar;
use App\Models\Ogrenciler;
use App\Models\Ogretmenler;
use App\Models\Etkinlikler;
use App\Models\Videolar;
use App\Models\Sliderlar;
use App\Models\Bloglar;
use App\Models\Yemekmenu;
use App\Models\Yoneticiler;
use App\Models\Dersprogramlari;
use App\Models\Saatler;
use App\Models\Konular;
use App\Models\Siniflar;
use App\Models\Duyurular;
use App\Models\Gelenodev;

class HomeController extends Controller
{

    public function site() {
        return redirect('/site');
    }

    public function home() {
        if (session('yetki')==1) {
            return redirect('/adminhome');
        } elseif (session('yetki')==2) {
            return redirect('/yoneticihome');
        } elseif (session('yetki')==3) {
            return redirect('/ogretmenhome');
        } elseif (session('yetki')==4) {
            return redirect('/ogrencihome');
        } else {
            return redirect('/login');
        }
    }

    public function admin() {
        if (session('successful')  == "successful" && session('yetki') == 1) {
            $ucret=0;
            $kurumlar = kurumlar::all();
            foreach ($kurumlar as $kurum) {
                $ucret += (int) $kurum['ucret'];
            }
            $ogrenciler = Ogrenciler::all();
            $ogretmenler = Ogretmenler::all();
            return view('include.admin.home',array('kurumlar'=>$kurumlar, 'ucret'=>$ucret, 'ogrenciler'=>$ogrenciler, 'ogretmenler'=>$ogretmenler));
        } else {
            return redirect('login');
        }
    }

    public function yonetici() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $ogrenciler = Ogrenciler::where('kurum',$kurum['kurum'])->get();
            $ogretmenler = Ogretmenler::where('kurum',$kurum['kurum'])->get();
            $etkinlikler = Etkinlikler::where('kurum',$kurum['kurum'])->get();
            $videolar = Videolar::where('kurum',$kurum['kurum'])->get();
            $bloglar = Bloglar::where('kurum',$kurum['kurum'])->get();
            $yemekmenu = Yemekmenu::where('kurum',$kurum['kurum'])->first();
            $slider = Sliderlar::where('kurum',$kurum['kurum'])->first();
            return view('include.yonetici.home',array('ogrenciler'=>$ogrenciler, 'ogretmenler'=>$ogretmenler, 'yemekmenu'=>$yemekmenu, 'bloglar'=>$bloglar, 'etkinlikler'=>$etkinlikler, 'videolar'=>$videolar, 'slider'=>$slider));
        } else {
            return redirect('login');
        }
    }

    public function ogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
            $saatler = Saatler::where('kurum',$kurum['kurum'])->get();
            $ogrenciler = Ogrenciler::where('kurum',$kurum['kurum'])->get();
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $duyurular = Duyurular::where('kurum',$kurum['kurum'])->get();
            $gelenodevler = Gelenodev::where('kurum',$kurum['kurum'])->get();
            $yemekmenu = Yemekmenu::where('kurum',$kurum['kurum'])->first();
            $sliderlar = Sliderlar::where('kurum',$kurum['kurum'])->get();
            $programlar = Dersprogramlari::where('kurum',$kurum['kurum'])->where('ogretmenId',$kurum['id'])->get();
            return view('include.ogretmen.home',array('sliderlar'=>$sliderlar,'ogretmen'=>$kurum,'programlar'=>$programlar,'ogrenciler'=>$ogrenciler,'saatler'=>$saatler,'gelenodevler'=>$gelenodevler,'konular'=>$konular,'siniflar'=>$siniflar,'duyurular'=>$duyurular, 'yemekmenu'=>$yemekmenu));
        } else {
            return redirect('login');
        }
    }

    public function ogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $kurum = Ogrenciler::where('id',session('ogrenci'))->first();
            $saatler = Saatler::where('kurum',$kurum['kurum'])->get();
            $ogrenciler = Ogrenciler::where('kurum',$kurum['kurum'])->get();
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $duyurular = Duyurular::where('kurum',$kurum['kurum'])->get();
            $gelenodevler = Gelenodev::where('kurum',$kurum['kurum'])->get();
            $yemekmenu = Yemekmenu::where('kurum',$kurum['kurum'])->first();
            $sliderlar = Sliderlar::where('kurum',$kurum['kurum'])->get();
            $programlar = Dersprogramlari::where('kurum',$kurum['kurum'])->where('sinifId',$kurum['sinifId'])->get();
            return view('include.ogrenci.home',array('sliderlar'=>$sliderlar,'ogretmen'=>$kurum,'programlar'=>$programlar,'ogrenciler'=>$ogrenciler,'saatler'=>$saatler,'gelenodevler'=>$gelenodevler,'konular'=>$konular,'siniflar'=>$siniflar,'duyurular'=>$duyurular, 'yemekmenu'=>$yemekmenu));
        } else {
            return redirect('login');
        }
    }

}
