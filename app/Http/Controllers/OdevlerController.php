<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siniflar;
use App\Models\Konular;
use App\Models\Ogretmenler;
use App\Models\Odevler;
use App\Models\Yoneticiler;
use App\Models\Ogrenciler;
use App\Models\Gelenodev;
use App\Models\Odevnot;

class OdevlerController extends Controller
{

    public function odevsil() {
        $id=$_GET['id'];
        Odevler::where('id',$id)->delete();
        return redirect()->back();
    }

    public function odevlerogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
            $odevler = Odevler::where('kurum',$kurum['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.ogretmen.odevler',array('odevler'=>$odevler,'siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function odevogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $kurum = Ogrenciler::where('id',session('ogrenci'))->first();
            $odevler = Odevler::where('kurum',$kurum['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $ogretmenler = Ogretmenler::where('kurum',$kurum['kurum'])->get();
            return view('include.ogrenci.odev',array('odevler'=>$odevler,'siniflar'=>$siniflar,'ogrenci'=>$kurum,'ogretmenler'=>$ogretmenler));
        } else {
            return redirect('login');
        }
    }

    public function odevgonderogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $id=$_GET['id'];
            $kurum = Ogrenciler::where('id',session('ogrenci'))->first();
            $odev = Odevler::where('kurum',$kurum['kurum'])->where('id',$id)->first();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $ogretmenler = Ogretmenler::where('kurum',$kurum['kurum'])->get();
            return view('include.ogrenci.odevgonder',array('odev'=>$odev,'siniflar'=>$siniflar,'ogrenci'=>$kurum,'ogretmenler'=>$ogretmenler));
        } else {
            return redirect('login');
        }
    }

    public function odevtakipyonetici() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $odevler = Odevler::where('kurum',$kurum['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $ogretmenler = Ogretmenler::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.odevler',array('odevler'=>$odevler,'siniflar'=>$siniflar,'ogretmenler'=>$ogretmenler));
        } else {
            return redirect('login');
        }
    }

    public function odevduzenleogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $id=$_GET['id'];
            $ogretmen = Ogretmenler::where('eposta',session('eposta'))->first();
            $sinifId = json_decode($ogretmen['sinif']);
            $konuId = json_decode($ogretmen['konu']);
            $siniflar = Siniflar::all();
            $konular = Konular::all();
            $odev = Odevler::where('id',$id)->first();
            return view('include.ogretmen.odevduzenle',array('ogretmen'=>$ogretmen,'siniflar'=>$siniflar,'konular'=>$konular,'sinifId'=>$sinifId,'konuId'=>$konuId,'odev'=>$odev));
        } else {
            return redirect('login');
        }
    }

    public function odevekleogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $ogretmen = Ogretmenler::where('eposta',session('eposta'))->first();
            $sinifId = json_decode($ogretmen['sinif']);
            $konuId = json_decode($ogretmen['konu']);
            $siniflar = Siniflar::where('kurum',$ogretmen['kurum'])->get();
            $konular = Konular::where('kurum',$ogretmen['kurum'])->get();
            return view('include.ogretmen.odevekle',array('ogretmen'=>$ogretmen,'siniflar'=>$siniflar,'konular'=>$konular,'sinifId'=>$sinifId,'konuId'=>$konuId));
        } else {
            return redirect('login');
        }
    }

    public function gelenodevogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $ogretmen = Ogretmenler::where('eposta',session('eposta'))->first();
            $odevler = Gelenodev::where('kurum',$ogretmen['kurum'])->get();
            $siniflar = Siniflar::where('kurum',$ogretmen['kurum'])->get();
            $ogrenciler = Ogrenciler::where('kurum',$ogretmen['kurum'])->get();
            return view('include.ogretmen.gelenodev',array('odevler'=>$odevler,'siniflar'=>$siniflar,'ogrenciler'=>$ogrenciler,'ogretmen'=>$ogretmen));
        } else {
            return redirect('login');
        }
    }

    public function odevdegerlendirogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $ogretmen = Ogretmenler::where('eposta',session('eposta'))->first();
            $odev = Odevler::where('kurum',$ogretmen['kurum'])->where('id',$_GET['odev'])->first();
            $siniflar = Siniflar::where('kurum',$ogretmen['kurum'])->where('id',$_GET['id'])->get();
            $odevnot = Odevnot::where('kurum',$ogretmen['kurum'])->where('odev',$_GET['odev'])->get();
            $odevcontrol = Odevnot::where('kurum',$ogretmen['kurum'])->where('odev',$_GET['odev'])->first();
            $ogrenciler = Ogrenciler::where('kurum',$ogretmen['kurum'])->where('sinifId',$_GET['id'])->get();
            return view('include.ogretmen.odevdegerlendir',array('odevcontrol'=>$odevcontrol,'odevnot'=>$odevnot,'odev'=>$odev,'siniflar'=>$siniflar,'ogrenciler'=>$ogrenciler,'ogretmen'=>$ogretmen));
        } else {
            return redirect('login');
        }
    }

    public function odeviekleogretmen(Request $request) {
        if (isset($request->dosya) && !empty($request->dosya)) {
            if ($request->baslik!='' && $request->aciklama!='' && $request->sinif!='' && $request->konu!='' && $request->bitistarih!='') {

                $dosyaAdi=time().rand(0,1000).'.'.$request->dosya->getClientOriginalExtension();
                $dosyaYukle=$request->dosya->move('assets/upload/odev/',$dosyaAdi);

                $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
                foreach ($request->sinif as $sinif) {
                    Odevler::create([
                        'baslik' => $request->baslik,
                        'aciklama' => $request->aciklama,
                        'konu' => $request->konu,
                        'bitistarih' => $request->bitistarih,
                        'link' => $request->link,
                        'sinif' => $sinif,
                        'dosya' => $dosyaAdi,
                        'ogretmen' => $request->ogretmen,
                        'kurum' => $kurum->kurum,
                    ]);
                }
                return redirect()->back()->with('success', 'Ödev Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        } else {
            if ($request->baslik!='' && $request->aciklama!='' && $request->sinif!='' && $request->konu!='' && $request->bitistarih!='') {
                $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
                foreach ($request->sinif as $sinif) {
                    Odevler::create([
                        'baslik' => $request->baslik,
                        'aciklama' => $request->aciklama,
                        'konu' => $request->konu,
                        'bitistarih' => $request->bitistarih,
                        'link' => $request->link,
                        'sinif' => $sinif,
                        'ogretmen' => $request->ogretmen,
                        'kurum' => $kurum->kurum,
                    ]);
                }
                return redirect()->back()->with('success', 'Ödev Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }

    public function odeviduzenleogretmen(Request $request) {
        if (isset($request->dosya) && !empty($request->dosya)) {
            if (isset($request->sinif) && !empty($request->sinif)) {
                if ($request->baslik!='' && $request->aciklama!='' && $request->sinif!='' && $request->konu!='' && $request->bitistarih!='') {

                    $dosyaAdi=time().rand(0,1000).'.'.$request->dosya->getClientOriginalExtension();
                    $dosyaYukle=$request->dosya->move('assets/upload/odev/',$dosyaAdi);


                    Odevler::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'aciklama' => $request->aciklama,
                        'konu' => $request->konu,
                        'bitistarih' => $request->bitistarih,
                        'link' => $request->link,
                        'sinif' => json_encode($request->sinif),
                        'dosya' => $dosyaAdi,
                        'ogretmen' => $request->ogretmen,
                    ]);
                    return redirect()->back()->with('success', 'Ödev Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            } else {
                if ($request->baslik!='' && $request->aciklama!='' && $request->konu!='' && $request->bitistarih!='') {

                    $dosyaAdi=time().rand(0,1000).'.'.$request->dosya->getClientOriginalExtension();
                    $dosyaYukle=$request->dosya->move('assets/upload/odev/',$dosyaAdi);


                    Odevler::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'aciklama' => $request->aciklama,
                        'konu' => $request->konu,
                        'bitistarih' => $request->bitistarih,
                        'link' => $request->link,
                        'dosya' => $dosyaAdi,
                        'ogretmen' => $request->ogretmen,
                    ]);
                    return redirect()->back()->with('success', 'Ödev Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            }
        } else {
            if (isset($request->sinif) && !empty($request->sinif)) {
                if ($request->baslik!='' && $request->aciklama!='' && $request->sinif!='' && $request->konu!='' && $request->bitistarih!='') {

                    Odevler::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'aciklama' => $request->aciklama,
                        'konu' => $request->konu,
                        'bitistarih' => $request->bitistarih,
                        'link' => $request->link,
                        'sinif' => json_encode($request->sinif),
                        'ogretmen' => $request->ogretmen,
                    ]);
                    return redirect()->back()->with('success', 'Ödev Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            } else {
                if ($request->baslik!='' && $request->aciklama!='' && $request->konu!='' && $request->bitistarih!='') {

                    Odevler::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'aciklama' => $request->aciklama,
                        'konu' => $request->konu,
                        'bitistarih' => $request->bitistarih,
                        'link' => $request->link,
                        'ogretmen' => $request->ogretmen,
                    ]);
                    return redirect()->back()->with('success', 'Ödev Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            }
        }
    }

    public function odevdosyaindir(Request $request) {
        $odev = $odevler = Odevler::where('id',$request->id)->first();
        if (isset($odev['dosya']) && !empty($odev['dosya'])) {
            header('Content-type: application/pdf');
            readfile('assets/upload/odev/'.$odev['dosya']);
        }
        return redirect()->back();
    }

    public function odevgonderimogrenci(Request $request) {
        if ($request->detay!='' && $request->odevfile!='') {
            $dosyaAdi=time().rand(0,1000).'.'.$request->odevfile->getClientOriginalExtension();
            $dosyaYukle=$request->odevfile->move('assets/upload/odev/',$dosyaAdi);

            Gelenodev::create([
                'detay' => $request->detay,
                'odevfile' => $dosyaAdi,
                'ogrenci' => session('ogrenci'),
                'odev' => $request->id,
                'kurum' => $request->kurum,
            ]);
            return redirect()->back()->with('success', 'Ödev Gönderme Başarılı');
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }

    public function odevdosyaindirogretmen(Request $request) {
        $odev = Gelenodev::where('id',$request->id)->first();
        if (isset($odev['odevfile']) && !empty($odev['odevfile'])) {
            header('Content-type: application/pdf');
            readfile('assets/upload/odev/'.$odev['odevfile']);
        }
        return redirect()->back();
    }

    public function odevdegerlendir(Request $request) {
        if (isset($request->odevdurum) && !empty($request->odevdurum)) {
            foreach ($request->odevdurum as $key => $odevdurum) {
                $odev = Odevnot::where('ogrenci',$request->ogrenci[$key])->where('kurum',$request->kurum)->where('odev',$request->odev)->first();
                if (isset($odev) && !empty($odev)) {
                    Odevnot::where('ogrenci',$request->ogrenci[$key])->where('odev',$request->odev)->update([
                        'durum' => $odevdurum,
                    ]);
                } else {
                    Odevnot::create([
                        'ogrenci' => $request->ogrenci[$key],
                        'odev' => $request->odev,
                        'durum' => $odevdurum,
                        'kurum' => $request->kurum,
                    ]);
                }

            }
            return redirect()->back()->with('success', 'Ödev Değerlendirme Başarılı');
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }

}
