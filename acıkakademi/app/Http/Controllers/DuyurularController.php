<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Duyurular;
use App\Models\Siniflar;
use App\Models\Yoneticiler;

class DuyurularController extends Controller
{
    public function duyurusil() {
        $id=$_GET['id'];
        Duyurular::where('id',$id)->delete();
        return redirect()->back();
    }

    public function duyurular() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $duyurular = Duyurular::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.duyurular',array('duyurular'=>$duyurular));
        } else {
            return redirect('login');
        }
    }

    public function duyuruekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.duyuruekle',array('siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function duyuruduzenle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $id=$_GET['id'];
            $duyuru = Duyurular::find($id);
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.duyuruduzenle',array('duyuru'=>$duyuru,'siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function duyuruyuekle(Request $request) {
        if ($request->baslik!='' && $request->duyuru!='' && $request->sinif!='' && $request->grup!='' && $request->durum!='') {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            Duyurular::create([
                'baslik' => $request->baslik,
                'duyuru' => $request->duyuru,
                'sinifId' => json_encode($request->sinif),
                'grup' => json_encode($request->grup),
                'durum' => $request->durum,
                'kurum' => $kurum->kurum,
            ]);
            return redirect()->back()->with('success', 'Duyuru Oluşturma Başarılı');
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }

    public function duyuruyuduzenle(Request $request) {
        if (isset($request->sinif) && !empty($request->sinif)) {
            if (isset($request->grup) && !empty($request->grup)) {
                if ($request->baslik!='' && $request->duyuru!='' && $request->sinif!='' && $request->grup!='' && $request->durum!='') {
                    Duyurular::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'duyuru' => $request->duyuru,
                        'sinifId' => json_encode($request->sinif),
                        'grup' => json_encode($request->grup),
                        'durum' => $request->durum,
                    ]);
                    return redirect()->back()->with('success', 'Duyuru Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            } else {
                if ($request->baslik!='' && $request->duyuru!='' && $request->sinif!='' && $request->durum!='') {
                    Duyurular::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'duyuru' => $request->duyuru,
                        'sinifId' => json_encode($request->sinif),
                        'durum' => $request->durum,
                    ]);
                    return redirect()->back()->with('success', 'Duyuru Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            }
        } elseif (isset($request->grup) && !empty($request->grup)) {
            if ($request->baslik!='' && $request->duyuru!='' && $request->grup!='' && $request->durum!='') {
                Duyurular::whereId($request->id)->update([
                    'baslik' => $request->baslik,
                    'duyuru' => $request->duyuru,
                    'grup' => json_encode($request->grup),
                    'durum' => $request->durum,
                ]);
                return redirect()->back()->with('success', 'Duyuru Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        } else {
            if ($request->baslik!='' && $request->duyuru!='' && $request->durum!='') {
                Duyurular::whereId($request->id)->update([
                    'baslik' => $request->baslik,
                    'duyuru' => $request->duyuru,
                    'durum' => $request->durum,
                ]);
                return redirect()->back()->with('success', 'Duyuru Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }
}
