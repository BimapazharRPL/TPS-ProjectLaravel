<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="footer">
      <img src="gambar/logoTPS.jpg" alt="" />
      <div class="t1">
        <p class="ftp">TPS 3R</p>
        <p class="frr">Reduce, Reuse, Recycle</p>
      </div>
      <div class="t2">
        <div class="d1">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-envelope-fill"
            viewBox="0 0 16 16"
          >
            <path
              d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"
            />
          </svg>
          <i class="bi bi-envelope-fill"></i>
          <p>tps3r.br@gmail.com</p>
        </div>
        <div class="d2">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-telephone-fill"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"
            />
          </svg>
          <i class="bi bi-telephone-fill"></i>
          <p>0856 7133 670</p>
        </div>
      </div>
      <p class="alam">
        Dusun Krajan 2, RT 06/RW 02<br />Warungbambu, Kec. Karawang Timur<br />Kab
        Karawang, Jawa Barat
      </p>
    </div>
    <style>
        .footer {
        background-color: rgb(15, 14, 14);
        height: 10rem;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-around;
      }
      .footer img {
        height: 8rem;
        border-radius: 20px;
      }
      .t1 p {
        color: #fff;
        font-weight: bold;
        line-height: 1px;
        /* text-align: center; */
      }
      .ftp {
        font-size: 2rem;
        font-family: cursive;
      }
      .alam {
        color: #fff;
      }
      .footer svg {
        color: #fff;
      }
      .t2 p {
        color: #fff;
        margin-left: 1rem;
        line-height: 1px;
      }
      .d1,
      .d2 {
        display: flex;
        align-items: center;
      }
      @media only screen and (max-width: 600px) {
        .footer {
          height: 8rem;
        }
        .footer img {
          height: 5rem;
        }
        .ftp {
          font-size: 2rem;
        }
        .frr {
          font-size: 0.8rem;
        }
        .t2 p {
          margin-left: 0.8rem;
          font-size: 15px;
        }
        .alam {
          display: none;
        }
      }
      @media only screen and (max-width: 400px) {
        .footer {
          height: 7rem;
        }
        .footer img {
          height: 4rem;
        }
        /* .t1 {
          width: 1rem;
          height: 5rem;
        } */
        .ftp {
          font-size: 1.5rem;
        }
        .frr {
          font-size: 0.6rem;
          /* width: 13rem;
          height: 5rem; */
          /* display: none; */
        }
        .t2 p {
          margin-left: 0.5rem;
          font-size: 11px;
        }
        .alam {
          display: none;
        }
      }
    </style>
</body>
</html>