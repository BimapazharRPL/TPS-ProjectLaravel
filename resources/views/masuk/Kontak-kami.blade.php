<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="gambar/logoTPS.jpg">
    <title>Kontak Kami</title>
</head>
@extends('layouts.Masters')
@section('content')
<body>
  <div class="eyy">eyy</div>
    <div class="konmi" id="kontak">
        <h2>KONTAK KAMI</h2>
        <h3>
          TPS 3R Bambu Raya <br />Reduce, Reuse, Recycle<br />Organisasi Pengelola
          Sampah
        </h3>
        <ul>
          <li>
            Dusun Krajan 2, desa, RT.06/RW.02, Warungbambu, Kec. Karawang Timur,
            kab Karawang, Jawa Barat, Indonesia
          </li>
          <li>Telp 0856 7133 670</li>
          <li>tps3r.br@gmail.com</li>
        </ul>
      </div>
      <div class="foto">
        <h1>galery foto</h1>
        <div class="gal">
          <img src="gambar/galeryTPS.jpg" alt="">
          <img src="gambar/galeryTPS1.jpg" alt="">
          <img src="gambar/galeryTPS2.jpg" alt="">
          <img src="gambar/galeryTPS3.jpg" alt="">
        </div>
        
      </div>
      <style>
        body {
          margin: 0;
          padding: 0;
        }
        .eyy {
          width: 100%;
          height: 5rem;
        }
        .konmi {
        padding: 2rem;
        margin-top: 5rem;
      }
      .foto {
        margin-top: 3rem;
        margin-left: 2rem;
      }
      h1 {
        margin-left: 2rem;
        width: 15rem;
        text-align: center;
        color: #40A2E3;
        border-bottom: solid 2px rgb(82, 146, 91);
      }
      .foto img {
        width: 20rem;
        
        padding: 2rem;
      }
      .foto img:target {
        width: 70rem;
        padding: 0rem;
        position: fixed;
        transform: translate(-10%, -100%);
        z-index: 99999999;
      }
      @media only screen and (max-width: 400px) {
        .foto img {
        width: 18rem;
        padding: 3px;
      }
    }
      </style>
</body>
@endsection
</html>