<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <link rel="icon" href="gambar/logoTPS.jpg">
    <title>Detail Pembayaran</title>
</head>
<body>
    <div class="detail-container">
        <div class="judul">
        <h2>Detail Pembayaran</h2>
        <!-- <p>Snap Token: {{$snapToken}}</p> -->
        </div>
        <table>
    <tr>
        <td>Nama</td>
        <td>: {{ $pembayaran->nama }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>: {{ $pembayaran->email_P }}</td>
    </tr>
    <tr>
        <td>Asal Tempat / Kategori</td>
        <td>: {{ $pembayaran->asal }}</td>
    </tr>
    <tr>
        <td>Bulan Yang Dibayar</td>
        <td>: 
            @if(!empty($pembayaran->bulan_dipilih))
                @foreach($bulanList as $bulan)
                    @if(in_array($bulan, $pembayaran->bulan_dipilih))
                        {{ $bulan }},
                    @endif
                @endforeach
            @endif
        </td>
    </tr>
    <tr>
        <td>Tahun</td>
        <td>: {{ $pembayaran->tahun }}</td>
    </tr>
    <tr>
        <td>Total Pembayaran</td>
        <td>: Rp {{ number_format($pembayaran->total_pembayaran, 0, ',', '.') }}</td>
    </tr>
    <tr>
        <td>Tanggal Pembayaran</td>
        <td>: {{ $pembayaran->tanggal }} </td>
    </tr>
</table>

        
       <button id="pay-button">Bayar Sekarang</button>
    </div>

    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>
    <!-- <script type="text/javascript">
        var snapToken = '{{$snapToken}}'; // Pastikan snapToken tersedia
        var payButton = document.getElementById('pay-button');

        payButton.addEventListener('click', function () {
            snap.pay(snapToken, {
                onSuccess: function (result) {
                    /* Implementasi Anda di sini untuk pembayaran berhasil */
                    alert("Pembayaran berhasil!"); console.log(result);
                },
                onPending: function (result) {
                    /* Implementasi Anda di sini untuk pembayaran pending */
                    alert("Menunggu pembayaran!"); console.log(result);
                },
                onError: function (result) {
                    /* Implementasi Anda di sini untuk pembayaran gagal */
                    alert("Pembayaran gagal!"); console.log(result);
                },
                onClose: function () {
                    /* Implementasi Anda di sini untuk penutupan popup */
                    alert('Anda menutup popup tanpa menyelesaikan pembayaran');
                }
            });
        });
    </script> -->
    <!-- CURL Error: Failed to connect to app.sandbox.midtrans.com port 443 after 42136 ms: Timed out -->
    <style>
        body {
            background-color: #f1f1f1;
        }
        .detail-container {
            background-color: #ffff;
            max-width: 30rem;
            height: auto;
            /* padding: 1rem; */
            overflow: hidden;
            margin: 6rem auto;
            text-align: center;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
       .judul{
        text-align: center;
        padding: 1px ;
        background-color: #344955;
        color: #fff;
       }
       table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1px;
        }

        table, th, td {
            font-weight: bold;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            background-color: #fff;
        }

        /* Optional: Highlight alternate rows */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* p {
            border-bottom: solid 1px black;
        } */
        button {
            margin: 2rem;
            padding: 10px 20px; /* Atur padding sesuai kebutuhan Anda */
            font-size: 16px; /* Atur ukuran font sesuai kebutuhan Anda */
            background-color: #344955; /* Warna latar belakang tombol */
            color: white; /* Warna teks tombol */
            border: none; /* Hilangkan border */
            border-radius: 5px; /* Atur sudut lengkung border */
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #35374B; /* Warna latar belakang saat tombol dihover */
            }
    </style>
</body>
</html>
