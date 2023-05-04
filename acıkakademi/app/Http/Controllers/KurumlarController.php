<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kurumlar;
use App\Models\Zoom;

class KurumlarController extends Controller
{
    public function kurumsil() {
        $id=$_GET['id'];
        Kurumlar::where('id',$id)->delete();
        return redirect()->back();
    }

    public function liste() {
        if (session('successful')  == "successful" && session('yetki') == 1) {
            $kurumlar = kurumlar::all();
            return view('include.admin.kurumlar',array('kurumlar'=>$kurumlar));
        } else {
            return redirect('login');
        }
    }

    public function ekle() {
        if (session('successful')  == "successful" && session('yetki') == 1) {
            return view('include.admin.kurumekle');
        } else {
            return redirect('login');
        }
    }

    public function duzenle() {
        if (session('successful')  == "successful" && session('yetki') == 1) {
            $id=$_GET['id'];
            $kurum = kurumlar::find($id);
            return view('include.admin.kurumduzenle',array('kurum'=>$kurum));
        } else {
            return redirect('login');
        }
    }

    public function kurumekle(Request $request) {
        if ($request->isim!='' && $request->sehir!='' && $request->eposta!='' && $request->lisansbitis!='' && $request->ucret!='' && $request->durum!='') {
            if (isset($request->logo) && !empty($request->logo)) {
                // logo var
                $logoAdi=time().rand(0,1000).'.'.$request->logo->getClientOriginalExtension();
                $yukle=$request->logo->move(public_path('assets/upload/logos/'),$logoAdi);

                kurumlar::create([
                    'isim' => $request->isim,
                    'lisansbitis' => $request->lisansbitis,
                    'ucret' => $request->ucret,
                    'sehir' => $request->sehir,
                    'mail' => $request->eposta,
                    'logo' => $logoAdi,
                    'durum' => $request->durum,
                ]);

                $kurum = Kurumlar::where('mail',$request->eposta)->first();

                Zoom::create([
                    'kurumId' => $kurum->id,
                ]);
                return redirect()->back()->with('success', 'Kayıt Ekleme Başarılı');

            } else {
                // logo yok
                kurumlar::create([
                    'isim' => $request->isim,
                    'lisansbitis' => $request->lisansbitis,
                    'ucret' => $request->ucret,
                    'sehir' => $request->sehir,
                    'mail' => $request->eposta,
                    'durum' => $request->durum,
                ]);

                $kurum = Kurumlar::where('mail',$request->eposta)->first();

                Zoom::create([
                    'kurumId' => $kurum->id,
                ]);
                return redirect()->back()->with('success', 'Kayıt Ekleme Başarılı');
            }
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }

    public function kurumduzenle(Request $request) {
        if (isset($request->logo) && !empty($request->logo)) {
            // logo var
            $logoAdi=time().rand(0,1000).'.'.$request->logo->getClientOriginalExtension();
            $yukle=$request->logo->move(public_path('assets/upload/logos/'),$logoAdi);

            kurumlar::whereId($request->kurumId)->update([
                'isim' => $request->isim,
                'lisansbitis' => $request->lisansbitis,
                'ucret' => $request->ucret,
                'sehir' => $request->sehir,
                'logo' => $logoAdi,
                'durum' => $request->durum,
            ]);
            return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');

        } else {
            // logo yok
            kurumlar::whereId($request->kurumId)->update([
                'isim' => $request->isim,
                'lisansbitis' => $request->lisansbitis,
                'ucret' => $request->ucret,
                'sehir' => $request->sehir,
                'durum' => $request->durum,
            ]);
            return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
        }
    }

}
