<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konular;
use App\Models\Siniflar;
use App\Models\Yoneticiler;

class KonularController extends Controller
{
    public function konusil() {
        $id=$_GET['id'];
        Konular::where('id',$id)->delete();
        return redirect()->back();
    }

    public function konular() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.konular',array('konular'=>$konular,'siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function konuekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.konuekle',array('siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function konuduzenle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $id=$_GET['id'];
            $konu = Konular::find($id);
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.konuduzenle',array('konu'=>$konu,'siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function konuyuekle(Request $request) {
        $control = Siniflar::where('isim',$request->isim)->first();
        if (isset($control) && !empty($control)) {
            return redirect()->back()->with('error', 'Girilen İsim Kullanılıyor');
        } else {
            if ($request->isim!='' && $request->sinif!='' && $request->durum!='') {
                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                Konular::create([
                    'isim' => $request->isim,
                    'sinifId' => json_encode($request->sinif),
                    'durum' => $request->durum,
                    'kurum' => $kurum->kurum,
                ]);
                return redirect()->back()->with('success', 'Konu Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }

    public function konuyuduzenle(Request $request) {
        if (isset($request->sinif) && !empty($request->sinif)) {
            if ($request->isim!='' && $request->sinif!='' && $request->durum!='') {
                Konular::whereId($request->id)->update([
                    'isim' => $request->isim,
                    'sinifId' => json_encode($request->sinif),
                    'durum' => $request->durum,
                ]);
                return redirect()->back()->with('success', 'Konu Düzenleme Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        } else {
            if ($request->isim!='' && $request->durum!='') {
                Konular::whereId($request->id)->update([
                    'isim' => $request->isim,
                    'durum' => $request->durum,
                ]);
                return redirect()->back()->with('success', 'Konu Düzenleme Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }




    // Toplu Ekle


    public function toplukonuekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.toplukonuekle');
        } else {
            return redirect('login');
        }
    }

    public function ornekkonuexcel() {
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile('assets/upload/excel/konularexcel.xlsx');
        return redirect()->back();
    }

    public function toplukonuyuekle(Request $request) {
        if (isset($request->excelkonu) && !empty($request->excelkonu)) {

            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();

            $excelAdi=time().rand(0,1000).'.'.$request->excelkonu->getClientOriginalExtension();
            $yukle=$request->excelkonu->move('assets/upload/excel/',$excelAdi);

            if ($xlsx=SimpleXLSX::parse('assets/upload/excel/'.$excelAdi)) {
                foreach ($xlsx->rows() as $key => $satir) {
                    if ($key!=0) {
                        $control = Konular::where('isim',$satir[0])->where('kurum',$kurum)->first();
                        if (isset($control) && !empty($control)) {
                            $filtre = 'Bazı isimler Kullanılıyor';
                        } else {
                            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                            Konular::create([
                                'isim' => $satir[0],
                                'sinifId' => json_encode(array('0'=>0,'1'=>1)),
                                'durum' => 1,
                                'kurum' => $kurum->kurum,
                            ]);
                        }
                    }
                }
                if (isset($filtre) && !empty($filtre)) {
                    return redirect()->back()->with('error', $filtre);
                }
                return redirect()->back()->with('success', 'Konu Oluşturma Başarılı');
            } else {
                echo SimpleXLSX::parseError();
            }

        } else {
            return redirect()->back()->with('error', 'Lütfen Bir Dosya Seçin');
        }
    }
}
