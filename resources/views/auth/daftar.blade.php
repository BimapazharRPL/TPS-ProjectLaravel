<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="gambar/logoTPS.jpg">
</head>
<body>
    <div class="container">
    <form action="{{ route('auth.store') }}" method="POST">
        @csrf
            <h2>Formulir Pendaftaran</h2>
            <div class="el">
            <div>
                <label for="nama">Nama :</label><br>
                <input type="text" id="nama" name="name" required>
            </div>
            <div>
                <label for="email">Email : </label><br>
                <input type="email" id="email" name="email" required>
            </div>
        </div>
            <div class="el">
                <div>
                <label for="password">Password :  <span class="input-group-text">
            <i class="fas fa-eye" id="togglePassword"></i>
        </span></label><br>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="konfirmasi-password">Konfirmasi Password :</label><br>
                <input type="password" id="konfirmasi-password" name="password_confirmation" required>

            </div>
        </div>
            <div class="el">
                <div>
                <label for="jumlah-jiwa">Jumlah Jiwa :</label><br>
                <input type="number" id="jumlah-jiwa" name="jumlah_jiwa" required>
            </div>
            <div >
                <label for="asal-tempat">Asal Tempat :</label><br>
                <select id="asal-tempat" name="asal_tempat" required>
                    <option value="" disabled selected>Pilih Tempat</option>
                    <option value="Rumah">Rumah</option>
                    <option value="Toko">Toko</option>
                    <option value="Perusahaan">Perusahaan</option>
                    <option value="Kantor">Kantor</option>
                    <option value="Warung">Warung</option>
                    <option value="Sekolah">Sekolah</option>
                </select>
            </div>
        </div>
        <div class="el">
            <div>
            <label for="status">Silakan ketik(pelanggan) jika <br> anda adalah pelanggan</label><br>
            <input type="text" id="status" name="status" required>
            <div>
            <label for="telepon">Telepon :</label><br>
            <input type="tel" id="telepon" name="telepon" pattern="[0-9]+" required></div>
        </div>
        <div>
            <label for="alamat">Alamat :</label><br>
            <textarea name="alamat" id="alamat" cols="30" rows="7"></textarea>
        </div>
    </div>
        @error('email')
          <p class="alert">{{ $message }}</p>
        @enderror
        @error('password')
          <p class="alert">{{ $message }}</p>
        @enderror
    <a class="ty" href="login">Sudah Punya Akun</a><br>
            <button type="submit">Daftar</button>
        </form>
    </div>

</body>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('gambar/gambarTPS1.jpg'); /* Gantilah 'nama_gambar.jpg' dengan nama dan lokasi gambar Anda */
            background-size: cover; /* Menyesuaikan ukuran gambar agar menutupi seluruh background */
            background-position: center; /* Menyusun gambar ke tengah background */
            background-repeat: no-repeat; /* Mencegah gambar diulang */
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .alert {
            color :red;
        }
        .container {
            background-color:  #fff;
            border-radius: 8px;
            box-shadow: 1px 0 10px rgba(0, 0, 0, 0.8);
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .container:hover{
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            width: 100%; /* Lebar form diatur sesuai dengan kebutuhan */
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input, select, textarea{
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 13rem;
        }
        select {
            width: 14.3rem;
        }

        .el {
           display: flex;
           align-items: center;
           justify-content: space-between;
           width: 30rem;
        }

        button {
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            width: 100%;
            font-weight: bold;
        }

        button:hover {
            background-color: #2980b9;
        }
        .ty {
            text-decoration: none;
            color: rgb(35, 33, 163);
            font-style: italic;
            font-weight: bolder;
        }
        @media only screen and (max-width: 600px) {
            body {
                background-image: none;
                background-color: #f1f1f1f1;
                
            }
            .container {
                background-color: #fff;
                margin-top: 25rem;
                padding: 0px;
                
            }
            .el {
                display: block;
                margin-left: 4rem;
                width: 24rem;
                
            }
            input, select, textarea{
            padding: 7px;
            margin-top: 3px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 18rem;
            }
            select {
                width: 19rem;
            }
            button {
                width: 50%;
                margin-left: 4rem;
                margin-bottom: 4rem;
            }
            .alert {
             margin-left: 4rem;
            }
            .ty {
                padding-left: 6rem;
            }
        }
    </style>
    <script>
    // Fungsi untuk toggle tampilan password
    document.getElementById("togglePassword").addEventListener("click", function() {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            this.classList.remove("fa-eye");
            this.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            this.classList.remove("fa-eye-slash");
            this.classList.add("fa-eye");
        }
    });
</script>
</body>
</html>