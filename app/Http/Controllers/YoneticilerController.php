<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kurumlar;
use App\Models\Yoneticiler;
use App\Models\Sistemkullanicilari;

class YoneticilerController extends Controller
{

    public function yoneticisil() {
        $id=$_GET['id'];
        Yoneticiler::where('id',$id)->delete();
        return redirect()->back();
    }

    public function liste() {
        if (session('successful')  == "successful" && session('yetki') == 1) {
            $yoneticiler = yoneticiler::all();
            $kurumlar = kurumlar::all();
            $kullanicilar = Sistemkullanicilari::all();
            return view('include.admin.yoneticiler',array('yoneticiler'=>$yoneticiler,'kullanicilar'=>$kullanicilar,'kurumlar'=>$kurumlar));
        } else {
            return redirect('login');
        }
    }

    public function ekle() {
        if (session('successful')  == "successful" && session('yetki') == 1) {
            $kurumlar = kurumlar::all();
            return view('include.admin.yoneticiekle',array('kurumlar'=>$kurumlar));
        } else {
            return redirect('login');
        }
    }

    public function duzenle() {
        if (session('successful')  == "successful" && session('yetki') == 1) {
            $id=$_GET['id'];
            $kurumlar = kurumlar::all();
            $yonetici = yoneticiler::find($id);
            $kurumsec = kurumlar::find($yonetici['kurumId']);
            $kullanici = sistemkullanicilari::find($yonetici['kullaniciId']);
            return view('include.admin.yoneticiduzenle',array('kurumlar'=>$kurumlar,'kurumsec'=>$kurumsec,'yonetici'=>$yonetici,'kullanici'=>$kullanici));
        } else {
            return redirect('login');
        }
    }

    public function yoneticiekle(Request $request) {
        if ($request->kurum!='' && $request->eposta!='' && $request->parola!='' && $request->durum!='' && $request->isim!='' && $request->telefon!='') {
            $control = sistemkullanicilari::whereEposta($request->eposta)->first();
            if (isset($control) && !empty($control)) {
                return redirect()->back()->with('error', 'Girilen Eposta Adresi Kullanılıyor');
            } else {
                if (isset($request->avatar) && !empty($request->avatar)) {
                    $avatarAdi=time().rand(0,1000).'.'.$request->avatar->getClientOriginalExtension();
                    $yukle=$request->avatar->move('assets/upload/avatar/',$avatarAdi);
                    sistemkullanicilari::create([
                        'isim' => $request->isim,
                        'eposta' => $request->eposta,
                        'parola' => md5(sha1($request->parola)),
                        'durum' => $request->durum,
                        'telefon' => $request->telefon,
                        'resim' => $avatarAdi,
                        'yetki' => 2,
                    ]);
                    $yonetici = sistemkullanicilari::whereEposta($request->eposta)->first();
                    if (isset($yonetici) && !empty($yonetici)) {
                        yoneticiler::create([
                            'kurumId' => $request->kurum,
                            'kullaniciId' => $yonetici['id'],
                            'eposta' => $request->eposta,
                            'parola' => md5(sha1($request->parola)),
                            'durum' => $request->durum,
                            'kurum' => $request->kurum,
                        ]);
                        return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
                    }else {
                        return redirect()->back()->with('error', 'Bir Sorun Oluştu Lütfen Tekrar Deneyin');
                    }
                } else {
                    sistemkullanicilari::create([
                        'isim' => $request->isim,
                        'eposta' => $request->eposta,
                        'parola' => md5(sha1($request->parola)),
                        'durum' => $request->durum,
                        'telefon' => $request->telefon,
                        'resim' => 'yok',
                        'yetki' => 2,
                    ]);
                    $yonetici = sistemkullanicilari::whereEposta($request->eposta)->first();
                    if (isset($yonetici) && !empty($yonetici)) {
                        yoneticiler::create([
                            'kurumId' => $request->kurum,
                            'kullaniciId' => $yonetici['id'],
                            'eposta' => $request->eposta,
                            'parola' => md5(sha1($request->parola)),
                            'durum' => $request->durum,
                            'kurum' => $request->kurum,
                        ]);
                        return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
                    }else {
                        return redirect()->back()->with('error', 'Bir Sorun Oluştu Lütfen Tekrar Deneyin');
                    }
                }
            }

        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }

    public function yoneticiduzenle(Request $request) {
        if (isset($request->parola) && !empty($request->parola)) {
            if (isset($request->avatar) && !empty($request->avatar)) {
                $avatarAdi=time().rand(0,1000).'.'.$request->avatar->getClientOriginalExtension();
                $yukle=$request->avatar->move('assets/upload/avatar/',$avatarAdi);
                sistemkullanicilari::whereId($request->kullaniciId)->update([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'parola' => md5(sha1($request->parola)),
                    'durum' => $request->durum,
                    'telefon' => $request->telefon,
                    'resim' => $avatarAdi,
                    'yetki' => 2,
                ]);
                $yonetici = sistemkullanicilari::whereEposta($request->eposta)->first();
                if (isset($yonetici) && !empty($yonetici)) {
                    yoneticiler::whereId($request->yoneticiId)->update([
                        'kurumId' => $request->kurum,
                        'kullaniciId' => $yonetici['id'],
                        'eposta' => $request->eposta,
                        'parola' => md5(sha1($request->parola)),
                        'durum' => $request->durum,
                    ]);
                    return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
                }else {
                    return redirect()->back()->with('error', 'Bir Sorun Oluştu Lütfen Tekrar Deneyin');
                }
            } else {
                sistemkullanicilari::whereId($request->kullaniciId)->update([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'parola' => md5(sha1($request->parola)),
                    'durum' => $request->durum,
                    'telefon' => $request->telefon,
                    'yetki' => 2,
                ]);
                $yonetici = sistemkullanicilari::whereEposta($request->eposta)->first();
                if (isset($yonetici) && !empty($yonetici)) {
                    yoneticiler::whereId($request->yoneticiId)->update([
                        'kurumId' => $request->kurum,
                        'kullaniciId' => $yonetici['id'],
                        'eposta' => $request->eposta,
                        'parola' => md5(sha1($request->parola)),
                        'durum' => $request->durum,
                    ]);
                    return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
                }else {
                    return redirect()->back()->with('error', 'Bir Sorun Oluştu Lütfen Tekrar Deneyin');
                }
            }
        } else {
            if (isset($request->avatar) && !empty($request->avatar)) {
                $avatarAdi=time().rand(0,1000).'.'.$request->avatar->getClientOriginalExtension();
                $yukle=$request->avatar->move('assets/upload/avatar/',$avatarAdi);
                sistemkullanicilari::whereId($request->kullaniciId)->update([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'durum' => $request->durum,
                    'telefon' => $request->telefon,
                    'resim' => $avatarAdi,
                    'yetki' => 2,
                ]);
                $yonetici = sistemkullanicilari::whereEposta($request->eposta)->first();
                if (isset($yonetici) && !empty($yonetici)) {
                    yoneticiler::whereId($request->yoneticiId)->update([
                        'kurumId' => $request->kurum,
                        'kullaniciId' => $yonetici['id'],
                        'eposta' => $request->eposta,
                        'durum' => $request->durum,
                    ]);
                    return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
                }else {
                    return redirect()->back()->with('error', 'Bir Sorun Oluştu Lütfen Tekrar Deneyin');
                }
            } else {
                sistemkullanicilari::whereId($request->kullaniciId)->update([
                    'isim' => $request->isim,
                    'eposta' => $request->eposta,
                    'durum' => $request->durum,
                    'telefon' => $request->telefon,
                    'yetki' => 2,
                ]);
                $yonetici = sistemkullanicilari::whereEposta($request->eposta)->first();
                if (isset($yonetici) && !empty($yonetici)) {
                    yoneticiler::whereId($request->yoneticiId)->update([
                        'kurumId' => $request->kurum,
                        'kullaniciId' => $yonetici['id'],
                        'eposta' => $request->eposta,
                        'durum' => $request->durum,
                    ]);
                    return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
                }else {
                    return redirect()->back()->with('error', 'Bir Sorun Oluştu Lütfen Tekrar Deneyin');
                }
            }
        }
    }
}
