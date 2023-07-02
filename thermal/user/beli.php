<?php
session_Start();

include "../koneksi.php";

$id_produk = $_GET["id"];

$result_produk = mysqli_query($conn, "SELECT * FROM tbl_produk WHERE id_produk = '$id_produk'");
$row_produk = mysqli_fetch_assoc($result_produk);

if(isset($_POST["submit"])){

$kode = $_SESSION["kode"];
$harga = $row_produk["harga"];
$qty = $_POST["qty"];
$jumlah = $harga * $qty;

$simpan = mysqli_query($conn, "INSERT INTO tbl_keranjang VALUES(NULL, '$kode', '$id_produk', '$harga', '$qty', '$jumlah')");
header("Location: keranjang.php");
}   
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
                <h1>Banyaknya Pembelian</h1>
            <div class="row">
                <div class="col">
                    <form method="post" target="">
                        <div class="mb-3">
                            <label for="nm_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nm_produk" name="nm_produk" value="<?php echo $row_produk["nm_produk"] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $row_produk["harga"] ?>"readonly>
                        </div>
                        <div class="mb-3">
                            <label for="qty" class="form-label">QTY</label>
                            <input type="number" class="form-control" id="qty" name="qty" value="1" autofocus required >
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Masukkan Keranjang</button>
                        <a href="index.php" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>