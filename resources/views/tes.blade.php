<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <link rel="icon" href="gambar/logoTPS.jpg">
    <title>Data Petugas</title>
</head>

@extends('layouts.Masters')
@section('content')
 
<body>
<div class="eyy">tps</div>

    <div class="sidebar" id="sidebar">
    <ul>
        <li class="khusus"><img src="gambar/logoTPS.jpg" alt="">Khusus Admin</li>
            <li><a href="input-data">Input Data</a></li>
            <li><a href="absensi">Absensi</a></li>
            <li><a href="data-admin">Data Admin</a></li>
            <li><a href="qwertyu">Data Petugas</a></li>
            <li><a href="nasabah">Nasabah</a></li>
        </ul>
    </div>
    <button class="KL" onclick="toggleSidebar()">MENU<br>LAIN</button>
    <a href="{{ route('qwertyu.create') }}" class="btn btn-primary mb-3">+ Create New</a>
    <div class="contener">
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal lahir</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($anggotas as $key => $anggota)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $anggota->nama }}</td>
                    <td>{{ $anggota->tgl_lahir }}</td>
                    <td>{{ $anggota->alamat }}</td>
                    <td>{{ $anggota->telepon }}</td>
                    <td>
                    <a href="{{ route('qwertyu.edit', $anggota->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('qwertyu.destroy', $anggota->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button id="hapusButton" class="btn btn-sm btn-danger" onclick="confirmDelete('{{ route('qwertyu.destroy', $anggota->id) }}')">Delete</button>
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
    </div>
</body>
@endsection
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .eyy {
          width: 100%;
          height: 6.5rem;
        }

        .contener {
            min-height: 16rem;
            width: 100%;
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
        .sidebar {
        margin-top: 5px;
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

    .sidebar ul li a:hover {
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
            margin-left: 15rem;
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
            background-color: #d39e00;
            transform: scale(1.05);
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #bd2130;
            transform: scale(1.05);
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

    @media only screen and (max-width: 600px) {
          
        .sidebar {
            width: 40%;
            margin-top: 1.5rem;
            z-index: 99999;
            display: none;
         }

        .sidebar.show {
            display: block;
         }

        .sidebar ul li a:hover {
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
            table {
                width: 100%;
                margin: 98px auto
                overflow-x: auto;
                display: block;
                white-space: nowrap;
            }
            .sidebar {
                margin-top: 0rem;
                }
                .KL {
                margin-top: 0rem;
                border-radius :0px 0px 13px 0px;
                }   
                .contener {
                    width: 100%;
                    min-height: 18rem;
                    
                }
                table {
                    margin: 2rem auto;
                    width: 100%;
                  
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }

                th, td {
                    border: 1px solid #ddd;
                    padding: 5px;
                    font-size: 11.5px;
                    text-align: left;
                }
                .btn-sm {
                padding: 0.2rem 0.4rem;
                font-size: 0.875rem;
                 }
                 .btn-primary {
                margin-top: 1rem;
                margin-left: 7rem;
                padding: 0.2rem 0.4rem;
                font-size: 0.875rem;
                /* font-weight: bold; */
            }
            .sidebar ul li a:hover {
                     padding: 15px 17px;
                }

                .sidebar ul li a {
                    padding: 0.1rem 0.1rem;
                }  

            }
    </style>
<!-- <script>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
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

    function confirmDelete(deleteUrl) {
        showConfirmationDialog(function (isConfirmed) {
            if (isConfirmed) {
                // Hapus data jika dikonfirmasi
                $.ajax({
                    type: 'DELETE',
                    url: deleteUrl,
                    success: function (response) {
                        alert('Data berhasil dihapus!');
                        // Reload halaman setelah penghapusan data
                        location.reload();
                    },
                    error: function (error) {
                        alert('Terjadi kesalahan saat menghapus data.');
                    }
                });
            } else {
                // User membatalkan tindakan penghapusan
                alert('Penghapusan data dibatalkan.');
            }
        });
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function showConfirmationDialog(callback) {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin menghapus ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                callback(true); // Jika dikonfirmasi, jalankan callback dengan true
            } else {
                callback(false); // Jika dibatalkan, jalankan callback dengan false
            }
        });
    }
</script>

</html>
