<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="gambar/logoTPS.jpg">
    <title>Produk</title>
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

<h2>Produk</h2>
<a href="javascript:void(0);" class="btn btn-primary mb-3" onclick="openCreateForm()">+ Create Product New</a>
    <div class="contener" id="produk">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produks as $key => $produk)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $produk->judul }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->judul }}" style="max-width: 100px;">
                    </td>   
                    <td>{{ $produk->keterangan }}</td>
                    <td>
                    <a href="javascript:void(0);" class="btn btn-sm btn-warning" onclick="openEditForm('{{ $produk->id }}', '{{ $produk->judul }}', '{{ $produk->keterangan }}')">Edit</a>
                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                   
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Data Masih Kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>
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
    </div>
    <!-- create -->
    <div id="createForm" class="modal" style="display:none">
    <div class="modal-content">
        <span class="close" onclick="closeCreateForm()">&times;</span>
        <!-- Isi dengan formulir sesuai kebutuhan -->
        <form method="POST" enctype="multipart/form-data" action="{{ route('produk.store') }}" >
            @csrf
            <label for="judul">Nama :</label>
            <input type="text" id="judul" name="judul" placeholder="masukan nama produk" required>

            <label for="foto">Gambar :</label>
            <input type="file" id="foto" accept="image/*" name="foto" required>

            <label for="keterangan">Keterangan :</label>
            <textarea name="keterangan" id="keterangan" placeholder="masukan keterangan produk" cols="1" rows="4" required></textarea>

            <button class="button" type="submit">Simpan</button>
        </form>
    </div>
    </div>
    <!-- edit -->
    @foreach($produks as $editproduk)
    <div id="editForm{{ $editproduk->id }}" class="modal" style="display:none">
    <div class="modal-content">
    <span class="close" onclick="closeEditForm('{{ $editproduk->id }}')">&times;</span>        
    @if(isset($produk))
        <form method="POST" enctype="multipart/form-data" action="{{ route('produk.update', $editproduk->id ) }}">
            @csrf
            @method('PUT')
            <label for="judul">Nama :</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul') ?? $editproduk->judul }}" required>

            <label for="foto">Gambar :</label>
            <input type="file" id="foto" name="foto" accept="image/*">
    
            <label for="keterangan">Keterangan :</label>
            <textarea name="keterangan" id="keterangan" cols="1" rows="4" required>{{ old('keterangan') ?? $editproduk->keterangan }}</textarea>

            <button class="button" type="submit">Simpan</button>
        </form>
        @endif
    </div>
    </div>
    @endforeach
</body>
@endsection

<style>
     body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}
h2 {
    text-align: center;
    margin-top: 0rem;
    margin-bottom: -5rem;
    color: #333;
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
            min-height: 9.1rem;
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
    .btn {
            display: inline-block;
            padding: 7px 15px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary {
            color: #000;
            background-color: #9FE2BF;
            margin-top: 3rem;
            margin-left: 21rem;
        }

        .btn-primary:hover {
            background-color: #267b81;
            color: #ffff;
            transform: scale(1.05);

        }

        .btn-warning {
            color: #fff;
            background-color: #ffc107;
        }

        .btn-warning:hover {
            transform: scale(1.05);
            background-color: #d39e00;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
        }

        .btn-danger:hover {
            transform: scale(1.05);
            background-color: #bd2130;
        }
        .modal {
                display: none;
                position: fixed;
                top: 8rem;
                justify-content: center;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                align-items: center;
                justify-content: center;
            }

            .modal-content {
                margin: auto;
                background-color: #fff;
                padding: 20px;
                width: 50%;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            }

            .close {
                position: absolute;
                top: 10px;
                right: 21rem;
                font-size: 1.5em;
                cursor: pointer;
                color: #333;
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
              margin-top: 1rem;
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
          .btn-primary {
                margin-top: 6rem;
                margin-left: 3rem;
                padding: 0.2rem 0.4rem;
                font-size: 0.875rem;
                /* font-weight: bold; */
            }  
            .modal-content{
                /* margin-top: -6rem; */
                width: 80%;
            }
            .modal {
                margin-top: -1.5rem;
            }
            .close { 
                right: 3rem;
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
                    min-height: 10 rem;
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
                /* margin-top: -6rem; */
                width: 80%;
            }
            .modal {
                margin-top: -1.5rem;
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