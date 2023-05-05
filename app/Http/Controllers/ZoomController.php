<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zoom;
use App\Models\Yoneticiler;

class ZoomController extends Controller
{
    public function zoomyonetimi() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $zoom = Zoom::where('kurumId',$kurum['kurumId'])->first();
            return view('include.yonetici.zoom', array('zoom'=>$zoom));
        } else {
            return redirect('login');
        }
    }

    public function zoomduzenle(Request $request) {
        if ($request->apimail!='' && $request->zoomkey!='' && $request->apisecret!='') {
            Zoom::whereId($request->id)->update([
                'apimail' => $request->apimail,
                'zoomkey' => $request->zoomkey,
                'apisecret' => $request->apisecret,
            ]);
            return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }
}
