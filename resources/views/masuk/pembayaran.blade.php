<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="icon" href="gambar/logoTPS.jpg">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>
@extends('layouts.Masters')
@section('content')
<body>
    <div class="bvv">tps</div>
    <div class="sem">
    <h2>Riwayat Pembayaran</h2>
    <!-- <form id="searchForm">
            <input type="text" id="searchInput" placeholder="Telusuri .....">
            <button type="button" onclick="searchTable()">Cari</button>
        </form> -->
    <div class="table-container">
        <table class="styled-table" id="dataTable">
            <thead>
                <tr>
                    <!-- <th>No</th> -->
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Bulan yg di bayar</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($pembayarans as $key => $bayar)
                <tr>
                    <!-- <td>{{ $key + 1 }}</td> -->
                    <td>{{ $bayar->nama }}</td>
                    <td>{{ $bayar->jumlah }}</td>
                    <td>{{ $bayar->bulan }}</td>
                    <td>{{ $bayar->tanggal }}</td>
                </tr>
                
                @empty
                    <tr>
                        <td colspan="8" style="text-align: center;" >Belum ada riwayat membayaran</td>
                    </tr>
                    @endforelse
                <!-- Tambahkan baris sesuai kebutuhan -->
            </tbody>
        </table>
        </div>
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

            #searchForm {
                display: flex;
                width: 10rem;
                margin-left: 48rem;
            }

            #searchInput {
                flex: 1;
                padding: 10px 20px;
                border: 1px solid #ccc;
                border-radius: 30px 0px 0px 30px;
                font-size: 16px;
            }

            button {
                padding: 10px 30px;
                background-color: #4caf50;
                color: #fff;
                border: none;
                border-radius: 0px 30px 30px 0px;
                cursor: pointer;
            }

            button:hover {
                background-color: #45a049;
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
                margin-bottom: 3rem;
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
            .sem {
                min-height: 15rem;
                /* margin-bottom: 30rem; */
            }
            .bayar {
                text-decoration: none;
                padding: 6px 10px;
                color: #fff;
                font-weight: bold;
                background-color: #18ac18;
                border-radius: 5px;
                margin-left: 9rem;
            }
            .bayar:hover {
                background-color: #177a17;
            }
            .footer {
                bottom: 0;
                margin-top: 6rem;
                /* margin-bottom: -91rem; */
            }
            /* Media query untuk layar kecil (mobile) */
            @media screen and (max-width: 600px) {
                .styled-table {
                    font-size: 15px;
                }

                .styled-table th,
                .styled-table td {
                    padding: 5px;
                }
                .bayar {
                    margin-left: 3rem;
                }
            }
            @media only screen and (max-width: 400px) {
                #searchForm {
                display: flex;
                width: 8rem;
                margin-left: 2.5rem;
                }

            #searchInput {
                flex: 1;
                padding: 5px 15px;
                border: 1px solid #ccc;
                border-radius: 30px 0px 0px 30px;
                font-size: 16px;
            }

            button {
                padding: 10px 20px;
                background-color: #4caf50;
                color: #fff;
                border: none;
                border-radius: 0px 30px 30px 0px;
                cursor: pointer;
            }
        }

    </style>
</body>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
</html>