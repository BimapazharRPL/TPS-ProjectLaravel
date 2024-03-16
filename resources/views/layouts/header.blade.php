
<div class="header">
      <p>TPS Bersama Warga Bersih Lingkungan<span style="margin-right: 30rem; background-color: blue;"></span>Kita Bisa Pembayaran Online Lohh!!!</p>
      
    </div>
    <div class="bm">
    <div class="navbar">
      <img src="gambar/editlogoTPS.png" alt="" />
      <div class="text">
        <a href="beranda"><p>BERANDA</p></a>
        <a href="peraturan"><p>PERATURAN</p></a>
        <a href="{{ route('petaa') }}"><p>PETA TPS3R</p></a>
        <a href="statistik"><p>STATISTIK</p></a>
        <a href="kontak-kami"><p>KONTAK KAMI</p></a>
      </div>
      <a class="mnl" onclick="toggleMenu()">MENU</a>
      <div class="tombol">
        <a href="login">Login</a>
        <a href="daftar">Daftar</a>
      </div>
    </div>
    </div>
    <div class="gene">
      <a href="beranda"><p>BERANDA</p></a>
      <!-- <a href="pembayaran.html"><p>PEMBAYARAN</p></a> -->
      <a href="peraturan"><p>PERATURAN</p></a>
      <a href="statistik"><p>STATISTIK</p></a>
      <a href="kontak-kami"><p>KONTAK KAMI</p></a>
    </div>
    
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap");
        * {
        font-family: Poppins;
      }

      .header {
        margin-top: 0rem;
        width: 100%;
        height: 3rem;
        /* width: 100rem; */
        justify-content: space-between;
        position: fixed;
        z-index: 9999;
        background-color: rgb(143, 175, 243);
      }
      .header p {
        font-size: 1.5rem;
        transform: translate(100%, -50%);
        position: fixed;
        color: #fff;
        font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
          sans-serif;
          /* font-family: Poppins; */
        animation: gerak-ke-kiri 50s linear infinite;
      }
      @keyframes gerak-ke-kiri {
        0% {
          transform: translate(110%, -50%);
        }
        100% {
          transform: translate(-100%, -50%);
        }
      }
      .navbar img {
        height: 4rem;
        margin-left: 2rem;
        /* margin-top: -1rem; */
      }
      .text {
        width: 60%;
        display: flex;
        align-items: center;
        justify-content: space-around;
        margin-left: 5rem;
      }
      .text a {
        text-decoration: none;
        color: #fff;
      }
      .text a:hover {
        color: black;
      }
      .navbar {
        margin-top: 3rem;
        display: flex;
        align-items: center;
        justify-content: space-around;
        font-size: 1rem;
        color: #ffff;
        font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
          sans-serif;
        background-color: rgb(82, 146, 91);
        width: 100%;
        font-weight: bold;
        z-index: 9999;
        height: 5rem;
        position: fixed;
      }
      .tombol a {
        padding: 0.5rem 1rem;
        background-color: rgb(61, 115, 197);
        border-radius: 5px;
        color: #fff;
        text-decoration: none;
        box-shadow: 7px 5px 5px rgba(0, 0, 0, 0.774);
      }
      .tombol a:hover {
        background-color: rgb(30, 55, 94);
        /* box-shadow: none; */
      }
      .tombol {
        width: 13%;
        display: flex;
        align-items: center;

        justify-content: space-around;
      }
      .isi img {
        width: 100%;
        margin-top: 4.3rem;
      }
      .gene {
        display: none;
        height: 2rem;
      }
      .mnl {
        display: none;
      }

      
      @media only screen and (max-width: 600px) {
        .header {
          height: 2.5rem;
         
        }
        .header p {
          margin-top: 15px;
          font-size: 1.2rem;
          height: 1rem;
          width: 100rem;
        }
        @keyframes gerak-ke-kiri {
          0% {
            transform: translate(30%, -50%);
          }
          100% {
            transform: translate(-67%, -50%);
          }
        }
        .navbar {
          margin-top: 2.5rem;
          height: 4rem;
        }
        .text {
          display: none;
        }
        .navbar img {
          height: 3rem;
          margin-left: -10px;
          /* margin-top: -1rem; */
        }
        .mnl {
          display: inline-block;
          font-size: 0.9rem;
          text-align: center;
          cursor: pointer;
        }
        .tombol {
          margin-right: -1rem;
          width: 29%;
          justify-content: space-between;
        }
        .tombol a {
          padding: 4px 8px;
        }
        
        
      .gene {
        display: inline-block;
        display: flex;
        justify-content: space-around;
        margin-top: 6.5rem;
        align-items: center;
        background-color: white;
        height: 2rem;
        width: 100%;
        position: fixed;
        z-index: 999;
        transition: transform 0.3s ease-out;
        transform: translateY(-100%);
        }

      .gene a {
        text-decoration: none;
        
        color: #000000;
        font-weight: bold;
      }
      .gene p {
        font-size: 0.8rem;
      }
      span {
        margin-right: 2rem;
      }
      }
      @media only screen and (max-width: 400px) {
        .header {
          height: 2.5rem;
        }
        .header p {
          margin-top: 15px;
          font-size: 1.2rem;
          height: 1rem;
        }
        @keyframes gerak-ke-kiri {
          0% {
            transform: translate(27%, -50%);
          }
          100% {
            transform: translate(-66%, -50%);
          }
        }
        .navbar {
          margin-top: 2.5rem;
          height: 4rem;
        }
        .text {
          display: none;
        }
        .navbar img {
          height: 3rem;
          margin-left: -1px;
          /* margin-top: -1rem; */
        }
        .mnl {
          display: inline-block;
          font-size: 0.9rem;
          text-align: center;
          cursor: pointer;
        }
        .tombol {
          margin-right: 1px;
          width: 38%;
          justify-content: space-between;
        }
        .tombol a {
          padding: 4px 8px;
        }
        
      }
    </style>

<script>
    function toggleMenu() {
    var geneMenu = document.querySelector('.gene');
    geneMenu.style.transform = geneMenu.style.transform === 'translateY(0)' ? 'translateY(-100%)' : 'translateY(0)';
}
document.addEventListener('click', function (event) {
    var geneMenu = document.querySelector('.gene');
    var menuButton = document.querySelector('.mnl');
    
    if (!geneMenu.contains(event.target) && event.target !== menuButton) {
        geneMenu.style.transform = 'translateY(-100%)';
    }
});
  </script>
