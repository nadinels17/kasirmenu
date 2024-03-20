
<?php 

$konek = mysqli_connect("localhost","root","","kasir_menu");


function menu($data){
    global $konek;
    $nama = $data["nama_menu"];
    $harga = $data["harga"];
    $desc = $data["desc"];
    $foto = fotoMenu() ;

    mysqli_query($konek,"INSERT INTO tb_menu VALUES(NULL,'$nama','$harga', '$desc', '$foto')");
    return mysqli_affected_rows($konek);
}

function fotoMenu(){
    $nama = $_FILES["foto"]["name"];
    $error = $_FILES["foto"]["error"];
    $tmp = $_FILES["foto"] ["tmp_name"];

    if($error == 4){
        echo "<script>alert('WAJIB UPLOAD FOTO')</script>";
    }

    $ekstensigambarValid = ['jpeg','png','jpg'];
    $ekstensigambar = explode(".", $nama);
    $ekstensigambar = strtolower(end($ekstensigambarValid));

    $nameBaru = " ";
    $nameBaru .= uniqid();
    $nameBaru .= ".";
    $nameBaru .= $ekstensigambar;

    move_uploaded_file($tmp, "assets/image/img_kasir/" . $nameBaru);

    return $nameBaru;
}

function pesan($data){
    global $konek;
    $menu = $data["menu"];
    $harga = $data["harga"];
    $qty = $data["qty"];

    $total = $harga * $qty;

    mysqli_query($konek, "INSERT INTO tb_pesanan VALUES(NULL, '$menu','$qty' ,'$total')");

    return mysqli_affected_rows($konek);
}


?>