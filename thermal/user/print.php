<?php
session_start();

include "../koneksi.php";

$kode = $_GET["kode"];

$result_keranjang = mysqli_query($conn, "SELECT K.*, P.nm_produk FROM tbl_keranjang K, tbl_produk P WHERE K.id_produk = P.id_produk AND K.kode = '$kode'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Penjualan</title>
    <style>
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
        }

        td.description,
        th.description {
            width: 75px;
            max-width: 75px;
        }

        td.quantity,
        th.quantity {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 155px;
            max-width: 155px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="ticket">
        <img src="../images/TD.png" alt="Logo">
        <p class="centered">Nota Penjualan
            <br>Toko Paizal
            <br>KODE : <?php echo $kode ?>
        </p>
        <table>
            <thead>
                <tr>
                    <th class="quantity">Qty</th>
                    <th class="description">Barang</th>
                    <th class="price">Rp.</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row_transaksi = mysqli_fetch_assoc($result_keranjang)) { ?>
                <tr>
                    <td class="quantity"><?php echo $row_transaksi["qty"] ?></td>
                    <td class="description"><?php echo $row_transaksi["nm_produk"] ?></td>
                    <td class="price"><?php echo $row_transaksi["harga"] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <p class="centered">Thanks for your purchase!</p>
    </div>
    <button id="btnPrint" class="hidden-print">Print</button>
    <script>
        const $btnPrint = document.querySelector("#btnPrint");
        $btnPrint.addEventListener("click", () => {
            window.print();
        });
    </script>
</body>

</html>