<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="icon" href="gambar/logoTPS.jpg">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="payment-container">
    <div class="jud">
        <h2>Form Pembayaran</h2>
        <img src="{{ asset('gambar/logoTPS-rem.png') }}" alt="logo tps" />
    </div>
    <form action="{{ route('Pembayaran.store') }}" method="post">
        @csrf
        <h4>Silakan Pilih Bulan Apa Yang Akan Dibayar</h4>
        <div class="bar">
            @foreach($bulanList as $bulan)
                <div class="form-group">
                    <label for="{{ $bulan }}">{{ $bulan }}</label>
                    <input type="checkbox" id="{{ $bulan }}" name="bulan[]" value="{{ $bulan }}" >
                </div>
            @endforeach
        </div> <br>
        <div class="tahun">
                    <label for="tahun">Pembayaran di Tahun</label>
                    <input  type="tel" id="tahun" name="tahun" placeholder="tahun yang di bayar" pattern="[-+]?[0-9]+" required>
                </div>

        <button type="submit">Lanjut</button>
    </form>
</div>
<style>
     body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.payment-container {
    max-width: 400px;
    margin: 50px auto;
    border: solid 1px #45a049;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

h2 {
    text-align: center;
    color: #333;
    margin-left: 4rem;
}

h4 {
    margin-bottom: 3rem;
}

.jud {
    height: 7rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

.jud img {
    width: 5rem;
}

.form-group {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    margin-bottom: 20px;
}

.bar {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

input {
    margin-right: 1rem;
    display: flex;
        flex-wrap: wrap;
}

label {
    font-weight: bold;
    display: flex;
    flex-wrap: wrap;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

.tahun {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
}

/* Style untuk label tahun */
.tahun label {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 5px;
}

/* Style untuk input tahun */
.tahun input {
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Hover effect untuk input tahun */
.tahun input:hover {
    border-color: #333;
}

/* Fokus effect untuk input tahun */
.tahun input:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}
</style>
</body>
</html>
