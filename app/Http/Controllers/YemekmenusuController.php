<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yemekmenu;
use App\Models\Yoneticiler;

class YemekmenusuController extends Controller
{

    public function menusil() {
        $id=$_GET['id'];
        Yemekmenu::where('id',$id)->delete();
        return redirect()->back();
    }

    public function yemekmenusu() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $menuler = Yemekmenu::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.yemekmenusu',array('menuler'=>$menuler));
        } else {
            return redirect('login');
        }
    }

    public function yemekmenusuekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.yemekmenusuekle');
        } else {
            return redirect('login');
        }
    }

    public function yemekmenusuduzenle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $id=$_GET['id'];
            $menu = Yemekmenu::find($id);
            return view('include.yonetici.yemekmenusuduzenle',array('menu'=>$menu));
        } else {
            return redirect('login');
        }
    }

    public function menuekle(Request $request) {
        if ($request->kahvalti!='' && $request->ogleyemek!='' && $request->araogun!='' && $request->durum!='') {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            Yemekmenu::create([
                'kahvalti' => $request->kahvalti,
                'ogleyemek' => $request->ogleyemek,
                'araogun' => $request->araogun,
                'durum' => $request->durum,
                'kurum' => $kurum->kurum,
            ]);
            return redirect()->back()->with('success', 'Menü Oluşturma Başarılı');
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }

    public function menuduzenle(Request $request) {
        if ($request->kahvalti!='' && $request->ogleyemek!='' && $request->araogun!='' && $request->durum!='') {
            Yemekmenu::whereId($request->id)->update([
                'kahvalti' => $request->kahvalti,
                'ogleyemek' => $request->ogleyemek,
                'araogun' => $request->araogun,
                'durum' => $request->durum,
            ]);
            return redirect()->back()->with('success', 'Menü Oluşturma Başarılı');
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }





    // Toplu Ekle


    public function toplumenuekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.toplumenuekle');
        } else {
            return redirect('login');
        }
    }

    public function ornekmenuexcel() {
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile('assets/upload/excel/menulerexcel.xlsx');
        return redirect()->back();
    }

    public function toplumenuyuekle(Request $request) {
        if (isset($request->excelmenu) && !empty($request->excelmenu)) {

            $excelAdi=time().rand(0,1000).'.'.$request->excelmenu->getClientOriginalExtension();
            $yukle=$request->excelmenu->move('assets/upload/excel/',$excelAdi);

            if ($xlsx=SimpleXLSX::parse('assets/upload/excel/'.$excelAdi)) {
                foreach ($xlsx->rows() as $key => $satir) {
                    if ($key!=0) {
                        $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                        Yemekmenu::create([
                            'kahvalti' => $satir[0],
                            'ogleyemek' => $satir[1],
                            'araogun' => $satir[2],
                            'durum' => 1,
                            'kurum' => $kurum->kurum,
                        ]);
                    }
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
