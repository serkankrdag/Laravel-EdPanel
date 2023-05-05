<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dersprogramlari;
use App\Models\Ogretmenler;
use App\Models\Siniflar;
use App\Models\Saatler;
use App\Models\Konular;
use App\Models\Ogrenciler;
use App\Models\Yoklama;
use App\Models\Yoneticiler;

class YoklamaController extends Controller
{

    public function yoklamaogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
            $dersprogramlari = Dersprogramlari::where('kurum',$kurum['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $saatler = Saatler::where('kurum',$kurum['kurum'])->get();
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            return view('include.ogretmen.yoklama',array('ogretmen'=>$kurum,'dersprogramlari'=>$dersprogramlari,'siniflar'=>$siniflar,'saatler'=>$saatler,'konular'=>$konular));
        } else {
            return redirect('login');
        }
    }

    public function yoklamaogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $kurum = Ogrenciler::where('id',session('ogrenci'))->first();
            $yoklamalar = Yoklama::where('ogrenciId',$kurum['id'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $saatler = Saatler::where('kurum',$kurum['kurum'])->get();
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            $dersprogramlari = Dersprogramlari::where('kurum',$kurum['kurum'])->get();
            return view('include.ogrenci.yoklama',array('ogrenci'=>$kurum,'yoklamalar'=>$yoklamalar,'siniflar'=>$siniflar,'saatler'=>$saatler,'konular'=>$konular,'dersprogramlari'=>$dersprogramlari));
        } else {
            return redirect('login');
        }
    }

    public function yoklamayonetici() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $dersprogramlari = Dersprogramlari::where('kurum',$kurum['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $saatler = Saatler::where('kurum',$kurum['kurum'])->get();
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.yoklama',array('dersprogramlari'=>$dersprogramlari,'siniflar'=>$siniflar,'saatler'=>$saatler,'konular'=>$konular));
        } else {
            return redirect('login');
        }
    }

    public function yoklamaalogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $id=$_GET['id'];
            $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $ogrenciler = Ogrenciler::where('kurum',$kurum['kurum'])->where('sinifId',$_GET['sinif'])->get();
            $dersprogram = Dersprogramlari::where('id',$id)->first();
            $yoklamalar = Yoklama::where('programId',$id)->get();
            return view('include.ogretmen.yoklamaal',array('ogretmen'=>$kurum,'siniflar'=>$siniflar,'dersprogram'=>$dersprogram,'ogrenciler'=>$ogrenciler,'yoklamalar'=>$yoklamalar));
        } else {
            return redirect('login');
        }
    }

    public function yoklamaalyonetici() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $id=$_GET['id'];
            $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $ogrenciler = Ogrenciler::where('kurum',$kurum['kurum'])->where('sinifId',$_GET['sinif'])->get();
            $dersprogram = Dersprogramlari::where('id',$id)->first();
            $yoklamalar = Yoklama::where('programId',$id)->get();
            return view('include.ogretmen.yoklamaal',array('siniflar'=>$siniflar,'dersprogram'=>$dersprogram,'ogrenciler'=>$ogrenciler,'yoklamalar'=>$yoklamalar));
        } else {
            return redirect('login');
        }
    }

    public function yoklamaduzenle(Request $request) {
        $yoklamalar = Yoklama::where('programId',$request->program)->first();
        if (isset($yoklamalar) && !empty($yoklamalar)) {
            if (isset($request->yoklama) && !empty($request->yoklama)) {
                $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
                foreach ($request->yoklama as $key => $yoklama) {
                    Yoklama::where('ogrenciId',$request->ogrenci[$key])->where('programId',$request->program)->update([
                        'programId' => $request->program,
                        'ogrenciId' => $request->ogrenci[$key],
                        'yoklama' => $yoklama,
                        'kurum' => $kurum->kurum,
                    ]);
                }
                return redirect()->back()->with('success', 'Yoklama Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        } else {
            if (isset($request->yoklama) && !empty($request->yoklama)) {
                $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
                foreach ($request->yoklama as $key => $yoklama) {
                    Yoklama::create([
                        'programId' => $request->program,
                        'ogrenciId' => $request->ogrenci[$key],
                        'yoklama' => $yoklama,
                        'kurum' => $kurum->kurum,
                    ]);
                }
                return redirect()->back()->with('success', 'Yoklama Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }

}
