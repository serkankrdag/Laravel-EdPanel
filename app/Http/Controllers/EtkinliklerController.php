<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etkinlikler;
use App\Models\Siniflar;
use App\Models\Ogretmenler;
use App\Models\Yoneticiler;
use App\Models\Ogrenciler;

class EtkinliklerController extends Controller
{
    public function etkinliksil() {
        $id=$_GET['id'];
        Etkinlikler::where('id',$id)->delete();
        return redirect()->back();
    }

    public function etkinliklerogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $ogretmen = Ogretmenler::where('eposta',session('eposta'))->first();
            $sinifId = json_decode($ogretmen['sinif']);
            $etkinlikler = Etkinlikler::where('kurum',$ogretmen['kurum'])->get();
            return view('include.ogretmen.etkinlikler',array('etkinlikler'=>$etkinlikler,'sinifId'=>$sinifId));
        } else {
            return redirect('login');
        }
    }

    public function etkinliklerogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $ogrenci = Ogrenciler::where('id',session('ogrenci'))->first();
            $sinifId = $ogrenci['sinifId'];
            $etkinlikler = Etkinlikler::where('kurum',$ogrenci['kurum'])->get();
            return view('include.ogrenci.etkinlikler',array('etkinlikler'=>$etkinlikler,'sinifId'=>$sinifId));
        } else {
            return redirect('login');
        }
    }

    public function etkinlikdetayogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $id=$_GET['id'];
            $etkinlik = Etkinlikler::find($id);
            $ogrenci = Ogrenciler::where('id',session('ogrenci'))->first();
            $siniflar = Siniflar::where('kurum',$ogrenci['kurum'])->get();
            $sinifId = $ogrenci['sinifId'];
            $etkinlikler = Etkinlikler::where('kurum',$ogrenci['kurum'])->get();
            return view('include.ogrenci.etkinlikdetay',array('etkinlik'=>$etkinlik,'siniflar'=>$siniflar,'etkinlikler'=>$etkinlikler,'sinifId'=>$sinifId));
        } else {
            return redirect('login');
        }
    }

    public function etkinlikdetayogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $id=$_GET['id'];
            $etkinlik = Etkinlikler::find($id);
            $siniflar = Siniflar::all();
            $ogretmen = Ogretmenler::where('eposta',session('eposta'))->first();
            $sinifId = json_decode($ogretmen['sinif']);
            $etkinlikler = Etkinlikler::where('kurum',$ogretmen['kurum'])->get();
            return view('include.ogretmen.etkinlikdetay',array('etkinlik'=>$etkinlik,'siniflar'=>$siniflar,'etkinlikler'=>$etkinlikler,'sinifId'=>$sinifId));
        } else {
            return redirect('login');
        }
    }

    public function etkinlikekleogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $ogretmen = Ogretmenler::where('eposta',session('eposta'))->first();
            $sinifId = json_decode($ogretmen['sinif']);
            $siniflar = Siniflar::where('kurum',$ogretmen['kurum'])->get();
            return view('include.ogretmen.etkinlikekle',array('siniflar'=>$siniflar,'sinifId'=>$sinifId));
        } else {
            return redirect('login');
        }
    }

    public function etkinlikler() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $etkinlikler = Etkinlikler::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.etkinlikler',array('etkinlikler'=>$etkinlikler));
        } else {
            return redirect('login');
        }
    }

    public function etkinlikekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.etkinlikekle',array('siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function etkinlikduzenle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $id=$_GET['id'];
            $etkinlik = Etkinlikler::find($id);
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.etkinlikduzenle',array('etkinlik'=>$etkinlik,'siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function etkinlikduzenleogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
            $id=$_GET['id'];
            $etkinlik = Etkinlikler::find($id);
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            return view('include.ogretmen.etkinlikduzenle',array('etkinlik'=>$etkinlik,'siniflar'=>$siniflar));
        } else {
            return redirect('login');
        }
    }

    public function etkinligiekle(Request $request) {
        if (isset($request->resimler) && !empty($request->resimler)) {
            if ($request->baslik!='' && $request->detay!='' && $request->sinif!='' && $request->resim!='') {

                $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                $resimYukle=$request->resim->move('assets/upload/etkinlikler/',$resimAdi);

                foreach ($request->resimler as $key => $resimler) {
                    $resimlerAdi=rand(0,1000).time().'.'.$resimler->getClientOriginalExtension();
                    $resimler->move('assets/upload/etkinlikler/',$resimlerAdi);

                    $resimlerArray[$key] = $resimlerAdi;
                }
                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                Etkinlikler::create([
                    'baslik' => $request->baslik,
                    'detay' => $request->detay,
                    'sinifId' => json_encode($request->sinif),
                    'resim' => $resimAdi,
                    'resimler' => json_encode($resimlerArray),
                    'kurum' => $kurum->kurum,
                ]);
                return redirect()->back()->with('success', 'Etkinlik Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        } else {
            if ($request->baslik!='' && $request->detay!='' && $request->sinif!='' && $request->resim!='') {
                $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                $resimYukle=$request->resim->move('assets/upload/etkinlikler/',$resimAdi);
                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                Etkinlikler::create([
                    'baslik' => $request->baslik,
                    'detay' => $request->detay,
                    'sinifId' => json_encode($request->sinif),
                    'resim' => $resimAdi,
                    'kurum' => $kurum->kurum,
                ]);
                return redirect()->back()->with('success', 'Etkinlik Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }

    public function etkinligiduzenle(Request $request) {
        if (isset($request->resim) && !empty($request->resim)) {
            if (isset($request->resimler) && !empty($request->resimler)) {
                if (isset($request->sinif) && !empty($request->sinif)) {
                    if ($request->baslik!='' && $request->detay!='') {

                        $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                        $resimYukle=$request->resim->move('assets/upload/etkinlikler/',$resimAdi);

                        foreach ($request->resimler as $key => $resimler) {
                            $resimlerAdi=rand(0,1000).time().'.'.$resimler->getClientOriginalExtension();
                            $resimler->move('assets/upload/etkinlikler/',$resimlerAdi);

                            $resimlerArray[$key] = $resimlerAdi;
                        }

                        Etkinlikler::whereId($request->id)->update([
                            'baslik' => $request->baslik,
                            'detay' => $request->detay,
                            'sinifId' => json_encode($request->sinif),
                            'resim' => $resimAdi,
                            'resimler' => json_encode($resimlerArray),
                        ]);
                        return redirect()->back()->with('success', 'Etkinlik Oluşturma Başarılı');
                    } else {
                        return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                    }
                } else {
                    if ($request->baslik!='' && $request->detay!='') {

                        $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                        $resimYukle=$request->resim->move('assets/upload/etkinlikler/',$resimAdi);

                        foreach ($request->resimler as $key => $resimler) {
                            $resimlerAdi=rand(0,1000).time().'.'.$resimler->getClientOriginalExtension();
                            $resimler->move('assets/upload/etkinlikler/',$resimlerAdi);

                            $resimlerArray[$key] = $resimlerAdi;
                        }

                        Etkinlikler::whereId($request->id)->update([
                            'baslik' => $request->baslik,
                            'detay' => $request->detay,
                            'resim' => $resimAdi,
                            'resimler' => json_encode($resimlerArray),
                        ]);
                        return redirect()->back()->with('success', 'Etkinlik Oluşturma Başarılı');
                    } else {
                        return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                    }
                }
            } else {
                if (isset($request->sinif) && !empty($request->sinif)) {
                    if ($request->baslik!='' && $request->detay!='') {

                        $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                        $resimYukle=$request->resim->move('assets/upload/etkinlikler/',$resimAdi);

                        Etkinlikler::whereId($request->id)->update([
                            'baslik' => $request->baslik,
                            'detay' => $request->detay,
                            'sinifId' => json_encode($request->sinif),
                            'resim' => $resimAdi,
                        ]);
                        return redirect()->back()->with('success', 'Etkinlik Oluşturma Başarılı');
                    } else {
                        return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                    }
                } else {
                    if ($request->baslik!='' && $request->detay!='') {

                        $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                        $resimYukle=$request->resim->move('assets/upload/etkinlikler/',$resimAdi);


                        Etkinlikler::whereId($request->id)->update([
                            'baslik' => $request->baslik,
                            'detay' => $request->detay,
                            'resim' => $resimAdi,
                        ]);
                        return redirect()->back()->with('success', 'Etkinlik Oluşturma Başarılı');
                    } else {
                        return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                    }
                }
            }
        } elseif (isset($request->resimler) && !empty($request->resimler)) {
            if (isset($request->sinif) && !empty($request->sinif)) {
                if ($request->baslik!='' && $request->detay!='') {

                    foreach ($request->resimler as $key => $resimler) {
                        $resimlerAdi=rand(0,1000).time().'.'.$resimler->getClientOriginalExtension();
                        $resimler->move('assets/upload/etkinlikler/',$resimlerAdi);

                        $resimlerArray[$key] = $resimlerAdi;
                    }

                    Etkinlikler::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'detay' => $request->detay,
                        'sinifId' => json_encode($request->sinif),
                        'resimler' => json_encode($resimlerArray),
                    ]);
                    return redirect()->back()->with('success', 'Etkinlik Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            } else {
                if ($request->baslik!='' && $request->detay!='') {

                    foreach ($request->resimler as $key => $resimler) {
                        $resimlerAdi=rand(0,1000).time().'.'.$resimler->getClientOriginalExtension();
                        $resimler->move('assets/upload/etkinlikler/',$resimlerAdi);

                        $resimlerArray[$key] = $resimlerAdi;
                    }

                    Etkinlikler::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'detay' => $request->detay,
                        'resimler' => json_encode($resimlerArray),
                    ]);
                    return redirect()->back()->with('success', 'Etkinlik Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            }
        } else {
            if (isset($request->sinif) && !empty($request->sinif)) {
                if ($request->baslik!='' && $request->detay!='') {
                    Etkinlikler::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'detay' => $request->detay,
                        'sinifId' => json_encode($request->sinif),
                    ]);
                    return redirect()->back()->with('success', 'Etkinlik Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            } else {
                if ($request->baslik!='' && $request->detay!='') {
                    Etkinlikler::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'detay' => $request->detay,
                    ]);
                    return redirect()->back()->with('success', 'Etkinlik Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            }
        }
    }

    public function etkinligiekleogretmen(Request $request) {
        if (isset($request->resimler) && !empty($request->resimler)) {
            if ($request->baslik!='' && $request->detay!='' && $request->sinif!='' && $request->resim!='') {

                $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                $resimYukle=$request->resim->move('assets/upload/etkinlikler/',$resimAdi);

                foreach ($request->resimler as $key => $resimler) {
                    $resimlerAdi=rand(0,1000).time().'.'.$resimler->getClientOriginalExtension();
                    $resimler->move('assets/upload/etkinlikler/',$resimlerAdi);

                    $resimlerArray[$key] = $resimlerAdi;
                }
                $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
                Etkinlikler::create([
                    'baslik' => $request->baslik,
                    'detay' => $request->detay,
                    'sinifId' => json_encode($request->sinif),
                    'resim' => $resimAdi,
                    'resimler' => json_encode($resimlerArray),
                    'kurum' => $kurum->kurum,
                ]);
                return redirect()->back()->with('success', 'Etkinlik Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        } else {
            if ($request->baslik!='' && $request->detay!='' && $request->sinif!='' && $request->resim!='') {
                $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                $resimYukle=$request->resim->move('assets/upload/etkinlikler/',$resimAdi);
                $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
                Etkinlikler::create([
                    'baslik' => $request->baslik,
                    'detay' => $request->detay,
                    'sinifId' => json_encode($request->sinif),
                    'resim' => $resimAdi,
                    'kurum' => $kurum->kurum,
                ]);
                return redirect()->back()->with('success', 'Etkinlik Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }
}
