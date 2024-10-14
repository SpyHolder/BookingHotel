<?php

require "../function/function.php";

$conn = mysqli_connect("localhost", "root", "", "hotelbooking");
if (!$conn) {
    echo "koneksi gagal";
}


$ID = $_GET['id'];
$query = mysqli_query($conn, "select * from room where idroom = $ID");

if (mysqli_num_rows($query) > 0) {
    $row = $query->fetch_assoc();
    $type = $row['roomtype'];
    $harga = $row['harga'];
    $deskripsi = $row['deskripsi'];
    $fasilitas = $row['fasilitas'];
    $IDroom = $row['idroom'];
} else {
    echo "Data tidak ditemukan.";
}

if (isset($_POST['submit'])) {
    masuk($ID);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        // Menampilkan alert ketika halaman dimuat
        window.onload = function() {
            alert("<?= $validasi; ?>");
        };
    </script>

</head>

<body>
    <table border="1">
        <tr>
            <td>Foto room</td>
            <td><img src="" alt=""></td>
        </tr>
        <tr>
            <td>Tipe Room</td>
            <td><?= $type ?></td>
        </tr>
        <tr>
            <td>Fasilitas</td>
            <td><?= $fasilitas ?></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><?= $deskripsi ?></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><?= $harga ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <form method="POST">
                    <button type="submit" name="submit">Reservasi</button>
                </form>
            </td>
        </tr>
    </table>

</body>

</html>