<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Cookie;
use Illuminate\Http\Request;
use App\Models\Sistemkullanicilari;
use App\Models\Girisslider;
use App\Models\Yoneticiler;
use App\Models\Ogretmenler;
use App\Models\Ogrenciler;

class LoginController extends Controller
{

    public function login() {
        if (session('successful')  != "successful") {
            $girisslider = girisslider::find(1);
            return view('login',array('girisslider'=>$girisslider));
        } else {
            return redirect('/home');
        }
    }

    public function logout() {
        if (session()->has('successful') || session()->has('error')) {
            session()->pull('successful');
            session()->pull('error');
        }
        return redirect('login');
    }

    public function decision(Request $request) {

        $control = sistemkullanicilari::whereEposta($request->eposta)->first();
        $ogretmen = Ogretmenler::whereEposta($request->eposta)->first();
        $ogrenci = Ogrenciler::whereEposta($request->eposta)->first();

        if (isset($request->eposta) && !empty($request->eposta)) {
            if (isset($request->parola) && !empty($request->parola)) {
                if (isset($control) && !empty($control)) {
                    if ($control->parola==md5(sha1($request->parola))) {

                        $request->session()->put('id',$control->id);
                        $request->session()->put('isim',$control->isim);
                        $request->session()->put('eposta',$control->eposta);
                        $request->session()->put('telefon',$control->telefon);
                        $request->session()->put('resim',$control->resim);
                        $request->session()->put('yetki',$control->yetki);
                        $request->session()->put('durum',$control->durum);

                        \Cookie::queue('mail',$request->eposta,3600);
                        \Cookie::queue('sifre',$request->parola,3600);

                        //setcookie('mail',$request->eposta,time()+1800);
                        //setcookie('sifre',$request->parola,time()+1800);

                        if (isset($ogretmen) && !empty($ogretmen)) {
                            $request->session()->put('ogretmen',$ogretmen->id);
                        }
                        if (isset($ogrenci) && !empty($ogrenci)) {
                            $request->session()->put('ogrenci',$ogrenci->id);
                        }



                        if (session()->has('error')) {
                            session()->pull('error');
                        }
                        $request->session()->put('successful','successful');
                        return redirect('/home');

                    } else {
                        return redirect()->back()->with('error', 'Kullanıcı Adı Veya Şifre Hatalı');
                    }
                } else {
                    return redirect()->back()->with('error', 'Kullanıcı Adı Veya Şifre Hatalı');
                }
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }

}
