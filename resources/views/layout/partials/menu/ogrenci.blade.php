@php
    use App\Models\Ogretmenler;
    use App\Models\Ogrenciler;
    $ogrenci = Ogrenciler::where('id',session('ogrenci'))->first();
    $ogretmen = Ogretmenler::where('kurum',$ogrenci['kurum'])->first();
@endphp
<ul class="metismenu" id="menu">
    <li class="nav-label first">KATEGORİLER</li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-compass-1"></i>
            <span class="nav-text">Eğitim Takip</span>
        </a>

        <ul aria-expanded="false">

            <li><a href="dersprogramiogrenci">Ders Programı</a></li>

            <li><a href="odevogrenci">Ödev Takip</a></li>
            <li><a href="yoklamaogrenci">Yoklama</a></li>

        </ul>
    </li>

    <li class="nav-label">Kadro</li>

    <li><a class="has-arrow ai-icon" href="ogretmenlerogrenci" aria-expanded="false">
            <i class="flaticon-381-compass-1"></i>
            <span class="nav-text">Öğretmenler</span>
        </a> </li>



    <li class="nav-label">Mesaj</li>
    <li><a class="has-arrow ai-icon" href="mesajogrenci?id={{$ogretmen['id']}}" aria-expanded="false">
            <i class="flaticon-381-compass-1"></i>
            <span class="nav-text">Canlı Mesaj</span>
        </a> </li>

    <li class="nav-label">KURUMDAN ETKİNLİKLER</li>
    <li><a class="has-arrow ai-icon" href="etkinliklerogrenci" aria-expanded="false">
            <i class="flaticon-381-compass-1"></i>
            <span class="nav-text">Etkinlikler</span>
        </a> </li>


    <li class="nav-label">ONLİNE EĞİTİM</li>

    <li><a class="has-arrow ai-icon" href="videolarogrenci" aria-expanded="false">
            <i class="flaticon-381-compass-1"></i>
            <span class="nav-text">Ters Düz Eğitim</span>
        </a> </li>

    <li class="nav-label">Sınav Sonuçları</li>

    <li><a href="lgssonuclariogrenci">
            <i class="flaticon-381-compass-1"></i>LGS Sınav Sonuçları</a></li>
    </li>

    <li><a href="tytsonuclariogrenci">
            <i class="flaticon-381-compass-1"></i>TYT Sınav Sonuçları</a></a></li>
    </li>


    <li class="nav-label">Ek Sayfalar</li>

    <li>
        <a class="has-arrow ai-icon" href="bloglarogrenci" aria-expanded="false">
            <i class="flaticon-381-compass-1"></i>
            <span class="nav-text">Blog</span>
        </a>
    </li>

</ul>

<div class="copyright">
    <p class="fs-12">© Açık Akademi Online Eğitim <span class="heart"></span> <br>Tüm hakları sakldır.</p>
</div>
</div>
</div>
