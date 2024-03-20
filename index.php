<?php 

require 'config/function.php';
session_start();


if(isset($_POST["tambah"])){
    if(menu($_POST)>0) {
        echo "<script>
        alert('Menu Ditambahkan')
        document.location.href = 'index.php'
        </script>";
    } else {
        echo "<script>
        alert('Menu Gagal Ditambah')
        document.location.href = 'index.php'
        </script>";
    }
}

if(isset($_POST["send"])){
    if(pesan($_POST)>0) {
        echo "<script>
        document.location.href = 'index.php'
        </script>";
    } else {
        echo "<script>
        document.location.href = 'index.php'
        </script>";
    }
}

$query1 = mysqli_query($konek, "SELECT * FROM tb_menu");

$query2 = mysqli_query($konek, "SELECT * FROM tb_pesanan JOIN tb_menu ON tb_pesanan.id_menu = tb_menu.id_menu");

$no= 1;
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
 
    <div class="row mt-5">

        <div class="col mx-3">

            <h1>Loubriyne Menu</h1>
            <br>

            <!-- BUTTON TAMBAH MENU -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Menu
                </button>

                <br><br>

                <!-- CARD MENU -->
                <?php foreach($query1 as $data):?>
                <div class="card" style="width: 15rem;">
                    <img src="assets/image/img_kasir/<?=$data["foto_menu"];?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?=$data["nama_menu"];?></h5>
                        <p class="card-text"><?=$data["harga"];?></p>

                        <form action="" method="POST">
                            <input type="hidden" name="menu" value="<?=$data["id_menu"];?>">
                            <input type="hidden" name="harga" value="<?=$data["harga"];?>">
                            <input type="number" class="form-control" name="qty" value="1"> <br>

                            <div class="d-flex">
                            <button name="send" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                </svg>
                            </button>
                        </form>
                            <a href="#" class="btn btn-success mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                </svg>
                            </a>

                            <a href="#" class="btn btn-success mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                </svg>
                            </a>
                            </div>
                    </div>
                </div>
                <?php endforeach;?>


        </div>




        <div class="col">

            <div class="container">

                <div class="card">
                    <div class="card-body">
                        <h2>Pesanan</h2>
                        <br>
                        <!-- Tabel Pesanan -->
                        <table class="table table-danger">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Menu</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                                <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($query2 as $pesan):?>
                                <tr>
                                <th scope="row"><?=$no++;?></th>
                                <td><?=$pesan["nama_menu"];?></td>
                                <td><?=$pesan["jumlah"];?></td>
                                <td><?=$pesan["total"];?></td>
                                <td>
                                    <a class="btn btn-danger" href="delete-pesan.php?id=<?=$pesan["id_pesanan"];?>">X</a>
                                </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <br>
                        <!-- Total Pesanan -->
                        <div class="row">
                            <div class="col">
                                <b><h4>Total :</h4></b>
                            </div>
                            <div class="col">
                                <b><h4>Rp</h4></b>
                            </div>
                        </div>

                        <hr><br>
                        <h2>Pembayaran</h2> <br>
                        <!-- Forum Pembayaran -->
                        <form action="">
                            <input type="text" class="form-control" placeholder="Nama Pemesan"> <br>

                            <select class="form-select" aria-label="Default select example">
                                <option selected>Pilih Metode Pembayaran</option>
                                <option value="Tunai">Tunai</option>
                                <option value="Dana">Dana</option>
                                <option value="Gopay">Gopay</option>
                                <option value="Mbanking">Mbanking</option>
                                <option value="Ovo">Ovo</option>
                                <option value="Shopee Pa">Shopee Pay</option>
                            </select> <br>

                            <button type="submit" class="btn btn-success">Bayar</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>








        <!-- Modal Tambah Menu -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Menu</label>
                        <input type="text" name="nama_menu" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Deskripsi</label>
                        <input type="text" name="desc" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Gambar Menu</label>
                        <input type="file" name="foto" class="form-control" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
            </div>
            </form>
            </div>
        </div>
        </div>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>

</html>