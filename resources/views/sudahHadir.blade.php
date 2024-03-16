<?php
    // $absen->keterangan
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="gambar/logoTPS.jpg">
    <title>Sukses Hadir</title>
</head>
<body>
    <div class="container">
        <div class="success-message">
        @if($absen->keterangan == 'Jam masuk')
                <h1>Selamat Berkerja</h1>
                <p>Terima kasih atas kehadiran Anda, Kami senang Anda bisa hadir.</p>
                <img src="gambar/logoTPS.jpg" alt="Sukses Hadir">
            @elseif($absen->keterangan == 'Jam keluar')
                <h1>Selamat Tinggal</h1>
                <p>Terima kasih atas Kerja Anda, Sampai jumpa di lain waktu.</p>
                <img src="gambar/logoTPS.jpg" alt="Sukses Keluar">
            @endif
            <!-- <p class="sub-text">Terus ikuti informasi terbaru dari kami.</p> -->
        </div>
    </div>
</body>
<style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #f4f4f4;
}

.container {
    text-align: center;
}

.success-message {
    background-color: #4caf50;
    padding: 20px;
    border-radius: 10px;
    color: #fff;
}

.success-message img {
    border-radius: 1rem;
    height: 10rem;
    margin-top: 20px;
}

.sub-text {
    font-style: italic;
    margin-top: 10px;
}

</style>
</html>
