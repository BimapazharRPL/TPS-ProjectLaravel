<?php
use App\Models\Statistik;
$statistikData = Statistik::all();

foreach ($statistikData as $dataK) {
    $pengumpulan = $dataK->pengumpulan_S;
    $residu = $dataK->residu_S;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Dashboard</title>
    <link rel="icon" href="gambar/logoTPS.jpg">
  </head>
  <body>
    
    <div class="header">
      <p>TPS Bersama Warga Bersih Lingkungan</p>
    </div>
    <div class="sm">
    <div class="navbar">
      <img src="gambar/editlogoTPS.png" alt="" />
      <div class="text">
        <a href="home"><p>BERANDA</p></a>
        @if(Auth::check() && Auth::user()->status == 'AdminTPS')
      <a href="pembayaranq"><p>PEMBAYARAN</p></a>
      @else
      <a href="Pembayaran"><p>PEMBAYARAN</p></a>
      @endif
        <a href="Peraturan"><p>PERATURAN</p></a>
        <a href="#peta"><p>PETA TPS3R</p></a>
        <a href="Statistik"><p>STATISTIK</p></a>
        
        @if(Auth::check() && Auth::user()->status == 'AdminTPS')
            <a href="Admin"><p>ADMIN</p></a>
        @else
            <a href="Kontak-kami"><p>KONTAK KAMI</p></a>
        @endif
</div>
      <a class="mnl" onclick="toggleMenu()">MENU</a>
      <div id="personIcon" onclick="toggleProfileInfo()">
      <i class="bi bi-person-circle"></i>
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
      </svg>
      </div>
    </div>
    <div id="profileInfo" class="use">
    <p>{{ Auth::user()->name }}</p>
    <p>{{ Auth::user()->email }}</p>
    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link btn btn-warning">Logout</button>
    </form>
</div>
    </div>
    <div class="gene">
      <a href=""><p>BERANDA</p></a>
      @if(Auth::check() && Auth::user()->status == 'AdminTPS')
      <a href="pembayaranq"><p>PEMBAYARAN</p></a>
      @else
      <a href="Pembayaran"><p>PEMBAYARAN</p></a>
      @endif
      <a href="Peraturan"><p>PERATURAN</p></a>
      <a href="Statistik"><p>STATISTIK</p></a>
      @if(Auth::check() && Auth::user()->status == 'AdminTPS')
            <a href="Admin"><p>ADMIN</p></a>
        @else
            <a href="Kontak-kami"><p>KONTAK KAMI</p></a>
        @endif
    </div>
    <div class="isi">
      <img src="gambar/gambarTPS.jpg" alt="" />
      <p class="ps" data-aos="fade-right">Pengelolaan Sampah</p>
      <p class="tps" data-aos="fade-right">TPS 3R</p>
      <p class="rr" data-aos="fade-right">Reduce, Reuse, Recycle</p>
      <p class="br" data-aos="fade-right">Bambu Raya</p>
    </div>
    <div class="edukasi">
      <img src="gambar/logoTPS-rem.png" alt="Logo TPS" />
      <div>
        <p id="typing">
          Apa itu TPS 3R? Apa perbedaan dengan TPS biasa? TPS 3R adalah tempat
          pembungan sampah dengan konsep untuk mengurangi (reduce), menggunakan
          kembali (reuse) dan daur ulang (recycle). TPS 3R berfungsi untuk
          melayani suatu kelompok masyarakat (termasuk di kawasan masyarakat
          berpenghasilan rendah) yang terdiri dari minimal 400 rumah atau kepala
          keluarga.
        </p>
        <p>
          Sampah yang kita hasilkan biasanya kita buang ke tempat sampah dan
          kemudian kita bawa ke Tempat Penampungan Sementara (TPS). TPS yaitu
          tempat sebelum sampah diangkut ke tempat pendauran ulang, pengolahan,
          dan/atau tempat pengolahan sampah terpadu.
        </p>
      </div>
    </div>
    <div class="peraturan">
      <h1 style="margin-top: 3rem">PERATURAN</h1>
      <div class="ran">
        <div class="tur" data-aos="flip-left">
          <img src="gambar/law.png" alt="" />
          <p style="font-weight: bold;">Undang - Undang Nomor 18 Tahun 2008 tentang Pengelola sampah</p>
          <p>Undang - Undang ini mengatur tentang pengelola sampah, mulai dari pengurangan, pemilihan, pengumpulan, pengangkutan, hingga pengelolahan sampah</p>
        </div>
        <div class="tur" data-aos="flip-left">
          <img src="gambar/law.png" alt="" />
          <p style="font-weight: bold;">Undang - Undang Nomor 32 Tahun 2009 tentang Perlindungan dan Pengelola  Lingkungan Hidup</p>
          <p>Undang - Undang ini mengatur tentang Perlindungan dan Pengelola  lingkungan hidup, termasuk di dalamnya pengelolaan sampah</p>
        </div>
        <div class="tur" data-aos="flip-left">
          <img src="gambar/law.png" alt="" />
          <p style="font-weight: bold;">Peraturan Membayaran Di TPS3R Bambu Raya</p>
          <p>Di wajib kan tidak boleh bayar lebih dari 3 bulan jika melanggar maka sampah nya tidak akan di angkut lagi</p>
        </div>
        <div class="tur" data-aos="flip-left">
          <img src="gambar/law.png" alt="" />
          <p style="font-weight: bold;">Peraturan Pemerintah Nomor 75 Tahun 2019 tentang Pengelola Sampah Plastik </p>
          <p>Peraturan ini mengatur tentang pengelola sampah plastik</p>
        </div>
      </div>
      <a href="Peraturan" class="sel">Lihat Selengkapnya</a>
    </div>
    <div class="stastik">
    @if(Auth::check() && Auth::user()->status == 'AdminTPS')
      <h1>STATISTIK</h1>
      <div class="stas">
        <div class="anggota" data-aos="zoom-out-left">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="76"
            height="76"
            fill="currentColor"
            class="bi bi-people-fill"
            viewBox="0 0 16 16"
          >
            <path
              d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"
            />
          </svg>
          <i class="bi bi-people-fill"></i>
          <p class="org">Pengurus</p>
          <p class="jum">@foreach($statistikData as $data)
            {{ $data->pengurus ?? 0}}
        @endforeach
                </p>
        </div>
        <div class="nasabah" data-aos="zoom-out-right">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="76"
            height="76"
            fill="currentColor"
            class="bi bi-people-fill"
            viewBox="0 0 16 16"
          >
            <path
              d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"
            />
          </svg>
          <i class="bi bi-people-fill"></i>
          <p class="org">Pelanggan</p>
          <p class="jum">
            @foreach($statistikData as $data)
            {{ $data->pelanggan ?? 0}}
                @endforeach</p>
        </div>
      </div>
      <div class="tik">
        <div class="it">
          <div
            class="item"
            data-aos="fade-down"
            data-aos-easing="linear"
            data-aos-duration="1500"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="56"
              height="56"
              fill="currentColor"
              class="bi bi-list-task"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z"
              />
              <path
                d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z"
              />
              <path
                fill-rule="evenodd"
                d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z"
              />
            </svg>
            <i class="bi bi-list-task"></i>
            <div class="tul">
              <p class="ang">3</p>
              <p class="ket">Jenis sampah</p>
            </div>
          </div>
          <div
            class="item"
            data-aos="fade-down"
            data-aos-easing="linear"
            data-aos-duration="1500"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="56"
              height="56"
              fill="currentColor"
              class="bi bi-database-fill"
              viewBox="0 0 16 16"
            >
              <path
                d="M3.904 1.777C4.978 1.289 6.427 1 8 1s3.022.289 4.096.777C13.125 2.245 14 2.993 14 4s-.875 1.755-1.904 2.223C11.022 6.711 9.573 7 8 7s-3.022-.289-4.096-.777C2.875 5.755 2 5.007 2 4s.875-1.755 1.904-2.223"
              />
              <path
                d="M2 6.161V7c0 1.007.875 1.755 1.904 2.223C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777C13.125 8.755 14 8.007 14 7v-.839c-.457.432-1.004.751-1.49.972C11.278 7.693 9.682 8 8 8s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972"
              />
              <path
                d="M2 9.161V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13s3.022-.289 4.096-.777C13.125 11.755 14 11.007 14 10v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972"
              />
              <path
                d="M2 12.161V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972"
              />
            </svg>
            <i class="bi bi-database-fill"></i>
            <div class="tul">
              <p class="ang">{{ $pengumpulan ?? 0 }}</p>
              <p class="ket">Sampah <br />dikumpulkan</p>
            </div>
          </div>
          
          <div
            class="item"
            data-aos="fade-down"
            data-aos-easing="linear"
            data-aos-duration="1500"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="56"
              height="56"
              fill="currentColor"
              class="bi bi-trash-fill"
              viewBox="0 0 16 16"
            >
              <path
                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"
              />
            </svg>
            <i class="bi bi-trash-fill"></i>
            <div class="tul">
              <p class="ang">{{ $residu ?? 0 }}</p>
              <p class="ket">Residu</p>
            </div>
          </div>
        </div>
      </div>
      @else
      <h1>Yuk Mari Pilah Sampah <br>Dari Tempat Kalian Masing-Masing</h1>
      <h2>Ayo Pilah Sampah Sesuai Jenisnya</h2>
      
        <div class="At">
          <div
            class="Atem"
            data-aos="fade-down"
            data-aos-easing="linear"
            data-aos-duration="1500"
          > 
          <p class="judul">Sampah Organik</p>
          <img src="gambar/s_organik.jpg" alt="">
          <p class="jelasan">Sampah sisa makanan
            dapur dan tanaman 
            dapat dijadikan pupuk 
            kompos</p>
          </div>
          <div
            class="Atem"
            data-aos="fade-down"
            data-aos-easing="linear"
            data-aos-duration="1500"
          >
          <p class="judul">Sampah Anorganik</p>
          <img src="gambar/anorganik.jpg" alt="">
          <p class="jelasan">Sampah yang dapat 
            dimanfaatkan kembali
            dan dapat didaur ulang
            seperti kertas,kaleng 
            dan gelas</p>
          </div>
          <div
            class="Atem"
            data-aos="fade-down"
            data-aos-easing="linear"
            data-aos-duration="1500"
          >
          <p class="judul">Sampah B3</p>
          <img src="gambar/B3.jpg" alt="">
          <p class="jelasan">Sampah B3 bisa diolah ulang jadi bahan baru, energi alternatif, bahan baku industri,  atau
            pupuk organik</p>
          </div>
          @endif
    </div>
    <div class="peta" id="peta">
      <p>PETA TPS3R</p>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d204.27680359429218!2d107.33359234962339!3d-6.330872542392701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6977b5881e1103%3A0x5141c3eb84784803!2sTPS3R%20Bambu%20Raya!5e1!3m2!1sid!2ssg!4v1706371049714!5m2!1sid!2ssg"
        width="800"
        height="450"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </div>
    <div class="footer">
      <img src="gambar/logoTPSunF.jpg" alt="" />
      <div class="t1">
        <p class="ftp">TPS 3R</p>
        <p class="frr">Reduce, Reuse, Recycle</p>
      </div>
      <div class="t2">
        <div class="d1">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-envelope-fill"
            viewBox="0 0 16 16"
          >
            <path
              d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"
            />
          </svg>
          <i class="bi bi-envelope-fill"></i>
          <p>tps3r.br@gmail.com</p>
        </div>
        <div class="d2">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-telephone-fill"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"
            />
          </svg>
          <i class="bi bi-telephone-fill"></i>
          <p>0856 7133 670</p>
        </div>
      </div>
      <p class="alam">
        Dusun Krajan 2, RT 06/RW 02<br />Warungbambu, Kec. Karawang Timur<br />Kab
        Karawang, Jawa Barat
      </p>
    </div>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap");
      body {
        margin: 0;
        padding: 0;
      }
      * {
        font-family: Poppins;
      }

      .header {
        width: 100%;
        height: 3rem;
        position: fixed;
        z-index: 9999;
        background-color: rgb(143, 175, 243);
      }
      .header p {
        font-size: 1.5rem;
        transform: translate(100%, -50%);
        position: fixed;
        color: #fff;
        font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
          sans-serif;
        animation: gerak-ke-kiri 20s linear infinite;
      }
      @keyframes gerak-ke-kiri {
        0% {
          transform: translate(360%, -50%);
        }
        100% {
          transform: translate(-100%, -50%);
        }
      }
      .navbar img {
        height: 4rem;
        margin-left: 2rem;
        /* margin-top: -1rem; */
      }
      .text {
        width: 60%;
        display: flex;
        align-items: center;
        justify-content: space-around;
        margin-left: 5rem;
      }
      .text a {
        text-decoration: none;
        color: #fff;
      }
      .text a:hover {
        color: black;
      }
      .navbar {
        margin-top: 3rem;
        display: flex;
        align-items: center;
        justify-content: space-around;
        font-size: 1rem;
        color: #ffff;
        font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
          sans-serif;
        background-color: rgb(82, 146, 91);
        width: 100%;
        font-weight: bold;
        z-index: 9999;
        height: 5rem;
        position: fixed;
      }
      
      .isi img {
        width: 100%;
        margin-top: 4.3rem;
      }
      .isi p {
        margin-left: 1rem;
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.897),
          -2px -2px 2px rgb(0, 0, 0);
      }

      .ps {
        margin-top: -29rem;
        font-weight: bold;
        font-size: 2rem;
      }
      .tps {
        margin-top: -2rem;
        font-weight: bold;
        font-size: 5rem;
      }
      .rr {
        margin-top: -6rem;
        font-weight: bold;
        font-size: 3rem;
      }
      .br {
        margin-top: -4rem;
        font-weight: bold;
        font-size: 3rem;
      }
      .peta {
        /* margin-left: 7rem; */
        /* margin-top: 20rem; */
        background-color: transparent; /* Ubah background-color menjadi transparent */
        background-image: url("gambar/gmrPeta.jpg"); /* Ganti 'nama_gambar.jpg' dengan nama file gambar Anda */
        background-size: cover;
        background-repeat: no-repeat; /* Agar gambar tidak diulang */
        background-position: center;
        /* display: flex; */
        align-items: center;
        justify-content: center;
        padding: 4rem;
        /* height: 29rem; */
      }
      iframe {
        margin-left: 13rem;
      }
      .peta p {
        font-size: 2rem;
        font-weight: bold;
        font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
          sans-serif;
      }
      /* .peta img {
        width: 100%;
        margin-top: -19rem;
      } */
      .edukasi {
        width: 100%;
        height: 35rem;
        margin-top: 18rem;
        display: flex;
        align-items: center;
        justify-content: space-around;
      }
      .edukasi img {
        width: 25rem;
      }
      .edukasi div {
        width: 30rem;
      }
      .edukasi div p {
        font-size: 1.4rem;
      }
      .peraturan {
        margin-top: 5rem;
        width: 100%;
        /* padding: 5px; */
        font-size: 13px;
        padding-top: 0.4px;
        /* height: 30rem; */
        text-align: center;
        background-color: transparent; /* Ubah background-color menjadi transparent */
        background-image: url("gambar/gambarTPS2.jpg"); /* Ganti 'nama_gambar.jpg' dengan nama file gambar Anda */
        background-size: cover; /* Untuk memastikan gambar mencakup seluruh area latar belakang */
        background-repeat: no-repeat; /* Agar gambar tidak diulang */
        background-position: center;
      }

      .ran {
        width: 100%;
        height: 35rem;
        display: flex;
        align-items: center;
        justify-content: space-around;
        z-index: 999999;
      }
      .tur {
        height: 20rem;
        padding: 10px;
        background-color: rgb(248, 248, 248);
        /* justify-content: space-around; */
        width: 15rem;

        /* z-index: 9999; */
      }
      .tur img {
        width: 6rem;
        border-bottom: solid 1px #000000;
        padding: 0.5rem;
      }
      .sel {
        font-size: 2rem;
        margin: 9rem;
        text-decoration: none;
        background-color: rgb(231, 253, 253);
        padding: 10px 2rem;
        border-radius: 20px;
        border: solid 1px black;
      }
      .footer {
        background-color: white;
        height: 10rem;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-around;
      }
      .footer img {
        height: 7rem;
        border-radius: 20px;
      }
      .t1 p {
        color: #000;
        font-weight: bold;
        line-height: 1px;
        /* text-align: center; */
      }
      .ftp {
        font-size: 2rem;
        font-family: cursive;
      }
      .alam {
        color: #000;
      }
      .footer svg {
        color: #000;
      }
      .t2 p {
        color: #000;
        margin-left: 1rem;
        line-height: 1px;
      }
      .d1,
      .d2 {
        display: flex;
        align-items: center;
      }
      .stastik {
        height: auto;
        width: 100%;
        padding-top: 1px;
        background-color: #2ce68f;
        /* background-image: linear-gradient(
          90deg,
          #00dbde 1%,
          #fc00ff 33%,
          #217bff 66%,
          #ffe97d 100%
        );
        background-size: 400%;
        animation: gradient-animation 20s infinite alternate; */
      }
      /* @keyframes gradient-animation {
        0% {
          background-position: left;
        }
        100% {
          background-position: right;
        }
      } */

      .stastik h1 {
        text-align: center;
      }
      .stas {
        display: flex;
        align-items: center;
        justify-content: space-around;
        line-height: 1px;
        text-align: center;
      }
      .org {
        font-size: 2rem;
        font-weight: bold;
        margin-top: 8px;
      }
      .jum {
        font-size: 3rem;
        font-family: cursive;
        font-weight: bold;
      }
      .tik {
        width: 100%;
        /* height: 30rem; */
        display: flex;
        justify-content: center;
      }
      .it {
        width: 80%;
        /* background-color: #ffe97d; */
        justify-content: center;
        display: flex;
        flex-wrap: wrap;
      }
      .item {
        width: 20rem;
        height: 10rem;
        background-color: aliceblue;
        border-radius: 3rem;
        /* margin-right: 10rem; */
        margin: 1px 5rem 1rem 5rem;
        padding: 1rem;
        display: flex;
        align-items: center;

        /* justify-content: space-around; */
      }
      .item svg {
        margin-left: 2rem;
      }
      .tul {
        line-height: 0rem;
        height: -10rem;
        margin-left: 2rem;
        font-family: Poppins;
      }
      .ang {
        font-size: 3rem;
        font-weight: bold;
      }
      .ket {
        font-size: 1.7rem;
        font-weight: bold;
        /* height: 5rem; */
        line-height: 2rem;
      }
      
      /* .cc {
        margin-top: -10rem;
        position: relative;
        z-index: 9999;
      } */
      .mnl {
        display: none;
      }
      .gene {
        display: none;
        height: 2rem;
      }
      .sm svg {
        cursor: pointer;
        margin-right: 2rem;
      }
      .use {
        display: none;
        height: 8rem;
        width: auto;
        color: #000;
        z-index: 999;
        right: 1rem;
        text-align: center;
        background-color: #ffff;
        padding: 1rem;
        position: fixed;
        border-radius: 10px;
        margin: 9rem 0rem;
        box-shadow: 1px 0 10px rgba(0, 0, 0, 0.8);
      }
      
      /* #profileInfo button {
          padding: 5px 10px; 
          color: #fff; 
          background-color: #ffc107; 
          border: none;
          border-radius: 3px; 
          cursor: pointer; 
          font-size: 1rem;
      }

      #profileInfo button:hover {
          background-color: #ff9800; 
      } */
      .nav-link.btn.btn-warning {
    color: #fff;
    background-color: #ffc107;
    border-color: #ffc107;
    font-size: 15px;
    padding: 7px 15px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

/* CSS untuk Hover Tombol Logout */
.nav-link.btn.btn-warning:hover {
    background-color: #e0a800;
}
      
      .stastik h1, h2 {
        text-align: center;
        color: #fff;
      }
      .stastik h2 {
        margin-top: -20px;
      }
      .judul {
        font-size: 1.8rem;
      }
      .Atem img {
        width: 20rem;
        margin-top: -25px;
      }
      .At {
        width: 100%;
        /* background-color: #ffe97d; */
        justify-content: center;
        display: flex;
        
      }
      .Atem {
        text-align: center;
        width: 25rem;
        height: auto;
        background-color: #fff;
        border-radius: 1rem;
        margin: 35px 2rem 3rem 2rem;
        padding: 1rem;
        /* display: flex; */
        /* border : solid 5px black; */
      }
      
      .jelasan {
        color: #fff;
        background-color: #1c9846;
        padding: 1rem;
        border-radius: 10px;
        text-align: left;                                              
      }
      @media only screen and (max-width: 600px) {
        .header {
          height: 2.5rem;
        }
        .header p {
          margin-top: 15px;
          font-size: 1.2rem;
          height: 1rem;
        }
        @keyframes gerak-ke-kiri {
          0% {
            transform: translate(170%, -50%);
          }
          100% {
            transform: translate(-100%, -50%);
          }
        }
        .navbar {
          margin-top: 2.5rem;
          height: 4rem;
        }
        .text {
          display: none;
        }
        .navbar img {
          height: 3rem;
          margin-left: -10px;
          /* margin-top: -1rem; */
        }
        .mnl {
          display: inline-block;
          font-size: 0.9rem;
          text-align: center;
          cursor: pointer;
        }
        .tombol {
          margin-right: -1rem;
          width: 29%;
          justify-content: space-between;
        }
        .tombol a {
          padding: 4px 8px;
        }
        .isi img {
          margin-top: 6rem;
        }
        .ps {
          font-size: 1rem;
          margin-top: -9rem;
        }
        .tps {
          margin-top: -2rem;
          font-size: 3rem;
        }
        .rr {
          margin-top: -4rem;
          font-size: 1rem;
        }
        .br {
          margin-top: -1.3rem;
          font-size: 1rem;
        }
        .edukasi {
          /* background-color: aqua; */
          border-bottom: solid 1px rgb(61, 61, 61);
          margin-top: 2rem;
          height: 20rem;
        }
        .edukasi img {
          width: 10rem;
        }
        .edukasi div p {
          font-size: 0.8rem;
        }
        .peraturan {
          margin-top: 0;
          font-size: 10px;
          background-image: none;
        }
        .ran {
          display: flex;
          flex-wrap: wrap;
        }
        .tur {
          height: 15rem;
          width: 12rem;
          background-color: #f1f1f1;
          box-shadow: 1px 0 10px rgba(0, 0, 0, 0.6);
        }
        .tur img {
          margin-top: -5px;
          width: 4rem;
        }
        .sel {
          font-size: 1rem;
          padding: 5px 10px;
        }
        .peta {
          padding: 1rem;
        }
        iframe {
          margin-left: 0;
          width: 100%;
        }
        .stastik {
          height: auto;
        }
        .it {
          width: 100%;
        }
        .item {
          width: 15rem;
          height: 8rem;
          padding: 4px;
          border-radius: 2rem;
        }
        .item svg {
          margin-left: 1rem;
        }
        .ang {
          font-size: 2rem;
        }
        .ket {
          font-size: 1rem;
          line-height: 1rem;
        }
        .footer {
          height: 8rem;
        }
        .footer img {
          height: 4rem;
        }
        .ftp {
          font-size: 2rem;
        }
        .frr {
          font-size: 0.8rem;
        }
        .t2 p {
          margin-left: 0.8rem;
          font-size: 15px;
        }
        .alam {
          display: none;
        }
        /* .gene {
        display: inline-block;
        display: flex;
        justify-content: space-around;
        margin-top: 4rem;
        align-items: center;
        background-color: white;
        height: 2rem;
        width: 100%;
        position: fixed;
        z-index: 999;
        
      } */
      .gene {
        display: inline-block;
        display: flex;
        justify-content: space-around;
        margin-top: 6.5rem;
        align-items: center;
        background-color: white;
        height: 2rem;
        width: 100%;
        position: fixed;
        z-index: 999;
        transition: transform 0.3s ease-out;
        transform: translateY(-100%);
}

      .gene a {
        text-decoration: none;
        
        color: #000000;
        font-weight: bold;
      }
      .gene p {
        font-size: 0.7rem;
      }
      .use {
        padding: 5px;
        margin : 7rem 0rem;
        font-size: 14px;
      }
      #profileInfo button {
        font-size: 14px;
      }
      .At {
          width: 100%;
          display: flex;
          flex-wrap: wrap;
        }
        .Atem {
          width: 35rem;
          height: auto;
          padding: 4px;
          border-radius: 1rem;
        }
      }
      @media only screen and (max-width: 400px) {
        .header {
          height: 2.5rem;
        }
        .header p {
          margin-top: 15px;
          font-size: 1.2rem;
          height: 1rem;
        }
        @keyframes gerak-ke-kiri {
          0% {
            transform: translate(170%, -50%);
          }
          100% {
            transform: translate(-100%, -50%);
          }
        }
        .navbar {
          margin-top: 2.5rem;
          height: 4rem;
        }
        .text {
          display: none;
        }
        .navbar img {
          height: 3rem;
          margin-left: -20px;
          /* margin-top: -1rem; */
        }
        .mnl {
          display: inline-block;
          font-size: 0.9rem;
          text-align: center;
          cursor: pointer;
          margin-left: -50px;
        }
        #personIcon {
          margin-right: -2rem;
        }
        .isi img {
          margin-top: 6rem;
        }
        .ps {
          font-size: 1rem;
          margin-top: -9rem;
        }
        .tps {
          margin-top: -2rem;
          font-size: 3rem;
        }
        .rr {
          margin-top: -4rem;
          font-size: 1rem;
        }
        .br {
          margin-top: -1.3rem;
          font-size: 1rem;
        }
        .edukasi {
          /* background-color: aqua; */
          border-bottom: solid 1px rgb(61, 61, 61);
          margin-top: 2rem;
          height: auto;
          display: block;
          justify-content: none;
          text-align: center;
        }
        .edukasi div {
        width: auto;
        padding: 1rem;
        text-align: center;
      }
        .edukasi img {
          width: 12rem;
        }
        .edukasi div p {
          font-size: 0.8rem;
          width: 100%;
        }
        .peraturan {
          height: auto;
          margin-top: 0;
          font-size: 10px;
          background-image: none;
        }
        .ran {
          display: flex;
          flex-wrap: wrap;
          height: auto;
        }
        .tur {
          min-height: 17rem;
          margin-bottom: 2rem;
          width: 9rem;
          background-color: #f1f1f1;
          box-shadow: 1px 0 10px rgba(0, 0, 0, 0.6);
        }
        .tur img {
          margin-top: -5px;
          width: 4rem;
        }
        .sel {
          font-size: 15px;
          margin-top: 61rem;
          margin: 0;
          padding: 5px 10px;
        }
        .peta {
          padding: 1rem;
        }
        iframe {
          margin-left: 0;
          width: 100%;
        }
        .stastik {
          height: auto;
        }
        .it {
          width: 100%;
        }
        .item {
          width: 15rem;
          height: 8rem;
          padding: 4px;
          border-radius: 2rem;
        }
        .item svg {
          margin-left: 1rem;
        }
        .ang {
          font-size: 2rem;
        }
        .ket {
          font-size: 1rem;
          line-height: 1rem;
        }
        .footer {
          height: 7rem;
        }
        .footer img {
          height: 3.6rem;
        }
        .ftp {
          font-size: 1.5rem;
        }
        .frr {
          font-size: 0.6rem;
         
        }
        .t2 p {
          margin-left: 0.5rem;
          font-size: 11px;
        }
        .alam {
          display: none;
        }
      .gene {
        display: inline-block;
        display: flex;
        justify-content: space-around;
        margin-top: 6.5rem;
        align-items: center;
        background-color: white;
        height: 2rem;
        width: 100%;
        position: fixed;
        z-index: 999;
        transition: transform 0.3s ease-out;
        transform: translateY(-100%);
}

      .gene a {
        text-decoration: none;
        
        color: #000000;
        font-weight: bold;
      }
      .gene p {
        font-size: 0.7rem;
      }
      .nav-link.btn.btn-warning {
          font-size: 11px;
        }
      }
    </style>
  </body>
  <script src="https://unpkg.com/typeit@@{TYPEIT_VERSION}/dist/index.umd.js"></script>
  <script>
document.addEventListener("DOMContentLoaded", function () {
    new TypeIt("#typing", {
      strings: [""],
    }).go();
  });
</script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    function toggleMenu() {
    var geneMenu = document.querySelector('.gene');
    geneMenu.style.transform = geneMenu.style.transform === 'translateY(0)' ? 'translateY(-100%)' : 'translateY(0)';
}
document.addEventListener('click', function (event) {
    var geneMenu = document.querySelector('.gene');
    var menuButton = document.querySelector('.mnl');
    
    if (!geneMenu.contains(event.target) && event.target !== menuButton) {
        geneMenu.style.transform = 'translateY(-100%)';
    }
});



function toggleProfileInfo() {
        var profileInfo = document.getElementById("profileInfo");
        if (profileInfo.style.display === "none" || profileInfo.style.display === "use") {
            profileInfo.style.display = "block";
        } else {
            profileInfo.style.display = "none";
        }
    }
    
</script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Periksa apakah halaman diakses melalui route 'peta'
            var isPetaRoute = window.location.pathname.includes('/peta');

            if (isPetaRoute) {
                var targetElement = document.getElementById('peta');
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    </script>
</html>
