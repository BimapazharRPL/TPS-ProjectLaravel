<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="icon" href="gambar/logoTPS.jpg">
</head>
@extends('layouts.Masters')
@section('content')
<body>
    <div class="bvv">tps</div>
    <div class="notif">
        <p></p>
    </div>
    <a class="bayar" href="{{ route('Pembayaran.create') }}"> 
    <img class="buy" src="gambar/dollar-bayar.png" alt="">
        BAYAR </a>
    <h2>Riwayat Pembayaran</h2>
    <!-- <div class="table-container">
    <table class="styled-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Bulan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pembayarans as $key => $bayar)
                @if ($bayar->email_P == Auth::user()->email)
                    <tr>
                        <td>{{ $bayar->nama }}</td>
                        <td>{{ $bayar->jumlah }}</td>
                        <td>{{ $bayar->bulan }}</td>
                        <td>{{ $bayar->tanggal }}</td>
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">Belum ada riwayat membayaran</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div> -->
<div class="table-container">
    <table class="styled-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Bulan yg di bayar</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @php
                $dataExist = false; // Inisialisasi variabel untuk menandakan apakah ada data pembayaran yang sesuai
            @endphp

            @foreach ($pembayarans as $key => $bayar)
                @if ($bayar->email_P == Auth::user()->email)
                    @php
                        $dataExist = true; // Setel menjadi true karena ada data pembayaran yang sesuai
                    @endphp

                    <tr>
                        <td>{{ $bayar->nama }}</td>
                        <td>{{ $bayar->jumlah }}</td>
                        <td>{{ $bayar->bulan }}</td>
                        <td>{{ $bayar->tanggal }}</td>
                    </tr>
                @endif
            @endforeach

            @if (!$dataExist)
                <tr>
                    <td colspan="4" style="text-align: center;">Belum ada riwayat membayaran</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>



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
}

.table-container {
    max-width: 800px;
    margin: 33px auto;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: auto; /* Menambahkan scroll horizontal pada layar kecil */
}

.styled-table {
    width: 100%;
    /* border-collapse: collapse; */
    border-collapse: 2px black;
    margin: 0;
    font-size: 18px;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

.styled-table th {
    background-color: #007BFF;
    color: #fff;
}

.styled-table tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.1);
}

/* Optional: Add styling for odd/even rows */
.styled-table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}
.bvv {
    height: 9rem;
}
.bayar {
    text-decoration: none;
    padding: 4px 5px;
    color: #fff;
    font-weight: bold;
    background-color: #18ac18;
    border-radius: 7px;
    margin-left: 9rem;
    border: solid 3px #f4f4f4;
    /* text-transform: uppercase;
    transform: scale(1);
    transition: transform 0.3s ease; */
}
.buy {
    height: 1.4rem;
    margin-bottom: -5px;
    border-radius: 6px;
}
.bayar:hover {
    background-color: #177a17;
    border: solid 3px #84FFB9;
}
.footer {
    bottom: 0;
    margin-top: 6rem;
    margin-bottom: -91rem;
}
/* Media query untuk layar kecil (mobile) */
@media screen and (max-width: 600px) {
    .styled-table {
        font-size: 12px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: auto;
    }

    .styled-table th,
    .styled-table td {
        padding: 5px;
    }
    .bayar {
        margin-left: 3rem;
    }
    .table-container {
    background-color: #f1f1f1;
    min-height: 14rem;
    box-shadow: none;
    overflow: none;
    }
}

    </style>
</body>
</html>