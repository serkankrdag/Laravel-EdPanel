<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kurumlar;
use App\Models\Yoneticiler;

class KurumyonetimController extends Controller
{
    public function kurumyonetimi() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $yonetici = Yoneticiler::where('kullaniciId',session('id'))->first();
            $kurum = Kurumlar::where('id',$yonetici['kurumId'])->first();
            return view('include.yonetici.kurumyonetimi', array('yonetici'=>$yonetici,'kurum'=>$kurum));
        } else {
            return redirect('login');
        }
    }

    public function kurumyonetimduzenle(Request $request) {
        if ($request->isim!='' && $request->telefon!='' && $request->eposta!='' && $request->adres!='') {
            Kurumlar::whereId($request->id)->update([
                'isim' => $request->isim,
                'telefon' => $request->telefon,
                'mail' => $request->eposta,
                'adres' => $request->adres,
            ]);
            return redirect()->back()->with('success', 'Kurum Düzenleme Başarılı');
        } else {
            return redirect()->back()->with('error', 'Kurum Düzenleme Başarısız');
        }
    }
}
