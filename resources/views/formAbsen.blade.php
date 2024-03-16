<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="gambar/logoTPS.jpg">
    <title>Form Absen TPS Bambu Raya</title>
</head>
<body>
<form action="{{ route('qwertyu.storeForm') }}" method="post">
@csrf
        <h2>Form Kehadiran</h2>
        <label for="pilihOption">Silakan Pilih Nama Anda:</label>
        <select id="pilihOption" name="nama" required>
            <option value="" disabled selected>Pilih Nama Anda</option>
            @foreach($anggotas as $p)
                <option value="{{ $p->nama }}">{{ $p->nama }}</option>
            @endforeach
        </select>

        <label for="Keterangan">Keterangan :</label>
        <select name="keterangan" id="Keterangan" required>
        <option value="" disabled selected>Jam Kerja</option>
        <option value="Jam masuk">Jam masuk</option>   
        <option value="Jam keluar">Jam keluar</option>
        </select>
        <input type="submit" value="Hadir">
    </form>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</body>

<script>
    window.onload = function() {
            // Mendapatkan nilai dari parameter URL
            var urlParams = new URLSearchParams(window.location.search);
            var accessCode = urlParams.get('accessCode');

            // Validasi apakah akses melalui barcode atau tidak
            if (!isValidAccessCode(accessCode)) {
                // Redirect atau tampilkan pesan akses ditolak
                alert('Akses ditolak. Harap gunakan barcode untuk mengakses halaman ini.');
                window.location.href = 'halaman_lain.html'; // Ganti dengan URL halaman lain
            }
        };
</script>

</html>