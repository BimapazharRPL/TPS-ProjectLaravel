<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Document</title>
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
        <a href="{{ route('peta') }}"><p>PETA TPS3R</p></a>
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
    <p >{{ Auth::user()->email }}</p>
    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link btn btn-warning">Logout</button>
    </form>
</div>
    </div>
    <div class="gene">
      <a href="home"><p>BERANDA</p></a>
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

    @yield('content')

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
        * {
        font-family: Poppins;
      }
      body {
        margin: 0;
        padding: 0;
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
        font-family: Poppins;
      }
      .text a {
        text-decoration: none;
        font-family: Poppins;
        color: #fff;
      }
      .text a:hover,
      .text a:active {
        color: black;
      }
      .navbar {
        margin-top: 3rem;
        display: flex;
        align-items: center;
        justify-content: space-around;
        font-size: 1rem;
        color: #ffff;
        /* font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
          sans-serif; */
        font-family: Poppins;
        background-color: rgb(82, 146, 91);
        width: 100%;
        font-weight: bold;
        z-index: 9999;
        height: 5rem;
        position: fixed;
      }
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
        text-align: center;
        background-color: #ffff;
        right: 1rem;
        padding: 1rem;
        position: fixed;
        border-radius: 10px;
        margin: 9rem 0rem;
        box-shadow: 1px 0 10px rgba(0, 0, 0, 0.8);
      }
      /* .use p {
        width: 2rem;
      } */
      .nav-link.btn.btn-warning {
        color: #fff;
        font-size: 15px;
        font-weight: bold;
        background-color: #ffc107;
        border-color: #ffc107;
        padding: 7px 15px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    /* CSS untuk Hover Tombol Logout */
    .nav-link.btn.btn-warning:hover {
        background-color: #e0a800;
    }
      
      .footer {
        background-color: white;
        height: 10rem;
        width: 100%;
        bottom: 1px;
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
        .nav-link.btn.btn-warning {
          font-size: 12px;
        }
      }
    </style>
</body>
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
</html>