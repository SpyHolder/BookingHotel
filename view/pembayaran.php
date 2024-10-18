<?php

require "../function/function.php";

$conn = mysqli_connect("localhost", "root", "", "hotelbooking");
if (!$conn) {
    echo "koneksi gagal";
}

$idReservasi = $_GET['kode'];

if ($_POST['submit']) {
    bayar($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
</head>

<body>
    <form method="post">
        <table>
            <tr>
                <td>Kode Reservasi</td>
                <td><?= $idReservasi ?></td>
            </tr>
            <tr>
                <td>Tanggal Pembayaran</td>
                <td><input type="date"name="tanggalPembayaran"></td>
            </tr>
            <tr>
                <td>Total Pembayaran</td>
                <td><input type="number" name="totalPembayaran"></td>
            </tr>
            <tr>
                <td>Metode Pembayaran</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td colspan="2"><button name="submit" type="submit">Bayar</button></td>
            </tr>
        </table>
    </form>
</body>

</html>