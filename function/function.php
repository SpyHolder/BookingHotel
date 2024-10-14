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
    global $conn;

    $checkin = $data['checkin'];
    $checkout = $data['checkout'];
    $totalharga = $data['totalharga'];
    $IDroom = $data['idroom'];

    $dataUser = $_SESSION['user']['iduser'];

    $query = mysqli_query($conn,"insert into reservasi (iduser,idroom,tanggalcheckin,tanggalchekout,totalharga,status) values ($dataUser,$IDroom,'$checkin','$checkout','$totalharga','belum bayar')");
    if (!$query) {
        echo "<script>alert('Gagal menambahkan data');</script>";
    } else {
        header("Location: pembayaran.php");
    }

}
