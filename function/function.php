<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "hotelbooking");
if (!$conn) {
    echo "koneksi gagal";
}

function masuk($id)
{
    if (!isset($_SESSION['user'])) {
        header("Location: login.php?kode=" . $id);
    } else {
        header("Location: reservasi.php?kode=" . $id);
    }
}

function reservasi($data){

    $checkin = $data['checkin'];
    $checkout = $data['checkout'];
    $totalharga = $data['totalharga'];
    $IDroom = $data['idroom'];

}
