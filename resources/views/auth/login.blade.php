<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="gambar/logoTPS.jpg">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="{{route('auth.authentication') }}" method="post">
            {{ csrf_field() }}
            <!-- <label for="email">Email atau nomor telepon:</label>
            <input type="email" id="email" name="email" required> -->
            <label for="identifier">Email atau Nomor Telepon :</label>
            <input type="text" id="identifier" name="identifier" required>

            <label for="password">Password : <span class="input-group-text">
            <i class="fas fa-eye" id="togglePassword"></i>
        </span></label>
            <input type="password" id="password" name="password" required>
            @error('identifier')
          <div class="alert">{{ $message }}</div>
        @enderror

            <a class="ty" href="daftar">Belum Punya Akun</a><br><br>
            <button type="submit">Login</button>
        </form>
    </div>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url('gambar/gambarTPS.jpg'); 
            background-size: cover; 
            background-position: center; /* Menyusun gambar ke tengah background */
            background-repeat: no-repeat; /* Mencegah gambar diulang */
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 1px 0 10px rgba(0, 0, 0, 0.6);
            padding: 20px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 2rem;
            /* font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; */
            font-family: 'Times New Roman', Times, serif;
            /* text-shadow: 
    2px 2px 2px rgba(0, 0, 0, 0.39),
    -2px -2px 2px rgba(0, 0, 0, 0.568); */
        }

        label {
            display: block;
            margin-top: 10px;
           font-weight: bold;
        }

        input {
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 90%;
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
        .alert{
            color: red;
            width: 20rem;
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
