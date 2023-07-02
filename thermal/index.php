<?php
session_start();
include "koneksi.php";

if(isset($_POST["login"])) {

  $telp = $_POST["telp"];
  $metode = $_POST["metode"];
  $kode = date('YmdHis');

  //simpan session
  $_SESSION["telp"] = $telp;
  $_SESSION["metode"] = $metode;
  $_SESSION["kode"] = $kode;

  header("Location: user/index.php");
  exit;
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
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4">

            <h1>Login Toko</h1>

            <form method="post">
                <div class="mb-3">
                    <label for="telp" class="form-label">Telepon :</label>
                    <input type="text" class="form-control" id="telp" name="telp" placeholder="Nomor Telepion Aktif" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Metode</label><br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="metode" id="inlineRadio1" value="1" checked>
                      <label class="form-check-label" for="inlineRadio1">Dine In</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="metode" id="inlineRadio2" value="2">
                      <label class="form-check-label" for="inlineRadio2">Take Away</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>