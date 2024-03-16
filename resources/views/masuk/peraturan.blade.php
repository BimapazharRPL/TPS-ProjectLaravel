<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peraturan</title>
    <link rel="icon" href="gambar/logoTPS.jpg">
</head>
@extends('layouts.Masters')
@section('content')
<body>
    <div class="ttt">
        <p>Tps</p>
    </div>
    <div class="ooo">
        <h2>PERATURAN</h2>
    </div>
    <div class="pera">
        <div class="turan">
            <div class="it">
            <div class="item">
                <div>
                <img src="gambar/law.png" alt="">
                <p style="font-weight: bold;">Undang - Undang Nomor 18 Tahun 2008 tentang Pengelola sampah</p>
                </div>
                <p>Undang - Undang ini mengatur tentang pengelola sampah, mulai dari pengurangan, pemilihan, pengumpulan, pengangkutan, hingga pengelolahan sampah</p>
            </div>
            <div class="item">
                <div>
                <img src="gambar/law.png" alt="">
                <p style="font-weight: bold;">Undang - Undang Nomor 32 Tahun 2009 tentang Perlindungan dan Pengelola  Lingkungan Hidup</p>
                </div>
                <p>Undang - Undang ini mengatur tentang Perlindungan dan Pengelola  lingkungan hidup, termasuk di dalamnya pengelolaan sampah</p>
            </div>
        </div>
        <div class="it">
            <div class="item">
                <div>
                <img src="gambar/law.png" alt="">
                <p style="font-weight: bold;">Peraturan Pemerintah Nomor 81 Tahun 2012, tentang Pengelola Sampah Rumah Tangga dan Sampah Sejenis Sampah Rumah Tangga</p>
                </div>
                <p>Peraturan ini mengatur tentang pengelola sampah rumah tangga dan sampah sejenis sampah rumah tangga</p>
            </div>
            <div class="item">
                <div>
                <img src="gambar/law.png" alt="">
                <p style="font-weight: bold;">Peraturan Pemerintah Nomor 75 Tahun 2019 tentang Pengelola Sampah Plastik</p>
                </div>
                <p>Peraturan ini mengatur tentang pengelola sampah plastik</p>
            </div>
        </div>
        <div class="it">
            <div class="item" >
                <div  class="ii">
                <img src="gambar/law.png" alt="">
                <p style="font-weight: bold;">Peraturan Daerah</p>
                </div>
                <p>Setiap Daerah memiliki daerah (Perda) tentang pengelolaan sampah. Perda ini mengatur tentang pengelolaan sampah di daerah tersebut</p>
            </div>
            <div class="item">
                <div>
                <img src="gambar/law.png" alt="">
                <p style="font-weight: bold;">Peraturan Membayaran Di TPS3R Bambu Raya</p>
                </div>
                <p>Di wajib kan tidak boleh bayar lebih dari 3 bulan jika melanggar maka sampah nya tidak akan di angkut lagi</p>
            </div>
        </div>
        <div class="it">
            <div class="item">
                <div>
                <img src="gambar/law.png" alt="">
                <p style="font-weight: bold;">Undang - Undang Nomor 18 Tahun 2008 tentang Pengelola sampah</p>
                </div>
                <p>Undang - Undang ini mengatur tentang pengelola sampah, mulai dari pengurangan, pemilihan, pengumpulan, pengangkutan, hingga pengelolahan sampah</p>
            </div>
            <div class="item">
                <div>
                <img src="gambar/law.png" alt="">
                <p style="font-weight: bold;">Undang - Undang Nomor 18 Tahun 2008 tentang Pengelola sampah</p>
                </div>
                <p>Undang - Undang ini mengatur tentang pengelola sampah, mulai dari pengurangan, pemilihan, pengumpulan, pengangkutan, hingga pengelolahan sampah</p>
            </div>
        </div>
        </div>
    </div>
    @endsection
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }
        .ttt{
            width: 100%;
            height: 8rem;
            margin-top: -1rem;
        }
        .ooo { 
            width: 100%;
            height: 5rem;
            background-color: rgb(199, 255, 229);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .pera {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-bottom: 10rem;
            
        }
        .turan {
            width: 80%;
            /* background-color: aqua; */
            height: 70rem;
        }
        .it {
            display: flex;
            justify-content: space-between;
        }
        .item {
            width: 30rem;
            height: 15rem;
            background-color: white;
            box-shadow: 1px 0 10px rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            padding: 1rem;
            margin-top: 2rem;
        }
        .item div {
            display: flex;
            align-items: center;
            justify-content: space-around;
        }
        .item img {
            height: 8rem;
        }
        .ii {
            justify-content: center;
            margin-right: 11rem;
        }
        @media only screen and (max-width: 600px) {
            .ooo { 
                height: 3rem;
            }
            .ttt{
                height: 6.5rem;
            }
            .pera {
                margin-bottom: 16rem;
            }
            .turan {    
                width: 94%;
            }
            .item {
                width: 11.8rem;
                font-size: 11.5px;
                height: 16.6rem;
            }
            .item img {
            height: 5rem;
            }
            .item div { 
            display: block;
            text-align: center;
            align-items: none;
            justify-content: none;
        }
        .ii {
            justify-content: none;
            margin-right: 1rem;
        }
        }
        @media only screen and (max-width: 400px) {
            .ooo { 
                height: 3rem;
            }
            .ttt{
                height: 6.5rem;
            }
            .pera {
                margin-bottom: 35rem;
            }
            .turan {    
                width: 98%;
            }
            .item {
                width: 40%;
                font-size: 11.5px;
                height: auto;
                
            }
            .item img {
            height: 5rem;
            }
            .item div { 
            display: block;
            text-align: center;
            align-items: none;
            justify-content: none;
        }
        .ii {
            justify-content: none;
            margin-right: 1rem;
        }
        }
    </style>
</body>

</html>