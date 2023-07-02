<?php
session_start();

include "../koneksi.php";

$result_transaksi = mysqli_query($conn, "SELECT * FROM tbl_transaksi ORDER BY id_transaksi DESC");
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
                <h1>Data Transaksi</h1>
                <p>berikut adalah data transaksi Anda</p>
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Action</th>
                                <th scope="col">Kode</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Metode</th>
                                <th scope="col">Total Qty</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row_transaksi =  mysqli_fetch_assoc($result_transaksi)) { ?>
                            <tr>
                                <td><a href="print.php?kode=<?php echo $row_transaksi["kode"] ?>" class="btn btn-sm btn-success">Print</a></td>
                                <th scope="row"><?php echo $row_transaksi["kode"] ?></th>
                                <td><?php echo $row_transaksi["telp"] ?></td>
                                <td>
                                    <?php if ($row_transaksi["metode"] == 1) {
                                        echo "Dine Inn";
                                    } else {
                                        echo "Take Away";
                                    } ?>
                                </td>
                                <td><?php echo $row_transaksi["total_qty"] ?></td>
                                <td><?php echo $row_transaksi["total_harga"] ?></td>
                                <td><?php echo $row_transaksi["tgl"] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>