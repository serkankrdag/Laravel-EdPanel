<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siniflar;
use App\Models\Kurumlar;
use App\Models\Yoneticiler;
use App\Models\Ogrenciler;
use App\Models\Ogretmenler;
use App\Models\Veliler;
use App\Models\Toplumail;
use App\Models\Mailayar;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ToplumailController extends Controller
{
    public function toplumailgonder() {
        if (session('successful')  == "successful" && session('yetki') == 2) {
            $kurum = Yoneticiler::where('kullaniciId',session('id'))->first();
            $siniflar = Siniflar::where('kurum',$kurum['kurum'])->get();
            $ogretmenler = Ogretmenler::where('kurum',$kurum['kurum'])->get();
            return view('include.yonetici.toplumailgonder', array('siniflar'=>$siniflar,'ogretmenler'=>$ogretmenler));
        } else {
            return redirect('login');
        }
    }

    public function toplumailigonder(Request $request) {
        if ($request->baslik!='' && $request->detay!='' && $request->sinif!='' && $request->kullanici!='') {

            $yonetici = Yoneticiler::where('kullaniciId',session('id'))->first();
            $kurum = Kurumlar::where('id',$yonetici['kurumId'])->first();
            $mailAyar = mailayar::where('id',1)->first();

            require 'PHPMailer/src/Exception.php';
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';

            $mail = new PHPMailer(true);

            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'mail.acikakademi.com.tr';
                $mail->SMTPAuth = true;
                $mail->Username = $mailAyar['kulAdi'];
                $mail->Password = $mailAyar['parola'];
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587; //25, /465, 587

                $mail->SMTPOptions = array(
                  'ssl' => array(
                      'verify_peer' => false,
                      'verify_peer_name' => false,
                      'allow_self_signed' => true
                  )
                );

                $mail->setFrom($kurum['mail'], $kurum['isim']);
                // $mail->addAddress('mserkankradg@gmail.com', 'Serkan Karadağ');

                $ogrenciler = Ogrenciler::where('sinifId',$request->sinif)->get();
                $ogretmenlerControl = Ogretmenler::all();
                $velilerControl = Veliler::all();

                if ($request->kullanici==1) {
                    foreach ($ogrenciler as $ogrenci) {
                        $mail->addAddress($ogrenci['eposta'], $ogrenci['isim']);

                        $mail->isHTML(true);
                        $mail->CharSet = 'UTF-8';
                        $mail->Subject = $request->baslik;
                        $mail->Body = $request->detay;

                        $mail->send();
                    }

                    toplumail::create([
                        'baslik' => $request->baslik,
                        'detay' => $request->detay,
                        'sinifId' => $request->sinif,
                        'kullanici' => 'Öğrenciler'
                    ]);
                }
                if ($request->kullanici==2) {
                    foreach ($ogretmenlerControl as $ogretmenSonuc) {
                        foreach (json_decode($ogretmenSonuc['sinif']) as $sinifId) {
                            if ($request->sinif==$sinifId) {
                                $mail->addAddress($ogretmenSonuc['eposta'], $ogretmenSonuc['isim']);

                                $mail->isHTML(true);
                                $mail->CharSet = 'UTF-8';
                                $mail->Subject = $request->baslik;
                                $mail->Body = $request->detay;

                                $mail->send();
                            }
                        }
                    }
                    toplumail::create([
                        'baslik' => $request->baslik,
                        'detay' => $request->detay,
                        'sinifId' => $request->sinif,
                        'kullanici' => 'Öğretmenler'
                    ]);
                }
                if ($request->kullanici==3) {
                    foreach ($velilerControl as $velilerSonuc) {
                        foreach (json_decode($velilerSonuc['ogrenciId']) as $ogrencisId) {
                            foreach ($ogrenciler as $ogrenci) {
                                if ($ogrenci['id']==$ogrencisId) {
                                    $mail->addAddress($velilerSonuc['eposta'], $velilerSonuc['isim']);

                                    $mail->isHTML(true);
                                    $mail->CharSet = 'UTF-8';
                                    $mail->Subject = $request->baslik;
                                    $mail->Body = $request->detay;

                                    $mail->send();
                                }
                            }
                        }
                    }
                    toplumail::create([
                        'baslik' => $request->baslik,
                        'detay' => $request->detay,
                        'sinifId' => $request->sinif,
                        'kullanici' => 'Veliler'
                    ]);
                }


                return redirect()->back()->with('success', 'Mail Gönderildi');
            } catch (Exception $e) {
                return redirect()->back()->with('error', 'Mail Gönderilemedi');
            }
        }
    }
}
