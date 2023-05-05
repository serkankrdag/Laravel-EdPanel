<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siniflar;
use App\Models\Ogretmenler;
use App\Models\Ogrenciler;
use App\Models\Veliler;
use App\Models\Kurumlar;
use App\Models\Smsayar;
use App\Models\Yoneticiler;

class ToplusmsController extends Controller
{
    public function toplusmsgonder() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $ogretmenler = Ogretmenler::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.toplusmsgonder', array('siniflar'=>$siniflar,'ogretmenler'=>$ogretmenler));
        } else {
            return redirect('login');
        }
    }

    public function toplusmsigonder(Request $request) {
        if ($request->detay!='' && $request->sinif!='' && $request->kullanici!='') {

            $smsAyar = Smsayar::where('id',1)->first();

            $username = $smsAyar['kulAdi'];
            $password = $smsAyar['parola'];

            $mesaj = $request->detay;

            $ogrenciler = Ogrenciler::where('sinifId',$request->sinif)->get();
            $ogretmenler = Ogretmenler::all();
            $veliler = Veliler::all();

            if ($request->kullanici==1) {
                foreach ($ogrenciler as $ogrenci) {
                    $numara = $ogrenci['telefon'];

                    $url= "https://api.netgsm.com.tr/sms/send/get/?usercode=$username&password=$password&gsmno=$numara&message=".urlencode($mesaj)."&msgheader=$username";

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $http_response = curl_exec($ch);
                    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                    if($http_code != 200){
                        echo "$http_code $http_response\n";
                        return false;
                    }
                }
                return redirect()->back()->with('success', 'SMS Gönderildi');
            }

            if ($request->kullanici==2) {
                foreach ($ogretmenler as $ogretmen) {
                    foreach (json_decode($ogretmen['sinif']) as $sinifId) {
                        if ($request->sinif==$sinifId) {
                            $numara = $ogretmen['telefon'];

                            $url= "https://api.netgsm.com.tr/sms/send/get/?usercode=$username&password=$password&gsmno=$numara&message=".urlencode($mesaj)."&msgheader=$username";

                            $ch = curl_init($url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            $http_response = curl_exec($ch);
                            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                            if($http_code != 200){
                                echo "$http_code $http_response\n";
                                return false;
                            }
                        }
                    }
                }
                return redirect()->back()->with('success', 'SMS Gönderildi');
            }

            if ($request->kullanici==3) {
                foreach ($veliler as $veliler) {
                    foreach (json_decode($veliler['ogrenciId']) as $ogrencisId) {
                        foreach ($ogrenciler as $ogrenci) {
                            if ($ogrenci['id']==$ogrencisId) {
                                $numara = $veliler['telefon'];

                                $url= "https://api.netgsm.com.tr/sms/send/get/?usercode=$username&password=$password&gsmno=$numara&message=".urlencode($mesaj)."&msgheader=$username";

                                $ch = curl_init($url);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                $http_response = curl_exec($ch);
                                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                                if($http_code != 200){
                                    echo "$http_code $http_response\n";
                                    return false;
                                }
                            }
                        }
                    }
                }
                return redirect()->back()->with('success', 'SMS Gönderildi');
            }
        } else {
            return redirect()->back()->with('error', 'SMS Gönderilemedi');
        }
    }
}
