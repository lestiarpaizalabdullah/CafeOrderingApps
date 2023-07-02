<?php
session_start();

include "../koneksi.php";

?>
<!doctype html>
<html lang="en">
  <head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Toko Paizal</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Toko Paizal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori
                    </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Makanan</a></li>
                    <li><a class="dropdown-item" href="#">Minuman</a></li>
                    <li><a class="dropdown-item" href="#">Snack</a></li>
                </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="keranjang.php">Keranjang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="transaksi.php">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="logout.php">Log Out</a>
                </li>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
    </div>
    </nav>

    <div class="container">
        <div class="row mt-3">
            <div class="col">

                <h1>Selamat Datang <?= $_SESSION["telp"] ?></h1>
                <p>Silakan memilih produk di bawah ini </p>
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <img src="../images/nasgor.png" class="card-img-top" alt="nasigoreng">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">Terbuat Dari Lontong Tercampur dibuat dari sambal Kacang</p>
                        <a href="beli.php" class="btn btn-primary">Beli</a>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <img src="../images/nasgor.png" class="card-img-top" alt="gambar">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="beli.php" class="btn btn-primary">Beli</a>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <img src="../images/nasgor.png" class="card-img-top" alt="gambar">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="beli.php" class="btn btn-primary">Beli</a>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <img src="../images/nasgor.png" class="card-img-top" alt="gambar">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="beli.php" class="btn btn-primary">Beli</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <h1>Data Keranjang</h1>
                <p>Silakan memilih keranjang di bawah ini </p>
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <h1>Tambah Produk</h1>
                <p>Silakan menambahkan produk di bawah ini </p>
            <div class="row">
                <div class="col">
                    <form method="post">
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Nomor Telepion Aktif" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="passowrd" placeholder="Password Anda" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="register.php" class="btn btn-secondary">Sign In</a>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>