<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SimpleXLSX;
use Illuminate\Http\Request;
use App\Models\Saatler;
use App\Models\Yoneticiler;

class DerssaatController extends Controller
{
    public function saatsil() {
        $id=$_GET['id'];
        Saatler::where('id',$id)->delete();
        return redirect()->back();
    }

    public function saatler() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $saatler = Saatler::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.derssaati',array('saatler'=>$saatler));
        } else {
            return redirect('login');
        }
    }

    public function saatekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.derssaatiekle');
        } else {
            return redirect('login');
        }
    }

    public function saatduzenle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $id=$_GET['id'];
            $saat = Saatler::find($id);
            return view('include.yonetici.derssaatiduzenle',array('saat'=>$saat));
        } else {
            return redirect('login');
        }
    }

    public function derssaatiekle(Request $request) {
        $control = Saatler::where('isim',$request->isim)->first();
        if (isset($control) && !empty($control)) {
            return redirect()->back()->with('error', 'Girilen İsim Kullanılıyor');
        } else {
            if ($request->isim!='' && $request->baslangic!='' && $request->bitis!='' && $request->sira!='' && $request->durum!='') {
                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                Saatler::create([
                    'isim' => $request->isim,
                    'baslangic' => $request->baslangic,
                    'bitis' => $request->bitis,
                    'sira' => $request->sira,
                    'durum' => $request->durum,
                    'kurum' => $kurum->kurum,
                ]);
                return redirect()->back()->with('success', 'Ders Saati Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }

    public function derssaatiduzenle(Request $request) {
        if ($request->isim!='' && $request->baslangic!='' && $request->bitis!='' && $request->sira!='' && $request->durum!='') {
            Saatler::whereId($request->id)->update([
                'isim' => $request->isim,
                'baslangic' => $request->baslangic,
                'bitis' => $request->bitis,
                'sira' => $request->sira,
                'durum' => $request->durum,
            ]);
            return redirect()->back()->with('success', 'Ders Saati Düzenleme Başarılı');
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }



    // Toplu Ekle


    public function topluderssaatiekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.topluderssaatiekle');
        } else {
            return redirect('login');
        }
    }

    public function orneksaatexcel() {
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile('assets/upload/excel/saatlerexcel.xlsx');
        return redirect()->back();
    }

    public function topluderssaatiniekle(Request $request) {
        if (isset($request->excelsaat) && !empty($request->excelsaat)) {

            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();

            $excelAdi=time().rand(0,1000).'.'.$request->excelsaat->getClientOriginalExtension();
            $yukle=$request->excelsaat->move('assets/upload/excel/',$excelAdi);

            if ($xlsx=SimpleXLSX::parse('assets/upload/excel/'.$excelAdi)) {
                foreach ($xlsx->rows() as $key => $satir) {
                    if ($key!=0) {
                        $control = Saatler::where('isim',$satir[0])->where('kurum',$kurum)->first();
                        if (isset($control) && !empty($control)) {
                            $filtre = 'Bazı isimler Kullanılıyor';
                        } else {
                            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                            Saatler::create([
                                'isim' => $satir[0],
                                'baslangic' => $satir[1],
                                'bitis' => $satir[2],
                                'sira' => $satir[3],
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
