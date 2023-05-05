<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KurumlarController;
use App\Http\Controllers\YoneticilerController;
use App\Http\Controllers\GenelayarController;
use App\Http\Controllers\DersprogramlariController;
use App\Http\Controllers\SiniflarController;
use App\Http\Controllers\DerssaatController;
use App\Http\Controllers\KonularController;
use App\Http\Controllers\YemekmenusuController;
use App\Http\Controllers\DuyurularController;
use App\Http\Controllers\EtkinliklerController;
use App\Http\Controllers\BloglarController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\OgretmenlerController;
use App\Http\Controllers\OgrencilerController;
use App\Http\Controllers\ToplumailController;
use App\Http\Controllers\ToplusmsController;
use App\Http\Controllers\KurumyonetimController;
use App\Http\Controllers\ZoomController;
use App\Http\Controllers\YoneticileryonetimController;
use App\Http\Controllers\SinavsonucController;
use App\Http\Controllers\VelilerController;
use App\Http\Controllers\MesajlarController;
use App\Http\Controllers\OdevlerController;
use App\Http\Controllers\YoklamaController;

// Login İşlemleri

Route::get('/login',[LoginController::class, 'login']);
Route::get('/logout',[LoginController::class, 'logout']);
Route::post('/decision',[LoginController::class, 'decision'])->name('decision');

// Post İşlemleri

Route::post('/kurumekle',[KurumlarController::class, 'kurumekle'])->name('kurumekle');
Route::post('/kurumduzenle',[KurumlarController::class, 'kurumduzenle'])->name('kurumduzenle');
Route::post('/yoneticiekle',[YoneticilerController::class, 'yoneticiekle'])->name('yoneticiekle');
Route::post('/yoneticiduzenle',[YoneticilerController::class, 'yoneticiduzenle'])->name('yoneticiduzenle');
Route::post('/siteayarekle',[GenelayarController::class, 'siteayarekle'])->name('siteayarekle');
Route::post('/mailayarekle',[GenelayarController::class, 'mailayarekle'])->name('mailayarekle');
Route::post('/smsayarekle',[GenelayarController::class, 'smsayarekle'])->name('smsayarekle');
Route::post('/girissliderekle',[GenelayarController::class, 'girissliderekle'])->name('girissliderekle');
Route::post('/dersprogramekle',[DersprogramlariController::class, 'dersprogramekle'])->name('dersprogramekle');
Route::post('/dersprogramduzenle',[DersprogramlariController::class, 'dersprogramduzenle'])->name('dersprogramduzenle');
Route::post('/sinifiekle',[SiniflarController::class, 'sinifiekle'])->name('sinifiekle');
Route::post('/sinifiduzenle',[SiniflarController::class, 'sinifiduzenle'])->name('sinifiduzenle');
Route::post('/derssaatiekle',[DerssaatController::class, 'derssaatiekle'])->name('derssaatiekle');
Route::post('/derssaatiduzenle',[DerssaatController::class, 'derssaatiduzenle'])->name('derssaatiduzenle');
Route::post('/konuyuekle',[KonularController::class, 'konuyuekle'])->name('konuyuekle');
Route::post('/konuyuduzenle',[KonularController::class, 'konuyuduzenle'])->name('konuyuduzenle');
Route::post('/menuekle',[YemekmenusuController::class, 'menuekle'])->name('menuekle');
Route::post('/menuduzenle',[YemekmenusuController::class, 'menuduzenle'])->name('menuduzenle');
Route::post('/duyuruyuekle',[DuyurularController::class, 'duyuruyuekle'])->name('duyuruyuekle');
Route::post('/duyuruyuduzenle',[DuyurularController::class, 'duyuruyuduzenle'])->name('duyuruyuduzenle');
Route::post('/etkinligiekle',[EtkinliklerController::class, 'etkinligiekle'])->name('etkinligiekle');
Route::post('/etkinligiduzenle',[EtkinliklerController::class, 'etkinligiduzenle'])->name('etkinligiduzenle');
Route::post('/bloguekle',[BloglarController::class, 'bloguekle'])->name('bloguekle');
Route::post('/bloguduzenle',[BloglarController::class, 'bloguduzenle'])->name('bloguduzenle');
Route::post('/slideriekle',[SliderController::class, 'slideriekle'])->name('slideriekle');
Route::post('/slideriduzenle',[SliderController::class, 'slideriduzenle'])->name('slideriduzenle');
Route::post('/videoyuekle',[VideoController::class, 'videoyuekle'])->name('videoyuekle');
Route::post('/videoyuduzenle',[VideoController::class, 'videoyuduzenle'])->name('videoyuduzenle');
Route::post('/ogretmeniekle',[OgretmenlerController::class, 'ogretmeniekle'])->name('ogretmeniekle');
Route::post('/ogretmeniduzenle',[OgretmenlerController::class, 'ogretmeniduzenle'])->name('ogretmeniduzenle');
Route::post('/ogrenciyiekle',[OgrencilerController::class, 'ogrenciyiekle'])->name('ogrenciyiekle');
Route::post('/ogrenciyiduzenle',[OgrencilerController::class, 'ogrenciyiduzenle'])->name('ogrenciyiduzenle');
Route::post('/toplumailigonder',[ToplumailController::class, 'toplumailigonder'])->name('toplumailigonder');
Route::post('/toplusmsigonder',[ToplusmsController::class, 'toplusmsigonder'])->name('toplusmsigonder');
Route::post('/kurumyonetimduzenle',[KurumyonetimController::class, 'kurumyonetimduzenle'])->name('kurumyonetimduzenle');
Route::post('/zoomduzenle',[ZoomController::class, 'zoomduzenle'])->name('zoomduzenle');
Route::post('/yoneticiyonetimiekle',[YoneticileryonetimController::class, 'yoneticiyonetimiekle'])->name('yoneticiyonetimiekle');
Route::post('/yoneticiyonetimiduzenle',[YoneticileryonetimController::class, 'yoneticiyonetimiduzenle'])->name('yoneticiyonetimiduzenle');
Route::post('/toplusinifiekle',[SiniflarController::class, 'toplusinifiekle'])->name('toplusinifiekle');
Route::post('/orneksinifexcel',[SiniflarController::class, 'orneksinifexcel'])->name('orneksinifexcel');
Route::post('/topluderssaatiniekle',[DerssaatController::class, 'topluderssaatiniekle'])->name('topluderssaatiniekle');
Route::post('/orneksaatexcel',[DerssaatController::class, 'orneksaatexcel'])->name('orneksaatexcel');
Route::post('/toplukonuyuekle',[KonularController::class, 'toplukonuyuekle'])->name('toplukonuyuekle');
Route::post('/ornekkonuexcel',[KonularController::class, 'ornekkonuexcel'])->name('ornekkonuexcel');
Route::post('/ornekmenuexcel',[YemekmenusuController::class, 'ornekmenuexcel'])->name('ornekmenuexcel');
Route::post('/toplumenuyuekle',[YemekmenusuController::class, 'toplumenuyuekle'])->name('toplumenuyuekle');
Route::post('/ornekogretmenexcel',[OgretmenlerController::class, 'ornekogretmenexcel'])->name('ornekogretmenexcel');
Route::post('/topluogretmeniekle',[OgretmenlerController::class, 'topluogretmeniekle'])->name('topluogretmeniekle');
Route::post('/ornekogrenciexcel',[OgrencilerController::class, 'ornekogrenciexcel'])->name('ornekogrenciexcel');
Route::post('/topluogrenciyiekle',[OgrencilerController::class, 'topluogrenciyiekle'])->name('topluogrenciyiekle');
Route::post('/tytsonucuekle',[SinavsonucController::class, 'tytsonucuekle'])->name('tytsonucuekle');
Route::post('/lgssonucuekle',[SinavsonucController::class, 'lgssonucuekle'])->name('lgssonucuekle');
Route::post('/veliyiekle',[VelilerController::class, 'veliyiekle'])->name('veliyiekle');
Route::post('/veliyiduzenle',[VelilerController::class, 'veliyiduzenle'])->name('veliyiduzenle');
Route::post('/ornektytexcel',[SinavsonucController::class, 'ornektytexcel'])->name('ornektytexcel');
Route::post('/orneklgsexcel',[SinavsonucController::class, 'orneklgsexcel'])->name('orneklgsexcel');
Route::post('/ornekveliexcel',[VelilerController::class, 'ornekveliexcel'])->name('ornekveliexcel');
Route::post('/topluveliyiekle',[VelilerController::class, 'topluveliyiekle'])->name('topluveliyiekle');
Route::post('/etkinligiekleogretmen',[EtkinliklerController::class, 'etkinligiekleogretmen'])->name('etkinligiekleogretmen');
Route::post('/odeviekleogretmen',[OdevlerController::class, 'odeviekleogretmen'])->name('odeviekleogretmen');
Route::post('/odeviduzenleogretmen',[OdevlerController::class, 'odeviduzenleogretmen'])->name('odeviduzenleogretmen');
Route::post('/odevgonderimogrenci',[OdevlerController::class, 'odevgonderimogrenci'])->name('odevgonderimogrenci');
Route::post('/odevdosyaindirogretmen',[OdevlerController::class, 'odevdosyaindirogretmen'])->name('odevdosyaindirogretmen');
Route::post('/odevdegerlendir',[OdevlerController::class, 'odevdegerlendir'])->name('odevdegerlendir');
Route::post('/odevdosyaindir',[OdevlerController::class, 'odevdosyaindir'])->name('odevdosyaindir');
Route::post('/yoklamaduzenle',[YoklamaController::class, 'yoklamaduzenle'])->name('yoklamaduzenle');
Route::post('/ornekdersexcel',[DersprogramlariController::class, 'ornekdersexcel'])->name('ornekdersexcel');
Route::post('/topludersiekle',[DersprogramlariController::class, 'topludersiekle'])->name('topludersiekle');

// Sayfa Bağlantıları

Route::get('/',[HomeController::class, 'site']);
Route::get('/home',[HomeController::class, 'home']);

// Admin Sayfaları

Route::get('/adminhome',[HomeController::class, 'admin']);

Route::get('/kurumlar',[KurumlarController::class, 'liste']);
Route::get('/kurumekle',[KurumlarController::class, 'ekle']);
Route::get('/kurumduzenle',[KurumlarController::class, 'duzenle']);
Route::get('/kurumsil',[KurumlarController::class, 'kurumsil']);

Route::get('/yoneticiler',[YoneticilerController::class, 'liste']);
Route::get('/yoneticiekle',[YoneticilerController::class, 'ekle']);
Route::get('/yoneticiduzenle',[YoneticilerController::class, 'duzenle']);
Route::get('/yoneticisil',[YoneticilerController::class, 'yoneticisil']);

Route::get('/girisslider',[GenelayarController::class, 'girisslider']);

Route::get('/siteayar',[GenelayarController::class, 'siteayar']);
Route::get('/mailayar',[GenelayarController::class, 'mailayar']);
Route::get('/smsayar',[GenelayarController::class, 'smsayar']);

// Yönetici Sayfaları

Route::get('/yoneticihome',[HomeController::class, 'yonetici']);

Route::get('/dersprogramlari',[DersprogramlariController::class, 'dersprogramlari']);
Route::get('/dersprogramiekle',[DersprogramlariController::class, 'dersprogramiekle']);
Route::get('/dersprogramiduzenle',[DersprogramlariController::class, 'dersprogramiduzenle']);
Route::get('/topludersekle',[DersprogramlariController::class, 'topludersekle']);

Route::get('/odevtakipyonetici',[OdevlerController::class, 'odevtakipyonetici']);
Route::get('/yoklamayonetici',[YoklamaController::class, 'yoklamayonetici']);
Route::get('/yoklamaalyonetici',[YoklamaController::class, 'yoklamaalyonetici']);

Route::get('/siniflar',[SiniflarController::class, 'siniflar']);
Route::get('/sinifekle',[SiniflarController::class, 'sinifekle']);
Route::get('/sinifduzenle',[SiniflarController::class, 'sinifduzenle']);
Route::get('/toplusinifekle',[SiniflarController::class, 'toplusinifekle']);
Route::get('/sinifsil',[SiniflarController::class, 'sinifsil']);

Route::get('/saatler',[DerssaatController::class, 'saatler']);
Route::get('/saatekle',[DerssaatController::class, 'saatekle']);
Route::get('/saatduzenle',[DerssaatController::class, 'saatduzenle']);
Route::get('/topluderssaatiekle',[DerssaatController::class, 'topluderssaatiekle']);
Route::get('/saatsil',[DerssaatController::class, 'saatsil']);

Route::get('/konular',[KonularController::class, 'konular']);
Route::get('/konuekle',[KonularController::class, 'konuekle']);
Route::get('/konuduzenle',[KonularController::class, 'konuduzenle']);
Route::get('/toplukonuekle',[KonularController::class, 'toplukonuekle']);
Route::get('/konusil',[KonularController::class, 'konusil']);

Route::get('/yemekmenusu',[YemekmenusuController::class, 'yemekmenusu']);
Route::get('/yemekmenusuekle',[YemekmenusuController::class, 'yemekmenusuekle']);
Route::get('/yemekmenusuduzenle',[YemekmenusuController::class, 'yemekmenusuduzenle']);
Route::get('/toplumenuekle',[YemekmenusuController::class, 'toplumenuekle']);
Route::get('/menusil',[YemekmenusuController::class, 'menusil']);

Route::get('/duyurular',[DuyurularController::class, 'duyurular']);
Route::get('/duyuruekle',[DuyurularController::class, 'duyuruekle']);
Route::get('/duyuruduzenle',[DuyurularController::class, 'duyuruduzenle']);
Route::get('/duyurusil',[DuyurularController::class, 'duyurusil']);

Route::get('/etkinlikler',[EtkinliklerController::class, 'etkinlikler']);
Route::get('/etkinlikekle',[EtkinliklerController::class, 'etkinlikekle']);
Route::get('/etkinlikduzenle',[EtkinliklerController::class, 'etkinlikduzenle']);
Route::get('/etkinliksil',[EtkinliklerController::class, 'etkinliksil']);

Route::get('/bloglar',[BloglarController::class, 'bloglar']);
Route::get('/blogekle',[BloglarController::class, 'blogekle']);
Route::get('/blogduzenle',[BloglarController::class, 'blogduzenle']);
Route::get('/blogsil',[BloglarController::class, 'blogsil']);

Route::get('/sliderlar',[SliderController::class, 'sliderlar']);
Route::get('/sliderekle',[SliderController::class, 'sliderekle']);
Route::get('/sliderduzenle',[SliderController::class, 'sliderduzenle']);
Route::get('/slidersil',[SliderController::class, 'slidersil']);

Route::get('/videolar',[VideoController::class, 'videolar']);
Route::get('/videoekle',[VideoController::class, 'videoekle']);
Route::get('/videoduzenle',[VideoController::class, 'videoduzenle']);
Route::get('/videosil',[VideoController::class, 'videosil']);

Route::get('/ogretmenler',[OgretmenlerController::class, 'ogretmenler']);
Route::get('/ogretmenekle',[OgretmenlerController::class, 'ogretmenekle']);
Route::get('/ogretmenduzenle',[OgretmenlerController::class, 'ogretmenduzenle']);
Route::get('/topluogretmenekle',[OgretmenlerController::class, 'topluogretmenekle']);
Route::get('/ogretmensil',[OgretmenlerController::class, 'ogretmensil']);

Route::get('/ogrenciler',[OgrencilerController::class, 'ogrenciler']);
Route::get('/ogrenciekle',[OgrencilerController::class, 'ogrenciekle']);
Route::get('/ogrenciduzenle',[OgrencilerController::class, 'ogrenciduzenle']);
Route::get('/topluogrenciekle',[OgrencilerController::class, 'topluogrenciekle']);
Route::get('/ogrencisil',[OgrencilerController::class, 'ogrencisil']);

Route::get('/veliler',[VelilerController::class, 'veliler']);
Route::get('/veliekle',[VelilerController::class, 'veliekle']);
Route::get('/veliduzenle',[VelilerController::class, 'veliduzenle']);
Route::get('/velisil',[VelilerController::class, 'velisil']);
Route::get('/topluveliekle',[VelilerController::class, 'topluveliekle']);

Route::get('/toplumailgonder',[ToplumailController::class, 'toplumailgonder']);
Route::get('/toplusmsgonder',[ToplusmsController::class, 'toplusmsgonder']);

Route::get('/yoneticileryonetim',[YoneticileryonetimController::class, 'yoneticileryonetim']);
Route::get('/yoneticiyonetimekle',[YoneticileryonetimController::class, 'yoneticiyonetimekle']);
Route::get('/yoneticiyonetimduzenle',[YoneticileryonetimController::class, 'yoneticiyonetimduzenle']);
Route::get('/yoneticisil',[YoneticileryonetimController::class, 'yoneticisil']);

Route::get('/tytsonuclari',[SinavsonucController::class, 'tytsonuclari']);
Route::get('/lgssonuclari',[SinavsonucController::class, 'lgssonuclari']);
Route::get('/toplutytsonuclari',[SinavsonucController::class, 'toplutytsonuclari']);
Route::get('/toplulgssonuclari',[SinavsonucController::class, 'toplulgssonuclari']);
Route::get('/lgssil',[SinavsonucController::class, 'lgssil']);
Route::get('/tytsil',[SinavsonucController::class, 'tytsil']);

Route::get('/kurumyonetimi',[KurumyonetimController::class, 'kurumyonetimi']);
Route::get('/zoomyonetimi',[ZoomController::class, 'zoomyonetimi']);

// Öğretmen Sayfaları

Route::get('/ogretmenhome',[HomeController::class, 'ogretmen']);

Route::get('/dersprogramiogretmen',[DersprogramlariController::class, 'dersprogramiogretmen']);

Route::get('/odevlerogretmen',[OdevlerController::class, 'odevlerogretmen']);
Route::get('/odevekleogretmen',[OdevlerController::class, 'odevekleogretmen']);
Route::get('/odevduzenleogretmen',[OdevlerController::class, 'odevduzenleogretmen']);
Route::get('/odevsil',[OdevlerController::class, 'odevsil']);
Route::get('/gelenodevogretmen',[OdevlerController::class, 'gelenodevogretmen']);
Route::get('/odevdegerlendirogretmen',[OdevlerController::class, 'odevdegerlendirogretmen']);

Route::get('/yoklamaogretmen',[YoklamaController::class, 'yoklamaogretmen']);
Route::get('/yoklamaalogretmen',[YoklamaController::class, 'yoklamaalogretmen']);

Route::get('/ogrencilerogretmen',[OgrencilerController::class, 'ogrencilerogretmen']);

Route::get('/etkinliklerogretmen',[EtkinliklerController::class, 'etkinliklerogretmen']);
Route::get('/etkinlikdetayogretmen',[EtkinliklerController::class, 'etkinlikdetayogretmen']);
Route::get('/etkinlikekleogretmen',[EtkinliklerController::class, 'etkinlikekleogretmen']);
Route::get('/etkinlikduzenleogretmen',[EtkinliklerController::class, 'etkinlikduzenleogretmen']);

Route::get('/bloglarogretmen',[BloglarController::class, 'bloglarogretmen']);
Route::get('/blogdetayogretmen',[BloglarController::class, 'blogdetayogretmen']);

Route::get('/videolarogretmen',[VideoController::class, 'videolarogretmen']);
Route::get('/videodetayogretmen',[VideoController::class, 'videodetayogretmen']);

Route::get('/mesajogretmen',[MesajlarController::class, 'mesajogretmen']);

// Öğrenci Sayfaları

Route::get('/ogrencihome',[HomeController::class, 'ogrenci']);

Route::get('/dersprogramiogrenci',[DersprogramlariController::class, 'dersprogramiogrenci']);

Route::get('/odevogrenci',[OdevlerController::class, 'odevogrenci']);
Route::get('/odevgonderogrenci',[OdevlerController::class, 'odevgonderogrenci']);

Route::get('/yoklamaogrenci',[YoklamaController::class, 'yoklamaogrenci']);

Route::get('/ogretmenlerogrenci',[OgretmenlerController::class, 'ogretmenlerogrenci']);

Route::get('/etkinliklerogrenci',[EtkinliklerController::class, 'etkinliklerogrenci']);
Route::get('/etkinlikdetayogrenci',[EtkinliklerController::class, 'etkinlikdetayogrenci']);

Route::get('/videolarogrenci',[VideoController::class, 'videolarogrenci']);
Route::get('/videodetayogrenci',[VideoController::class, 'videodetayogrenci']);

Route::get('/lgssonuclariogrenci',[SinavsonucController::class, 'lgssonuclariogrenci']);
Route::get('/lgssonucdetayogrenci',[SinavsonucController::class, 'lgssonucdetayogrenci']);
Route::get('/tytsonuclariogrenci',[SinavsonucController::class, 'tytsonuclariogrenci']);
Route::get('/tytsonucdetayogrenci',[SinavsonucController::class, 'tytsonucdetayogrenci']);

Route::get('/bloglarogrenci',[BloglarController::class, 'bloglarogrenci']);
Route::get('/blogdetayogrenci',[BloglarController::class, 'blogdetayogrenci']);

Route::get('/mesajogrenci',[MesajlarController::class, 'mesajogrenci']);
