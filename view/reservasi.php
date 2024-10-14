<?php
require "../function/function.php";

$conn = mysqli_connect("localhost", "root", "", "hotelbooking");
if (!$conn) {
    echo "koneksi gagal";
}

$id = $_GET['kode'];
$query = mysqli_query($conn, "select * from room where idroom = '$id'");

if (mysqli_num_rows($query) > 0) {
    $row = $query->fetch_assoc();
    $tipe = $row['roomtype'];
    $hargaPerMalam = $row['harga'];
    $idRoom = $row['idroom'];
}

if (isset($_POST['submit'])) {
    reservasi($_POST);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi</title>
</head>

<body>
    <form method="post">
        <input type="hidden" value="<?= $idRoom ?>">
        <table>
            <tr>
                <td>Foto Room</td>
                <td></td>
            </tr>
            <tr>
                <td>Tipe Room</td>
                <td><input type="text" disabled value="<?= $tipe ?>"></td>
            </tr>
            <tr>
                <td>Harga Per Malam</td>
                <td><input type="text" disabled value="<?= $hargaPerMalam ?>"></td>
            </tr>
            <tr>
                <td>Tanggal Check In</td>
                <td><input type="date" name="checkin"></td>
            </tr>
            <tr>
                <td>Tanggal Check Out</td>
                <td><input type="date" name="checkout"></td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td><input type="number" name="totalharga"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="submit">Bayar</button></td>
            </tr>
        </table>
    </form>
</body>

</html>