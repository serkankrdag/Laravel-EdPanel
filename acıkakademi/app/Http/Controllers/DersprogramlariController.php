<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dersprogramlari;
use App\Models\Konular;
use App\Models\Ogretmenler;
use App\Models\Saatler;
use App\Models\Siniflar;
use App\Models\Yoneticiler;
use App\Models\Ogrenciler;
use App\Models\Gunler;


class DersprogramlariController extends Controller
{

    public function dersprogramiogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $ogretmen = Ogretmenler::where('eposta',session('eposta'))->first();
            $id = $ogretmen['id'];
            $dersprogramlari = Dersprogramlari::where('ogretmenId',$id)->orderBy('saatId', 'ASC')->get();
            $konular = Konular::where('kurum',$ogretmen['kurum'])->get();
            $saatler = Saatler::where('kurum',$ogretmen['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$ogretmen['kurum'])->get();
            $gunler = Gunler::all();
            return view('include.ogretmen.dersprogrami',array('dersprogramlari'=>$dersprogramlari,'konular'=>$konular,'saatler'=>$saatler,'siniflar'=>$siniflar,'gunler'=>$gunler));
        } else {
            return redirect('login');
        }
    }

    public function dersprogramiogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $ogrenci = Ogrenciler::where('id',session('ogrenci'))->first();
            $dersprogramlari = Dersprogramlari::where('sinifId',$ogrenci['sinifId'])->orderBy('saatId', 'ASC')->get();
            $konular = Konular::where('kurum',$ogrenci['kurum'])->get();
            $saatler = Saatler::where('kurum',$ogrenci['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$ogrenci['kurum'])->get();
            $gunler = Gunler::all();
            return view('include.ogrenci.dersprogrami',array('dersprogramlari'=>$dersprogramlari,'konular'=>$konular,'saatler'=>$saatler,'siniflar'=>$siniflar,'gunler'=>$gunler));
        } else {
            return redirect('login');
        }
    }

    public function dersprogramlari() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $dersprogramlari = Dersprogramlari::where('kurum',$kurum['kurum'])->get();
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            $ogretmenler = Ogretmenler::where('kurum',$kurum['kurum'])->get();
            $saatler = Saatler::where('kurum',$kurum['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.dersprogramlari',array('dersprogramlari'=>$dersprogramlari,'konular'=>$konular,'ogretmenler'=>$ogretmenler,'saatler'=>$saatler,'siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function dersprogramiekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            $ogretmenler = Ogretmenler::where('kurum',$kurum['kurum'])->get();
            $saatler = Saatler::where('kurum',$kurum['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.dersprogramiekle',array('konular'=>$konular,'ogretmenler'=>$ogretmenler,'saatler'=>$saatler,'siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function dersprogramiduzenle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $id=$_GET['id'];
            $dersprogrami = Dersprogramlari::find($id);
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            $ogretmenler = Ogretmenler::where('kurum',$kurum['kurum'])->get();
            $saatler = Saatler::where('kurum',$kurum['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.dersprogramiduzenle',array('konular'=>$konular,'ogretmenler'=>$ogretmenler,'saatler'=>$saatler,'siniflar'=>$siniflar,'dersprogrami'=>$dersprogrami));
        } else {
            return redirect('login');
        }
    }

    public function dersprogramekle(Request $request) {
        if ($request->konu!='' && $request->ogretmen!='' && $request->saat!='' && $request->sinif!='' && $request->tarih!='') {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            Dersprogramlari::create([
                'konuId' => $request->konu,
                'ogretmenId' => $request->ogretmen,
                'saatId' => $request->saat,
                'sinifId' => $request->sinif,
                'tarih' => $request->tarih,
                'kurum' => $kurum->kurum,
            ]);
            return redirect()->back()->with('success', 'Ders Programı Oluşturma Başarılı');
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }

    public function dersprogramduzenle(Request $request) {
        if ($request->konu!='' && $request->ogretmen!='' && $request->saat!='' && $request->sinif!='' && $request->tarih!='') {
            Dersprogramlari::whereId($request->id)->update([
                'konuId' => $request->konu,
                'ogretmenId' => $request->ogretmen,
                'saatId' => $request->saat,
                'sinifId' => $request->sinif,
                'tarih' => $request->tarih,
            ]);
            return redirect()->back()->with('success', 'Ders Programı Düzenleme Başarılı');
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }


    // Toplu Ekle


    public function topludersekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.topludersekle');
        } else {
            return redirect('login');
        }
    }

    public function ornekdersexcel() {
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile('assets/upload/excel/derslerexcel.xlsx');
        return redirect()->back();
    }

    public function topludersiekle(Request $request) {
        if (isset($request->exceldersler) && !empty($request->exceldersler)) {

            $excelAdi=time().rand(0,1000).'.'.$request->exceldersler->getClientOriginalExtension();
            $yukle=$request->exceldersler->move('assets/upload/excel/',$excelAdi);

            if ($xlsx=SimpleXLSX::parse('assets/upload/excel/'.$excelAdi)) {
                foreach ($xlsx->rows() as $key => $satir) {
                    if ($key!=0) {
                        $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();

                        if ($satir[5] == 'Pazartesi') {$gun = '0';}
                        if ($satir[5] == 'Salı') {$gun = '1';}
                        if ($satir[5] == 'Çarşamba') {$gun = '2';}
                        if ($satir[5] == 'Perşembe') {$gun = '3';}
                        if ($satir[5] == 'Cuma') {$gun = '4';}
                        if ($satir[5] == 'Cumartesi') {$gun = '5';}
                        if ($satir[5] == 'Pazar') {$gun = '6';}

                        $konu = Konular::where('isim',$satir[0])->first();
                        $ogretmen = Ogretmenler::where('isim',$satir[1])->first();
                        $saat = Saatler::where('isim',$satir[2])->first();
                        $sinif = Siniflar::where('isim',$satir[3])->first();

                        Dersprogramlari::create([
                            'konuId' => $konu['id'],
                            'ogretmenId' => $ogretmen['id'],
                            'saatId' => $saat['id'],
                            'sinifId' => $sinif['id'],
                            'tarih' => $satir[4],
                            'gun' => $gun,
                            'kurum' => $kurum->kurum,
                        ]);
                    }
                }
                if (isset($filtre) && !empty($filtre)) {
                    return redirect()->back()->with('error', $filtre);
                }
                return redirect()->back()->with('success', 'Ders Programı Oluşturma Başarılı');
            } else {
                echo SimpleXLSX::parseError();
            }

        } else {
            return redirect()->back()->with('error', 'Lütfen Bir Dosya Seçin');
        }
    }
}
