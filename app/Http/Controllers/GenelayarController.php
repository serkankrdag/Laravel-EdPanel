<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siteayar;
use App\Models\Mailayar;
use App\Models\Smsayar;
use App\Models\Girisslider;

class GenelayarController extends Controller
{
    public function girisslider() {
        if (session('successful')  == "successful" && session('yetki') == 1) {
            $girisslider = girisslider::find(1);
            return view('include.admin.girisslider',array('girisslider'=>$girisslider));
        } else {
            return redirect('login');
        }
    }

    public function siteayar() {
        if (session('successful')  == "successful" && session('yetki') == 1) {
            $siteayar = siteayar::find(1);
            return view('include.admin.siteayar',array('siteayar'=>$siteayar));
        } else {
            return redirect('login');
        }
    }

    public function mailayar() {
        if (session('successful')  == "successful" && session('yetki') == 1) {
            $mailayar = mailayar::find(1);
            return view('include.admin.mailayar',array('mailayar'=>$mailayar));
        } else {
            return redirect('login');
        }
    }

    public function smsayar() {
        if (session('successful')  == "successful" && session('yetki') == 1) {
            $smsayar = smsayar::find(1);
            return view('include.admin.smsayar',array('smsayar'=>$smsayar));
        } else {
            return redirect('login');
        }
    }

    public function girissliderekle(Request $request) {
        if ($request->baslik!='' && $request->durum!='') {
            if (isset($request->resim) && !empty($request->resim)) {
                $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                $yukle=$request->resim->move('assets/upload/slider/',$resimAdi);

                girisslider::whereId(1)->update([
                    'baslik' => $request->baslik,
                    'durum' => $request->durum,
                    'resim' => $resimAdi,
                ]);
                return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
            } else {
                girisslider::whereId(1)->update([
                    'baslik' => $request->baslik,
                    'durum' => $request->durum,
                ]);
                return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
            }
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }

    public function siteayarekle(Request $request) {
        if ($request->title!='' && $request->keywords!='' && $request->description!='' && $request->telefon!='' &&
            $request->whatsapp!='' && $request->mail!='' && $request->facebook!='' && $request->twitter!='' &&
            $request->instagram!='' && $request->linkedin!='' && $request->youtube!='') {
            if (isset($request->logo) && !empty($request->logo)) {
                if (isset($request->favicon) && !empty($request->favicon)) {
                    $logoAdi=time().rand(0,1000).'.'.$request->logo->getClientOriginalExtension();
                    $yukle=$request->logo->move('assets/upload/logos/',$logoAdi);

                    $faviconAdi=time().rand(0,1000).'.'.$request->favicon->getClientOriginalExtension();
                    $yukle=$request->favicon->move('assets/upload/logos/',$faviconAdi);

                    siteayar::whereId(1)->update([
                        'title' => $request->title,
                        'keywords' => $request->keywords,
                        'description' => $request->description,
                        'telefon' => $request->telefon,
                        'whatsapp' => $request->whatsapp,
                        'mail' => $request->mail,
                        'facebook' => $request->facebook,
                        'twitter' => $request->twitter,
                        'instagram' => $request->instagram,
                        'linkedin' => $request->linkedin,
                        'youtube' => $request->youtube,
                        'logo' => $logoAdi,
                        'favicon' => $faviconAdi,
                    ]);
                    return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
                } else {
                    $logoAdi=time().rand(0,1000).'.'.$request->logo->getClientOriginalExtension();
                    $yukle=$request->logo->move('assets/upload/logos/',$logoAdi);

                    siteayar::whereId(1)->update([
                        'title' => $request->title,
                        'keywords' => $request->keywords,
                        'description' => $request->description,
                        'telefon' => $request->telefon,
                        'whatsapp' => $request->whatsapp,
                        'mail' => $request->mail,
                        'facebook' => $request->facebook,
                        'twitter' => $request->twitter,
                        'instagram' => $request->instagram,
                        'linkedin' => $request->linkedin,
                        'youtube' => $request->youtube,
                        'logo' => $logoAdi,
                    ]);
                    return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
                }
            } elseif (isset($request->favicon) && !empty($request->favicon)) {
                $faviconAdi=time().rand(0,1000).'.'.$request->favicon->getClientOriginalExtension();
                $yukle=$request->favicon->move('assets/upload/logos/',$faviconAdi);

                siteayar::whereId(1)->update([
                    'title' => $request->title,
                    'keywords' => $request->keywords,
                    'description' => $request->description,
                    'telefon' => $request->telefon,
                    'whatsapp' => $request->whatsapp,
                    'mail' => $request->mail,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                    'linkedin' => $request->linkedin,
                    'youtube' => $request->youtube,
                    'favicon' => $faviconAdi,
                ]);
                return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
            } else {
                siteayar::whereId(1)->update([
                    'title' => $request->title,
                    'keywords' => $request->keywords,
                    'description' => $request->description,
                    'telefon' => $request->telefon,
                    'whatsapp' => $request->whatsapp,
                    'mail' => $request->mail,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                    'linkedin' => $request->linkedin,
                    'youtube' => $request->youtube,
                ]);
                return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
            }
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }

    public function mailayarekle(Request $request) {
        if ($request->host!='' && $request->kulAdi!='' && $request->parola!='' && $request->port!='') {
            mailayar::whereId(1)->update([
                'host' => $request->host,
                'kulAdi' => $request->kulAdi,
                'parola' => $request->parola,
                'port' => $request->port,
            ]);
            return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }

    public function smsayarekle(Request $request) {
        if ($request->baslik!='' && $request->kulAdi!='' && $request->parola!='') {
            smsayar::whereId(1)->update([
                'baslik' => $request->baslik,
                'kulAdi' => $request->kulAdi,
                'parola' => $request->parola,
            ]);
            return redirect()->back()->with('success', 'Kayıt Düzenleme Başarılı');
        } else {
            return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
        }
    }
}
