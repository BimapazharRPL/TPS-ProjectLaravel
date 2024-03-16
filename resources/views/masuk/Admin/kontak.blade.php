<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="gambar/logoTPS.jpg">
    <title>Kontak</title>
</head>
@extends('layouts.Masters')
@section('content')
<body>

  <div class="eyy">eyy</div>
  <div class="sidebar" id="sidebar">
    <ul>
        <li class="khusus"><img src="gambar/logoTPS.jpg" alt="">Khusus Admin</li>
            <!-- <li><a href="input-data">Input Data</a></li> -->
            <li class="inp">
                <a href="#" id="toggleInputData">
                    Input Data
                    <span class="fas fa-caret-down"></span>
                    </a>
                <ul id="inputDataSubMenu" style="display: none;">
                    <li><a href="input-data">statistik</a></li>
                    <li><a href="produk">produk</a></li>
                    <li><a href="kegiatan">kegiatan</a></li>
                </ul>
                
            </li>
            <li><a class="al" href="absensi">Absensi</a></li>
            <li><a class="al" href="data-admin">Data Admin</a></li>
            <li><a class="al" href="qwertyu">Data Petugas</a></li>
            <li><a class="al" href="nasabah">Nasabah</a></li>
        </ul>
    </div>
    <button class="KL" onclick="toggleSidebar()">MENU<br>LAIN</button>
    <div class="semua">
    <div class="konmi" id="kontak">
        <h2>KONTAK</h2>
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
          <img src="gambar/gambarTPS.jpg" alt="">
          <img src="gambar/gambarTPS1.jpg" alt="">
          <img src="gambar/gambarTPS2.jpg" alt="">
        </div>
        
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
        width: 10rem;
        
        padding: 2rem;
      }
      /* .foto img:target {
        width: 70rem;
        padding: 0rem;
        position: fixed;
        transform: translate(-10%, -100%);
        z-index: 99999999;
      } */
      .sidebar {
        margin-top: 2rem;
        width: 14rem;
        /* border:solid 1px black; */
        height: auto;
        text-align: center;
        background-color: #145A32;
        position: fixed;
        font-family: cursive;
        border-radius: 0px 0px 15px 0px;
        /* font-size: 1.5rem; */
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar ul li {
        padding: 0.8rem;
        
    }

    .sidebar ul li .al:hover {
        background-color: #86FF9A;
        color: #000;
        padding: 1rem 2rem;
        border-radius: 1rem;
    }
    .sidebar ul li a {
        text-decoration: none;
        color: #ffff;
        cursor: pointer;
        padding: 1rem 2.3rem;
    }
    .semua {
      margin-left: 16rem;
      margin-top: -6rem;
    }
    .sidebar ul li img {
        height: 3rem;
        border-radius: 50rem;
        list-style: none;
        margin-right: 7px;
        padding: 0;
       
    }
    .khusus {
        display: flex;
        font-weight: bold;
        padding: 1rem;
        font-size: 1.1rem;
        align-items: center;
        margin-bottom: -9px;
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.897),
            -2px -2px 2px rgb(0, 0, 0);
    }
    #inputDataSubMenu {
                height: 6rem;
                line-height: 1.4rem;
                z-index: 999;
                margin-bottom: -9px;
            }
            #inputDataSubMenu li {
                padding: 5px;
            }
            #toggleInputData:hover {
                background-color: none;

            }
            .inp:hover  {
                background-color: #86FF9A;

            }
            #toggleInputData .fas {
                margin-left: 5px;
                transition: transform 0.3s ease;
            }

            /* Animasi panah dropdown */
            #toggleInputData.active .fas {
                transform: rotate(180deg);
            }
            .inp a:hover {
                background-color: #f1f1f1;
                color: #000;
                padding: 0 10px;
            }
            /* Style untuk submenu */
    /* Media Query untuk tampilan mobile */
    @media only screen and (max-width: 600px) {
          .semua {
            margin-left: 2rem;
            margin-top: -5rem;
        }
        .sidebar {
            width: 40%;
            margin-top: 1.5rem;
            z-index: 99999;
            display: none;
         }

        .sidebar.show {
            display: block;
         }

         .sidebar ul li .al:hover {
            padding: 1rem 1.5rem;
            font-family: serif;
        }

        .sidebar ul li a {
            padding: 0.1rem 0.1rem;
        }
        .KL {
            height: 4rem;
            margin-top: 5rem;
            position: fixed;
            font-size: 0.7rem;
            font-weight: bold;
            border-radius :0px 13px 13px 0px;
            border: none; 
            cursor: pointer;
            background-color: #000;
            color: white; 
        }
        .KL:hover {
            color: #000;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
    }
    @media only screen and (max-width: 400px) {
      .semua {
        margin-left: 1rem;
        margin-top: -6rem;
    }
    .sidebar {
      margin-top: 1.5rem;
    }
    .KL {
      margin-top: 1.5rem;
      border-radius :0px 0px 13px 0px;
    } 
    .sidebar ul li .al:hover {
       padding: 15px 17px;
    }

        .sidebar ul li a {
            padding: 0.1rem 0.1rem;
        }  
        .khusus {
         margin-left: -0.5rem;
       }
       .foto img {
        width: 18rem;
        padding: 3px;
      }
      #toggleInputData .fas {
                margin-left: 0px;
            }
            #inputDataSubMenu li {
                padding: 1px;
            }
            .inp a:hover { 
                padding: -1px -1px;
            }
            #inputDataSubMenu {
                height: 7rem;
                line-height: 2rem;
                z-index: 999;
                margin-bottom: -9px;
            }
    }
      
      </style>
</body>
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('show');
    }

    // Menambahkan event listener untuk menutup sidebar ketika diklik di mana pun di halaman
    document.addEventListener('click', function (event) {
        var sidebar = document.getElementById('sidebar');
        var KLButton = document.querySelector('.KL');

        // Periksa apakah yang diklik bukan bagian dari sidebar atau tombol KL
        if (!sidebar.contains(event.target) && event.target !== KLButton) {
            sidebar.classList.remove('show');
        }
    });
</script>
<!-- anak sidebar -->
<script>
   document.addEventListener("DOMContentLoaded", function() {
    var toggleInputData = document.getElementById("toggleInputData");
    var inputDataSubMenu = document.getElementById("inputDataSubMenu");

    toggleInputData.addEventListener("click", function() {
        toggleInputData.classList.toggle("active");
        if (inputDataSubMenu.style.display === "none") {
            inputDataSubMenu.style.display = "block";
        } else {
            inputDataSubMenu.style.display = "none";
        }
    });
});
</script>
@endsection
</html>