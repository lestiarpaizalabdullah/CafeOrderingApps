<?php
session_start();

include "../koneksi.php";

$kode = $_SESSION["kode"];

$result_keranjang = mysqli_query($conn, "SELECT K.*, P.nm_produk FROM tbl_keranjang K, tbl_produk P WHERE K.id_produk = P.id_produk AND K.kode = '$kode'");

if (isset($_POST["submit"])) {

    $telp = $_SESSION["telp"];
    $metode = $_SESSION["metode"];
    $ket = $_POST["ket"];
    $total_qty = $_POST["total_qty"];
    $total_harga = $_POST["total_harga"];
    $tgl = date("Y-m-d");

    $simpan = mysqli_query($conn, "INSERT INTO tbl_transaksi VALUES(NULL, '$kode', '$telp', '$metode', '$ket', '$total_qty', '$total_harga', '$tgl')");
    $kodebaru = date('YmdHis');
    $_SESSION["kode"] = $kodebaru;
    header("Location: transaksi.php");
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
                <h1>Data Keranjang</h1>
                <p>Berikut adalah data keranjang anda...!</p>
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $jml_qty = 0;
                                $total = 0;
                                while ($row_keranjang = mysqli_fetch_assoc($result_keranjang)) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $no ?></th>
                                        <td><?php echo $row_keranjang["nm_produk"] ?></td>
                                        <td><?php echo $row_keranjang["harga"] ?></td>
                                        <td><?php echo $row_keranjang["qty"] ?></td>
                                        <td><?php echo $row_keranjang["jumlah"] ?></td>
                                    </tr>
                                <?php
                                    $no++;
                                    $jml_qty += $row_keranjang["qty"];
                                    $total += $row_keranjang["jumlah"];
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">Total</th>
                                    <th><?php echo $jml_qty ?></th>
                                    <th><?php echo $total ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-5">
            <div class="col">
                <h1>Form Checkout</h1>
                <div class="row">
                    <div class="col">
                        <form method="post" target="">
                            <div class="mb-3">
                                <label for="telpon" class="form-label">Telpon</label>
                                <input type="text" class="form-control" id="telpon" value="<?php echo $_SESSION["telp"] ?>" name="telpon" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="metode" class="form-label">Metode</label>
                                <input type="text" class="form-control" id="metode" value="<?php if ($_SESSION["metode"] == 1) {
                                                                                                echo "Dine In";
                                                                                            } else {
                                                                                                echo "Take Away";
                                                                                            } ?>" name="metode" readonly>
                            </div>
                            <?php if ($_SESSION["metode"] == 1) {
                            } else { ?>
                                <div class="mb-3">
                                    <label for="ket" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="ket" name="ket" placeholder="Alamat lengkap anda" required>
                                </div>
                            <?php } ?>

                            <input type="hidden" name="total_qty" value="<?php echo $jml_qty ?>">
                            <input type="hidden" name="total_harga" value="<?php echo $total ?>">

                            <button type="submit" name="submit" class="btn btn-primary">Checkout</button>
                            <a href="index.php" class="btn btn-secondary">Beli Produk Lagi</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>