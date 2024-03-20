
<?php 

session_start();

require 'config/function.php';

if(isset($_POST["login"])>0){
    $email = $_POST["email"];
    $password = $_POST["pass"];

    $cek = mysqli_query($konek, "SELECT * FROM tb_akun WHERE email='$email' AND password='$password' ");

    if(mysqli_num_rows($cek)===1){
        $row = mysqli_fetch_assoc($cek);

        $_SESSION["login"] = true;
        $_SESSION["email"] = $row["email"];

        header('location: index.php');
    } else {
        echo "<script>
         alert('Username Atau Password salah!')
         document.location.href = 'login.php'
        </script>";
    }
} 


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

<style>
    body {
        background-color : #FAA0A0;
    }

    .card {
        width: 150vh ;
        height: 70vh ;
        margin-left: 230px;
        margin-top:70px;
    }
    img {
        width : 355px;
        margin-top: -15px;
        border-radius: 10px;
    }
</style>

<body>

<!-- CARD LOGIN -->

        <div class="card">
            <div class="card-body">
                
                <div class="row">

                    <div class="col">
                        <img src="assets/image/login-gambar.jpeg" alt="">
                    </div>

                    <div class="col">
                        <!-- FORUM LOGIN -->
                        <form method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input name="pass" type="password" class="form-control" >
                            </div>
                            <button name="login" type="submit" class="btn btn-danger">Masuk</button>
                        </form>

                    </div>

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