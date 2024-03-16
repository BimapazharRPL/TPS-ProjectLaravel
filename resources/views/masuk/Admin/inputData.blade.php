<?php
use App\Models\Statistik;
$data = Statistik::all();
foreach ($data as $statistik) {  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="gambar/logoTPS.jpg">
    <title>Input Data</title>
</head>
@extends('layouts.Masters')
@section('content')
<body>
<div class="eyy">tps</div>
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

    <form class="form" method="POST" action="{{ route('statistik.store') }}">
    @csrf
        <label for="jumlahPengurus">Jumlah Pengurus:</label>
        <input type="number" id="jumlahPengurus" name="jumlahPengurus" value="{{ $statistik->pengurus ?? 0 }}">

        <label for="jumlahPelanggan">Jumlah Pelanggan:</label>
        <input type="number" id="jumlahPelanggan" name="jumlahPelanggan" value="{{ $statistik->pelanggan ?? 0 }}">

        <button class="button" type="submit">Simpan</button>
    </form>

    <!-- Formulir Data yang Sudah Bayar dan Belum Bayar -->
    <form class="form" method="POST" action="{{ route('statistik.simpan') }}">
    @csrf
        <label for="dataSudahBayar">Pelanggan yang Sudah Bayar:</label>
        <input type="text" id="dataSudahBayar" name="sudah_bayar" value="{{ $statistik->sudah_bayar ?? 0 }}">

        <label for="dataBelumBayar">Pelanggan yang Belum Bayar:</label>
        <input type="text" id="dataBelumBayar" name="belum_bayar" value="{{ $statistik->belum_bayar ?? 0 }}">

        <button class="button" type="submit">Simpan</button>
    </form>
    <form class="form" method="POST" action="{{ route('statistik.simpanS') }}">
    @csrf
        <label for="pengumpulan_S">Sampah Yang di Kumpulkan:</label>
        <input type="number" id="pengumpulan_S" name="pengumpulan_S" value="{{ $statistik->pengumpulan_S ?? 0 }}">

        <label for="residu_S">Residu :</label>
        <input type="text" id="residu_S" name="residu_S" value="{{ $statistik->residu_S ?? 0 }}">

        <button class="button" type="submit">Simpan</button>
    </form>
    
    <form class="form" method="POST" action="{{ route('statistik.storey') }}">
    @csrf
    <h3>Komposisi sampah berdasarkan sumber</h3>

    <label for="perusahaan">Perusahaan:</label>
    <input type="number" id="perusahaan" name="perusahaan" value="{{ $statistik->perusahaan ?? 0 }}">

    <label for="rumah">Rumah:</label>
    <input type="number" id="rumah" name="rumah" value="{{ $statistik->rumah ?? 0 }}">

    <label for="kantor">Kantor:</label>
    <input type="number" id="kantor" name="kantor" value="{{ $statistik->kantor ?? 0 }}">

    <label for="toko">Toko:</label>
    <input type="number" id="toko" name="toko" value="{{ $statistik->toko ?? 0 }}">

    <label for="warung">Warung:</label>
    <input type="number" id="warung" name="warung" value="{{ $statistik->warung ?? 0 }}">

    <label for="sekolah">Sekolah:</label>
    <input type="number" id="sekolah" name="sekolah" value="{{ $statistik->sekolah ?? 0 }}">

    <button class="button" type="submit">Simpan</button>
</form>
@if(session('alert'))
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
         <script>
            Swal.fire({
                position: "center",
                icon: '{{ session('alert')['icon'] }}',
                title: '{{ session('alert')['title'] }}',
                text: '{{ session('alert')['text'] }}',
                showConfirmButton: false,
                timer: 1500
                });
         </script>
         @endif
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

h2 {
    text-align: center;
    margin-top: 5rem;
    margin-bottom: -5rem;
    color: #333;
}
.sat {
    display: flex;
}

.form {
    max-width: 400px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    color: #333;
}

input, select, textarea{
    width: 95%;
    padding: 10px;
    margin-bottom: 12px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.button {
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}
.eyy {
          width: 100%;
          height: 9rem;
        }
        .sidebar {
        margin-top: -2.2rem;
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
    .contener {
            min-height: 6rem;
            margin-bottom: 5rem;

        }

        table {
            margin: 1rem auto;
            width: 60%;
            border-collapse: collapse;
            margin-bottom: 20px;
            overflow: auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 7px;
            text-align: center;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
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
           
    @media only screen and (max-width: 600px) {
          
          .sidebar {
              width: 40%;
              margin-top: -2.5rem;
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
      @media screen and (max-width: 400px) {
            
            .sidebar {
                margin-top: -2.5rem;
                }
                .KL {
                margin-top: -2.5rem;
                border-radius :0px 0px 13px 0px;
                }   
                .contener {
                    min-height: 3rem;
                }

                th, td {
                    border: 1px solid #ddd;
                    padding: 5px;
                    font-size: 11.5px;
                    text-align: left;
                }
                .sidebar ul li .al:hover {
                     padding: 15px 17px;
                }

                .sidebar ul li a {
                    padding: 0.1rem 0.1rem;
                }
                table {
                    margin: 2rem auto;
                    width: 100%;
                    border-collapse: collapse;
                    
                }
                .btn-sm {
                padding: 0.2rem 0.4rem;
                font-size: 0.875rem;
                 }
                 .btn-primary {
                margin-top: 6rem;
                margin-left: 3rem;
                padding: 0.2rem 0.4rem;
                font-size: 0.875rem;
                /* font-weight: bold; */
            }  
            .khusus {
                    margin-left: -0.5rem;
                }
            .modal-content{
                width: 80%;
            }
            .close { 
                right: 2rem;
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
@endsection
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

    <!-- produk -->
    <script>
        function openCreateForm() {
        // Kosongkan nilai input sebelum membuka formulir Create
        document.getElementById('createForm').style.display = 'block';
        document.getElementById('judul').value = '';
        document.getElementById('foto').value = '';
        document.getElementById('keterangan').value = '';
    }

    function closeCreateForm() {
        document.getElementById('createForm').style.display = 'none';
        // Setelah menutup formulir, panggil fungsi resetCreateForm untuk mengosongkan input
        resetCreateForm();
    }

    // Fungsi untuk mengosongkan input formulir Create
    function resetCreateForm() {
        document.getElementById('judul').value = '';
        document.getElementById('foto').value = '';
        document.getElementById('keterangan').value = '';
    }
</script>
<script>
    function openEditForm(id, judul, keterangan) {
        // Sesuaikan ID formulir edit dengan ID yang sesuai
        var editFormId = 'editForm' + id;
        document.getElementById(editFormId).style.display = 'block';

        // Isi formulir edit dengan nilai-nilai awal
        document.getElementById('judul').value = judul;
        // Isi dengan nilai-nilai lainnya sesuai kebutuhan
        document.getElementById('keterangan').value = keterangan;
    }

    function closeEditForm(id) {
        // Sesuaikan ID formulir edit dengan ID yang sesuai
        var editFormId = 'editForm' + id;
        document.getElementById(editFormId).style.display = 'none';
    }
</script>

 <!-- kegiatan -->
 <script>
    function openCreateFormQ() {
        document.getElementById('createFormQ').style.display = 'block';
        document.getElementById('judul').value = '';
        document.getElementById('foto').value = '';
        document.getElementById('keterangan').value = '';
    }

    function closeCreateFormQ() {
        document.getElementById('createFormQ').style.display = 'none';
        resetCreateFormQ();
    }
    function resetCreateFormQ() {
        document.getElementById('judul').value = '';
        document.getElementById('foto').value = '';
        document.getElementById('keterangan').value = '';
    }
</script>
<script>
   function openEditFormQ(id, judul, keterangan) {
        // Sesuaikan ID formulir edit dengan ID yang sesuai
        var editFormQId = 'editFormQ' + id;
        document.getElementById(editFormQId).style.display = 'block';

        // Isi formulir edit dengan nilai-nilai awal
        document.getElementById('judul').value = judul;
        // Isi dengan nilai-nilai lainnya sesuai kebutuhan
        document.getElementById('keterangan').value = keterangan;
    }

    function closeEditFormQ(id) {
        // Sesuaikan ID formulir edit dengan ID yang sesuai
        var editFormQId = 'editFormQ' + id;
        document.getElementById(editFormQId).style.display = 'none';
    }
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

</html>