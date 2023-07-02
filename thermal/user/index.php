<?php
session_start();

include "../koneksi.php";

$result_produk = mysqli_query($conn, "SELECT * FROM tbl_produk ORDER BY id_produk DESC");

?>

<!doctype html>
<html lang="en">

<head>
    <meta harset="utf-8">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="makanan.php">Makanan</a></li>
                            <li><a class="dropdown-item" href="minuman.php">Minuman</a></li>
                            <li><a class="dropdown-item" href="snack.php">Snack</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="keranjang.php">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="transaksi.php">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
                    </li>
                </ul>
                <form class="d-flex">
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
                <p> Silakan Pilih Produk di Bawah Ini!</p>
                <div class="row">
                    <?php while ($row_produk = mysqli_fetch_assoc($result_produk)){?>
                    <div class="col-lg-4">
                        <div class="card">
                            <img src="../images/<?= $row_produk["gambar"]?>" class="card-img-top" alt="gambar">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row_produk["nm_produk"]?></h5>
                                <p class="card-text"><?= $row_produk["deskripsi"]?></p>
                                <h4><?= $row_produk["harga"]?></h4>
                                <a href="beli.php?id=<?= $row_produk["id_produk"] ?>" class="btn btn-primary">Beli</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<thead class="table-primary">

</tbody>
</table>                    
                    </div>
                </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>