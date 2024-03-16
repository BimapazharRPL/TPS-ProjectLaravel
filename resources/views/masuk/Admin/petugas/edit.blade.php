<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Edit</title>
<link rel="icon" href="gambar/logoTPS.jpg">
</head>
<body>
<div class="container">
<form method="POST" action="{{ route('qwertyu.update', $anggota->id) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="nama">Nama :</label>
        <input type="text" id="nama" name="nama" placeholder="input nama " value="{{ old('nama') ?? $anggota->nama }}" required>
        </div>
        <div>
        <label for="tgl_lahir">Tanggal lahir :</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir" placeholder="input tanggal lahir " value="{{ old('tgl_lahir') ?? $anggota->tgl_lahir }}" required>
        </div>
    <div>
        <label for="telepon">Telepon :</label>
        <input type="tel" id="telepon" name="telepon" placeholder="input telepon" value="{{ old('telepon') ?? $anggota->telepon }}" required>
        </div>
        <div>
        <label for="alamat">alamat :</label>
        <textarea name="alamat" id="alamat" cols="20" rows="5" required>{{ old('alamat') ?? $anggota->alamat }}</textarea>
        </div>
        <button type="submit">Update data</button>
    </form><button id="closeButton">Close</button>
</div>
</body>
<style>
    body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 1rem auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #9FE2BF;
            color: #000;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
        }

        button:hover {
            background-color: #267b81;
            color: #ffff;
        }
        #closeButton {
            margin-top: 2px;
        }
        @media only screen and (max-width: 600px) {
            .container {
            margin: 0.5rem auto;
        }
        #closeButton {   
            margin: 0.5rem 2rem;
            }
            button {
                padding: 7px 15px;
            }
    }
</style>
<script>
        
        function closeView() {
            
            window.history.back();
        }
    
        document.getElementById('closeButton').addEventListener('click', closeView);
    </script>
</html>