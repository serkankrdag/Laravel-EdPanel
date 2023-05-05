<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bloglar;
use App\Models\Ogretmenler;
use App\Models\Yoneticiler;
use App\Models\Ogrenciler;


class BloglarController extends Controller
{
    public function blogsil() {
        $id=$_GET['id'];
        Bloglar::where('id',$id)->delete();
        return redirect()->back();
    }

    public function bloglarogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
            $bloglar = Bloglar::where('kurum',$kurum['kurum'])->get();
            return view('include.ogretmen.blog',array('bloglar'=>$bloglar));
        } else {
            return redirect('login');
        }
    }

    public function bloglarogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $kurum = Ogrenciler::where('id',session('ogrenci'))->first();
            $bloglar = Bloglar::where('kurum',$kurum['kurum'])->get();
            return view('include.ogrenci.blog',array('bloglar'=>$bloglar));
        } else {
            return redirect('login');
        }
    }

    public function blogdetayogrenci() {
        if (session('successful')  == "successful" && session('yetki') == 4) {
            $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
            $id=$_GET['id'];
            $blog = Bloglar::find($id);
            $bloglar = Bloglar::where('kurum',$kurum['kurum'])->get();
            return view('include.ogrenci.blogdetay',array('blog'=>$blog,'bloglar'=>$bloglar));
        } else {
            return redirect('login');
        }
    }

    public function blogdetayogretmen() {
        if (session('successful')  == "successful" && session('yetki') == 3) {
            $kurum = Ogretmenler::where('id',session('ogretmen'))->first();
            $id=$_GET['id'];
            $blog = Bloglar::find($id);
            $bloglar = Bloglar::where('kurum',$kurum['kurum'])->get();
            return view('include.ogretmen.blogdetay',array('blog'=>$blog,'bloglar'=>$bloglar));
        } else {
            return redirect('login');
        }
    }

    public function bloglar() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $bloglar = Bloglar::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.bloglar',array('bloglar'=>$bloglar));
        } else {
            return redirect('login');
        }
    }

    public function blogekle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            return view('include.yonetici.blogekle');
        } else {
            return redirect('login');
        }
    }

    public function blogduzenle() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $id=$_GET['id'];
            $blog = Bloglar::find($id);
            return view('include.yonetici.blogduzenle',array('blog'=>$blog));
        } else {
            return redirect('login');
        }
    }

    public function bloguekle(Request $request) {
        if (isset($request->resim) && !empty($request->resim)) {
            if ($request->baslik!='' && $request->detay!='') {

                $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                $resimYukle=$request->resim->move('assets/upload/blog/',$resimAdi);

                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();

                Bloglar::create([
                    'baslik' => $request->baslik,
                    'detay' => $request->detay,
                    'resim' => $resimAdi,
                    'kurum' => $kurum->kurum,
                ]);
                return redirect()->back()->with('success', 'Blog Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        } else {
            if ($request->baslik!='' && $request->detay!='') {
                $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
                Bloglar::create([
                    'baslik' => $request->baslik,
                    'detay' => $request->detay,
                    'kurum' => $kurum->kurum,
                ]);
                return redirect()->back()->with('success', 'Blog Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }

    public function bloguduzenle(Request $request) {
        if (isset($request->resim) && !empty($request->resim)) {
            if ($request->baslik!='' && $request->detay!='') {

                $resimAdi=time().rand(0,1000).'.'.$request->resim->getClientOriginalExtension();
                $resimYukle=$request->resim->move('assets/upload/blog/',$resimAdi);

                Bloglar::whereId($request->id)->update([
                    'baslik' => $request->baslik,
                    'detay' => $request->detay,
                    'resim' => $resimAdi,
                ]);
                return redirect()->back()->with('success', 'Blog Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        } else {
            if ($request->baslik!='' && $request->detay!='') {
                Bloglar::whereId($request->id)->update([
                    'baslik' => $request->baslik,
                    'detay' => $request->detay,
                ]);
                return redirect()->back()->with('success', 'Blog Oluşturma Başarılı');
            } else {
                return redirect()->back()->with('error', 'Lütfen Bütün Alanları Doldurun');
            }
        }
    }
}
