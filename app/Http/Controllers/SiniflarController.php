<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SimpleXLSX;
use Illuminate\Http\Request;
use App\Models\Siniflar;
use App\Models\Yoneticiler;

class SiniflarController extends Controller
{
    public function sinifsil() {
        $id=$_GET['id'];
        Siniflar::where('id',$id)->delete();
        return redirect()->back();
    }

    public function siniflar() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.siniflar',array('siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function sinifekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.sinifekle');
        } else {
            return redirect('login');
        }
    }

    public function sinifduzenle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $id=$_GET['id'];
            $sinif = Siniflar::find($id);
            return view('include.yonetici.sinifduzenle',array('sinif'=>$sinif));
        } else {
            return redirect('login');
        }
    }

    public function sinifiekle(Request $request) {
        $control = Siniflar::where('isim',$request->isim)->first();
        if (isset($control) && !empty($control)) {
            return redirect()->back()->with('error', 'Girilen İsim Kullanılıyor');
        } else {
            if ($request->isim!='' && $request->sira!='' && $request->durum!='') {
                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                Siniflar::create([
                    'isim' => $request->isim,
                    'sira' => $request->sira,
                    'durum' => $request->durum,
                    'kurum' => $kurum->kurum,
                ]);
                return redirect()->back()->with('success', 'Sınıf Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }

    public function sinifiduzenle(Request $request) {
        if ($request->isim!='' && $request->sira!='' && $request->durum!='') {
            Siniflar::whereId($request->id)->update([
                'isim' => $request->isim,
                'sira' => $request->sira,
                'durum' => $request->durum,
            ]);
            return redirect()->back()->with('success', 'Sınıf Oluşturma Başarılı');
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }

// Toplu Ekle


    public function toplusinifekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.toplusinifekle');
        } else {
            return redirect('login');
        }
    }

    public function orneksinifexcel() {
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile('assets/upload/excel/siniflarexcel.xlsx');
        return redirect()->back();
    }

    public function toplusinifiekle(Request $request) {
        if (isset($request->excelsinif) && !empty($request->excelsinif)) {

            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();

            $excelAdi=time().rand(0,1000).'.'.$request->excelsinif->getClientOriginalExtension();
            $yukle=$request->excelsinif->move('assets/upload/excel/',$excelAdi);

            if ($xlsx=SimpleXLSX::parse('assets/upload/excel/'.$excelAdi)) {
                foreach ($xlsx->rows() as $key => $satir) {
                    if ($key!=0) {
                        $control = Siniflar::where('isim',$satir[0])->where('kurum',$kurum)->first();
                        if (isset($control) && !empty($control)) {
                            $filtre = 'Bazı isimler Kullanılıyor';
                        } else {
                            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                            Siniflar::create([
                                'isim' => $satir[0],
                                'sira' => $satir[1],
                                'durum' => 1,
                                'kurum' => $kurum->kurum,
                            ]);
                        }
                    }
                }
                if (isset($filtre) && !empty($filtre)) {
                    return redirect()->back()->with('error', $filtre);
                }
                return redirect()->back()->with('success', 'Sınıf Oluşturma Başarılı');
            } else {
                echo SimpleXLSX::parseError();
            }

        } else {
            return redirect()->back()->with('error', 'Lütfen Bir Dosya Seçin');
        }
    }



}
