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

    $date = date('m/j/Y H:i:s');

    $query = mysqli_query($conn,"insert into reservasi (iduser,idroom,tanggalcheckin,tanggalchekout,totalharga,status,tanggalReservasi) values ($dataUser,$IDroom,'$checkin','$checkout','$totalharga','belum bayar','$date')");
    if (!$query) {
        echo "<script>alert('Gagal menambahkan data');</script>";
    } else {
        $queryLagi = mysqli_query($conn,"select * from reservasi where tanggalReservasi = '$date' and idUser = $dataUser");
        if (mysqli_num_rows($queryLagi) > 0) {
            $row = $queryLagi->fetch_array();
            $idReservasi = $row['idreservasi'];
            header("Location: pembayaran.php?kode=$idReservasi");
        }
    }
}

// function bayar($data){
//     $idReservasi = 
// }
