<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videolar;
use App\Models\Siniflar;
use App\Models\Konular;
use App\Models\Yoneticiler;
use App\Models\Ogretmenler;
use App\Models\Ogrenciler;

class VideoController extends Controller
{
    public function videosil() {
        $id=$_GET['id'];
        Videolar::where('id',$id)->delete();
        return redirect()->back();
    }

    public function videolar() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $videolar = Videolar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.videolar',array('videolar'=>$videolar));
        } else {
            return redirect('login');
        }
    }

    public function videolarogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
            $videolar = Videolar::where('kurum',$kurum['kurum'])->get();
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            return view('include.ogretmen.videolar',array('videolar'=>$videolar,'konular'=>$konular));
        } else {
            return redirect('login');
        }
    }

    public function videolarogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $kurum = Ogrenciler::where('id',session('ogrenci'))->first();
            $videolar = Videolar::where('kurum',$kurum['kurum'])->get();
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            return view('include.ogrenci.videolar',array('videolar'=>$videolar,'konular'=>$konular,'ogrenci'=>$kurum));
        } else {
            return redirect('login');
        }
    }

    public function videodetayogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $id=$_GET['id'];
            $video = Videolar::where('id',$id)->first();
            return view('include.ogrenci.videodetay',array('video'=>$video));
        } else {
            return redirect('login');
        }
    }

    public function videodetayogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $id=$_GET['id'];
            $video = Videolar::where('id',$id)->first();
            return view('include.ogretmen.videodetay',array('video'=>$video));
        } else {
            return redirect('login');
        }
    }

    public function videoekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.videoekle',array('siniflar'=>$siniflar,'konular'=>$konular));
        } else {
            return redirect('login');
        }
    }

    public function videoduzenle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $id=$_GET['id'];
            $video = Videolar::find($id);
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $konular = Konular::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.videoduzenle',array('siniflar'=>$siniflar,'konular'=>$konular,'video'=>$video));
        } else {
            return redirect('login');
        }
    }

    public function videoyuekle(Request $request) {
        if (isset($request->resim) && !empty($request->resim)) {
            if (isset($request->video) && !empty($request->video)) {
                if ($request->baslik!='' && $request->detay!='' && $request->sinif!='' && $request->konu!='' && $request->videokod!=''  && $request->videosure!='' && $request->durum!='') {

                    $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                    $resimYukle=$request->resim->move('assets/upload/video/',$resimAdi);

                    $videoAdi=time().rand(0,1000).'.'.$request->video->getClientOriginalExtension();
                    $videoYukle=$request->video->move('assets/upload/video/',$videoAdi);

                    $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();

                    Videolar::create([
                        'baslik' => $request->baslik,
                        'detay' => $request->detay,
                        'sinifId' => json_encode($request->sinif),
                        'konuId' => json_encode($request->konu),
                        'videokod' => $request->videokod,
                        'videosure' => $request->videosure,
                        'durum' => $request->durum,
                        'resim' => $resimAdi,
                        'video' => $videoAdi,
                        'kurum' => $kurum->kurum,
                    ]);
                    return redirect()->back()->with('success', 'Video Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            } else {
                if ($request->baslik!='' && $request->detay!='' && $request->sinif!=''  && $request->videosure!=''  && $request->konu!='' && $request->videokod!='' && $request->durum!='') {

                    $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                    $resimYukle=$request->resim->move('assets/upload/video/',$resimAdi);

                    $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();

                    Videolar::create([
                        'baslik' => $request->baslik,
                        'detay' => $request->detay,
                        'sinifId' => json_encode($request->sinif),
                        'konuId' => json_encode($request->konu),
                        'videokod' => $request->videokod,
                        'videosure' => $request->videosure,
                        'durum' => $request->durum,
                        'resim' => $resimAdi,
                        'kurum' => $kurum->kurum,
                    ]);
                    return redirect()->back()->with('success', 'Video Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            }
        } elseif (isset($request->video) && !empty($request->video)) {
            if ($request->baslik!='' && $request->detay!='' && $request->sinif!=''  && $request->videosure!=''  && $request->konu!='' && $request->videokod!='' && $request->durum!='') {

                $videoAdi=time().rand(0,1000).'.'.$request->video->getClientOriginalExtension();
                $videoYukle=$request->video->move('assets/upload/video/',$videoAdi);

                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();

                Videolar::create([
                    'baslik' => $request->baslik,
                    'detay' => $request->detay,
                    'sinifId' => json_encode($request->sinif),
                    'konuId' => json_encode($request->konu),
                    'videokod' => $request->videokod,
                    'videosure' => $request->videosure,
                    'durum' => $request->durum,
                    'video' => $videoAdi,
                    'kurum' => $kurum->kurum,
                ]);
                return redirect()->back()->with('success', 'Video Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        } else {
            if ($request->baslik!='' && $request->detay!='' && $request->sinif!=''  && $request->videosure!=''  && $request->konu!='' && $request->videokod!='' && $request->durum!='') {

                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();

                Videolar::create([
                    'baslik' => $request->baslik,
                    'detay' => $request->detay,
                    'sinifId' => json_encode($request->sinif),
                    'konuId' => json_encode($request->konu),
                    'videokod' => $request->videokod,
                    'videosure' => $request->videosure,
                    'durum' => $request->durum,
                    'kurum' => $kurum->kurum,
                ]);
                return redirect()->back()->with('success', 'Video Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }

    public function videoyuduzenle(Request $request) {
        if (isset($request->resim) && !empty($request->resim)) {
            if (isset($request->video) && !empty($request->video)) {
                if ($request->baslik!='' && $request->detay!='' && $request->sinif!='' && $request->konu!='' && $request->videokod!=''  && $request->videosure!='' && $request->durum!='') {

                    $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                    $resimYukle=$request->resim->move('assets/upload/video/',$resimAdi);

                    $videoAdi=time().rand(0,1000).'.'.$request->video->getClientOriginalExtension();
                    $videoYukle=$request->video->move('assets/upload/video/',$videoAdi);

                    Videolar::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'detay' => $request->detay,
                        'sinifId' => json_encode($request->sinif),
                        'konuId' => json_encode($request->konu),
                        'videokod' => $request->videokod,
                        'videosure' => $request->videosure,
                        'durum' => $request->durum,
                        'resim' => $resimAdi,
                        'video' => $videoAdi,
                    ]);
                    return redirect()->back()->with('success', 'Video Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            } else {
                if ($request->baslik!='' && $request->detay!='' && $request->sinif!=''  && $request->videosure!=''  && $request->konu!='' && $request->videokod!='' && $request->durum!='') {

                    $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                    $resimYukle=$request->resim->move('assets/upload/video/',$resimAdi);

                    Videolar::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'detay' => $request->detay,
                        'sinifId' => json_encode($request->sinif),
                        'konuId' => json_encode($request->konu),
                        'videokod' => $request->videokod,
                        'videosure' => $request->videosure,
                        'durum' => $request->durum,
                        'resim' => $resimAdi,
                    ]);
                    return redirect()->back()->with('success', 'Video Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            }
        } elseif (isset($request->video) && !empty($request->video)) {
            if ($request->baslik!='' && $request->detay!='' && $request->sinif!=''  && $request->videosure!=''  && $request->konu!='' && $request->videokod!='' && $request->durum!='') {

                $videoAdi=time().rand(0,1000).'.'.$request->video->getClientOriginalExtension();
                $videoYukle=$request->video->move('assets/upload/video/',$videoAdi);

                Videolar::whereId($request->id)->update([
                    'baslik' => $request->baslik,
                    'detay' => $request->detay,
                    'sinifId' => json_encode($request->sinif),
                    'konuId' => json_encode($request->konu),
                    'videokod' => $request->videokod,
                    'videosure' => $request->videosure,
                    'durum' => $request->durum,
                    'video' => $videoAdi,
                ]);
                return redirect()->back()->with('success', 'Video Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        } else {
            if ($request->baslik!='' && $request->detay!='' && $request->sinif!=''  && $request->videosure!=''  && $request->konu!='' && $request->videokod!='' && $request->durum!='') {
                Videolar::whereId($request->id)->update([
                    'baslik' => $request->baslik,
                    'detay' => $request->detay,
                    'sinifId' => json_encode($request->sinif),
                    'konuId' => json_encode($request->konu),
                    'videokod' => $request->videokod,
                    'videosure' => $request->videosure,
                    'durum' => $request->durum,
                ]);
                return redirect()->back()->with('success', 'Video Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }
}
