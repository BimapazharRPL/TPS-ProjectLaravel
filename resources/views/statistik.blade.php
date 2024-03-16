<?php
use App\Models\Statistik;
use App\Models\Produk;
use App\Models\Kegiatan;

$statistikData = Statistik::all();
$produks = Produk::all();
$kegiatans = Kegiatan::all();

foreach ($statistikData as $belum) {
    $belyar = $belum->belum_bayar;
}
foreach ($statistikData as $sudah) {
    $sudyar = $sudah->sudah_bayar;
}

foreach ($statistikData as $dataK) {
    $perusahaan = $dataK->perusahaan;
    $rumah = $dataK->rumah;
    $kantor = $dataK->kantor;
    $toko = $dataK->toko;
    $warung = $dataK->warung;
    $sekolah = $dataK->sekolah;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik</title>
    <link rel="icon" href="gambar/logoTPS.jpg">
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
@extends('layouts.master')
@section('content')
<body>

<div class="oy">Victorius</div>
<div class="stas">
        <div class="anggota" data-aos="zoom-out-left">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="76"
            height="76"
            fill="currentColor"
            class="bi bi-people-fill"
            viewBox="0 0 16 16"
          >
            <path
              d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"
            />
          </svg>
          <i class="bi bi-people-fill"></i>
          <p class="org">Pengurus</p>
          <p class="jum">@foreach($statistikData as $data)
            {{ $data->pengurus ?? 0}}
        @endforeach
                </p>
        </div>
        <div class="nasabah" data-aos="zoom-out-right">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="76"
            height="76"
            fill="currentColor"
            class="bi bi-people-fill"
            viewBox="0 0 16 16"
          >
            <path
              d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"
            />
          </svg>
          <i class="bi bi-people-fill"></i>
          <p class="org">Pelanggan</p>
          <p class="jum">
            @foreach($statistikData as $data)
            {{ $data->pelanggan ?? 0}}
                @endforeach</p>
        </div>
      </div>
    <h2>Grafik Pembayaran di Bulan Ini</h2>
    <div id="pieChartContainer" style="width: 100%; height: 400px;"></div>
    <h2>Grafik Komposisi Sampah Berdasarkan Sumber</h2>
    <div id="pie_komposisi_S" style="width: 100%; height: 400px;"></div>
    <div class="progiat">
      <div class="conprod">
        <h1>Produk</h1>
        <div class="prod">
          @forelse ($produks as $key => $produk)
          <div class="produk">
          <h3>{{ $produk->judul }}</h3>
          <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->judul }}" >
          <p>{{ $produk->keterangan }}</p>
          </div>
          @empty
                <p>Belum Ada Produk</p>
                @endforelse
        </div>
      </div>
      <div class="congit">
        <h1>Kegiatan</h1>
        <div class="kegit">
          @forelse ($kegiatans as $key => $kegiatan)
          <div class="kegiatan">
          <h3>{{ $kegiatan->judul }}</h3>
          <img src="{{ asset('storage/' . $kegiatan->foto) }}" alt="{{ $kegiatan->judul }}" >
          <p>{{ $kegiatan->keterangan }}</p>
          </div>
          @empty
                <p>Belum Ada kegiatan</p>
                @endforelse
        </div>
      </div>
    </div>
<style>
    .oy {
        height: 9rem ;
        width: 100%;
    }
    body {
        margin: 0;
        padding: 0;
    }
    h2 {
        margin-left: 4rem;
        color: #416D19;
        margin-top: 6rem;
    }
    .stas {
        margin-top: 3rem;
        display: flex;
        align-items: center;
        justify-content: space-around;
        line-height: 1px;
        text-align: center;
      }
      .org {
        font-size: 2rem;
        font-weight: bold;
        margin-top: 8px;
      }
      .jum {
        font-size: 3rem;
        font-family: cursive;
        font-weight: bold;
      }
      .progiat {
        
        width: 100%;
        height: auto;
        margin: auto;
        /* padding: 5rem; */
      }
      .conprod {
        background: #f1f1f1;
        width: 90%;
        height: auto;
        padding: 4rem;
        text-align: center;
      }
      .prod {
        width: 100%;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
      }
      .conprod h1 {
        margin-top: -2rem;
        margin-bottom: 7rem;
      }
      .produk {
        background-color: #70B390;
        width: 16rem;
        padding: 5px;
        border-radius: 8px;
        margin-bottom: 3rem;
      }
      .produk img {
        max-width: 15rem;
        max-height: 15rem;  
      }
      /* .footer{
        margin-top: 5rem;
      } */
      .congit {
        background: #f4f4f4;
        width: 90%;
        height: auto;
        padding: 4rem;
        text-align: center;
      }
      .kegit {
        width: 100%;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
      }
      .congit h1 {
        margin-top: -2rem;
        margin-bottom: 7rem;
      }
      .kegiatan {
        background-color: #70B390;
        width: 16rem;
        padding: 5px;
        border-radius: 8px;
        margin-bottom: 3rem;
      }
      .kegiatan img {
        max-width: 15rem;
        max-height: 15rem;  
      }
      @media only screen and (max-width: 400px) {
        /* #scrollableBarChartContainer {
            width: 10rem;
            height: 10rem;
        } */
        .progiat {
        width: 90%;
        height: auto;
        margin: 0;
        background-color: red;      
        /* padding: 5rem; */
      }
        .conprod {
          width: 100%;
          padding: 1rem;
        }
        .congit {
          padding: 1rem;
          width: 100%;
          padding-top: 4rem;
        }
        .conprod h1 {
        margin-top: 1rem;
      }
      }
</style>
<!-- grafik pembayaran sampah bulan ini -->
<script>
    function createPieChart(belumBayar, sudahBayar) {
        var data = [
            { category: "Belum Bayar", value: belumBayar },
            { category: "Sudah Bayar", value: sudahBayar }
        ];

        var chart = am4core.create("pieChartContainer", am4charts.PieChart);
        chart.data = data;

        var series = chart.series.push(new am4charts.PieSeries());
        series.dataFields.value = "value";
        series.dataFields.category = "category";
        series.slices.template.stroke = am4core.color("#fff");
        series.slices.template.strokeWidth = 2;
        series.slices.template.strokeOpacity = 1;

        series.slices.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });

        series.slices.template.propertyFields.isActive = "pulled";
        series.slices.template.propertyFields.fill = "color";

        chart.legend = new am4charts.Legend();
    }

    // Initial chart creation with data from the server
    createPieChart({{ $belyar ?? 0 }}, {{ $sudyar ?? 0 }});

    // Redraw the chart on window resize
    window.addEventListener("resize", function () {
        createPieChart({{ $belyar ?? 0 }}, {{ $sudyar ?? 0 }});
    });
</script>


<!-- grafik komposisi -->
<script>
    function createPieChart(perusahaan, rumah, kantor, toko, warung, sekolah,) {
        var data = [
            { category: "perusahaan", value: perusahaan },
            { category: "rumah", value: rumah },
            { category: "kantor", value: kantor },
            { category: "toko", value: toko },
            { category: "warung", value: warung },
            { category: "sekolah", value: sekolah },
        ];

        var chart = am4core.create("pie_komposisi_S", am4charts.PieChart);
        chart.data = data;

        var series = chart.series.push(new am4charts.PieSeries());
        series.dataFields.value = "value";
        series.dataFields.category = "category";
        series.slices.template.stroke = am4core.color("#fff");
        series.slices.template.strokeWidth = 2;
        series.slices.template.strokeOpacity = 1;

        series.slices.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });

        series.slices.template.propertyFields.isActive = "pulled";
        series.slices.template.propertyFields.fill = "color";

        chart.legend = new am4charts.Legend();
    }

    // Initial chart creation with data from the server
    createPieChart({{ $perusahaan ?? 0 }}, {{ $rumah ?? 0 }}, {{ $kantor ?? 0 }}, {{ $toko ?? 0 }}, {{ $warung ?? 0 }}, {{ $sekolah ?? 0 }}  );

    // Redraw the chart on window resize
    window.addEventListener("resize", function () {
        createPieChart({{ $perusahaan ?? 0 }}, {{ $rumah ?? 0 }}, {{ $kantor ?? 0 }}, {{ $toko ?? 0 }}, {{ $warung ?? 0 }}, {{ $sekolah ?? 0 }} );
    });
</script>

</body>
@endsection
</html>
