<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliderlar;
use App\Models\Yoneticiler;

class SliderController extends Controller
{
    public function slidersil() {
        $id=$_GET['id'];
        Sliderlar::where('id',$id)->delete();
        return redirect()->back();
    }

    public function sliderlar() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $sliderlar = Sliderlar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.sliderlar',array('sliderlar'=>$sliderlar));
        } else {
            return redirect('login');
        }
    }

    public function sliderekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.sliderekle');
        } else {
            return redirect('login');
        }
    }

    public function sliderduzenle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $id=$_GET['id'];
            $slider = Sliderlar::find($id);
            return view('include.yonetici.sliderduzenle',array('slider'=>$slider));
        } else {
            return redirect('login');
        }
    }

    public function slideriekle(Request $request) {
        if (isset($request->resim) && !empty($request->resim)) {
            if (isset($request->link) && !empty($request->link)) {
                if ($request->baslik!='' && $request->sira!='' && $request->durum!='') {

                    $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                    $resimYukle=$request->resim->move('assets/upload/slider/',$resimAdi);
                    $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                    Sliderlar::create([
                        'baslik' => $request->baslik,
                        'sira' => $request->sira,
                        'durum' => $request->durum,
                        'link' => $request->link,
                        'resim' => $resimAdi,
                        'kurum' => $kurum->kurum,
                    ]);
                    return redirect()->back()->with('success', 'Slider Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            } else {
                if ($request->baslik!='' && $request->sira!='' && $request->durum!='') {

                    $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                    $resimYukle=$request->resim->move('assets/upload/slider/',$resimAdi);
                    $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                    Sliderlar::create([
                        'baslik' => $request->baslik,
                        'sira' => $request->sira,
                        'durum' => $request->durum,
                        'resim' => $resimAdi,
                        'kurum' => $kurum->kurum,
                    ]);
                    return redirect()->back()->with('success', 'Slider Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            }
        } else {
            if (isset($request->link) && !empty($request->link)) {
                if ($request->baslik!='' && $request->sira!='' && $request->durum!='') {
                    $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                    Sliderlar::create([
                        'baslik' => $request->baslik,
                        'sira' => $request->sira,
                        'durum' => $request->durum,
                        'link' => $request->link,
                        'kurum' => $kurum->kurum,
                    ]);
                    return redirect()->back()->with('success', 'Slider Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            } else {
                if ($request->baslik!='' && $request->sira!='' && $request->durum!='') {
                    $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                    Sliderlar::create([
                        'baslik' => $request->baslik,
                        'sira' => $request->sira,
                        'durum' => $request->durum,
                        'kurum' => $kurum->kurum,
                    ]);
                    return redirect()->back()->with('success', 'Slider Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            }
        }
    }

    public function slideriduzenle(Request $request) {
        if (isset($request->resim) && !empty($request->resim)) {
            if (isset($request->link) && !empty($request->link)) {
                if ($request->baslik!='' && $request->sira!='' && $request->durum!='') {

                    $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                    $resimYukle=$request->resim->move('assets/upload/slider/',$resimAdi);

                    Sliderlar::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'sira' => $request->sira,
                        'durum' => $request->durum,
                        'link' => $request->link,
                        'resim' => $resimAdi,
                    ]);
                    return redirect()->back()->with('success', 'Slider Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            } else {
                if ($request->baslik!='' && $request->sira!='' && $request->durum!='') {

                    $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                    $resimYukle=$request->resim->move('assets/upload/slider/',$resimAdi);

                    Sliderlar::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'sira' => $request->sira,
                        'durum' => $request->durum,
                        'resim' => $resimAdi,
                    ]);
                    return redirect()->back()->with('success', 'Slider Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            }
        } else {
            if (isset($request->link) && !empty($request->link)) {
                if ($request->baslik!='' && $request->sira!='' && $request->durum!='') {
                    Sliderlar::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'sira' => $request->sira,
                        'durum' => $request->durum,
                        'link' => $request->link,
                    ]);
                    return redirect()->back()->with('success', 'Slider Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            } else {
                if ($request->baslik!='' && $request->sira!='' && $request->durum!='') {
                    Sliderlar::whereId($request->id)->update([
                        'baslik' => $request->baslik,
                        'sira' => $request->sira,
                        'durum' => $request->durum,
                    ]);
                    return redirect()->back()->with('success', 'Slider Oluşturma Başarılı');
                } else {
                    return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
                }
            }
        }
    }
}
