<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="gambar/logoTPS.jpg">
    <title>Data Admin</title>
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
    <div class="contener">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->alamat }}</td>
                    <td>{{ $user->telepon }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
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
            min-height: 15rem;
        }

        table {
            margin: 5rem auto;
            width: 60%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
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
            margin-top: 0rem;
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
        .contener {
                    min-height: 21rem;
                }
                table {
                    margin: 5rem auto;
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }

                th, td {
                    border: 1px solid #ddd;
                    padding: 5px;
                    font-size: 12px;
                    text-align: left;
                }
    }
        @media screen and (max-width: 400px) {
            table {
                width: 100%;
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
                    min-height: 18rem;
                }
                table {
                    margin: 5rem auto;
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }

                th, td {
                    border: 1px solid #ddd;
                    padding: 5px;
                    font-size: 12px;
                    text-align: left;
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