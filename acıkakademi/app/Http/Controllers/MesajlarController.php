<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ogrenciler;
use App\Models\Ogretmenler;
use DB;

class MesajlarController extends Controller
{

    public function mesajogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $id=$_GET['id'];
            $ogrenci = Ogrenciler::where('id',$id)->first();
            $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
            $ogrenciler = Ogrenciler::where('kurum',$kurum['kurum'])->get();
            $mesajlar = DB::table('mesajlar')->where('kurum',$kurum['kurum'])->where('ogrenci',$id)->get();
            return view('include.ogretmen.mesaj',array('kurum'=>$kurum,'mesajlar'=>$mesajlar,'ogrenciler'=>$ogrenciler,'ogrencisecili'=>$ogrenci));
        } else {
            return redirect('login');
        }
    }

    public function mesajogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $id=$_GET['id'];
            $ogretmen = Ogretmenler::where('id',$id)->first();
            $kurum = Ogrenciler::where('id',session('ogrenci'))->first();
            $ogretmenler = Ogretmenler::where('kurum',$kurum['kurum'])->get();
            $mesajlar = DB::table('mesajlar')->where('kurum',$kurum['kurum'])->where('ogretmen',$id)->get();
            return view('include.ogrenci.mesaj',array('kurum'=>$kurum,'mesajlar'=>$mesajlar,'ogretmenler'=>$ogretmenler,'ogretmensecili'=>$ogretmen));
        } else {
            return redirect('login');
        }
    }

}
