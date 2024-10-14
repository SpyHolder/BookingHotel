<?php
    $conn = mysqli_connect("localhost", "root", "", "hotelbooking");
    if (!$conn) {
        echo "koneksi gagal";
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
        <table>
            <tr>
                <td>Foto Room</td>
                <td></td>
            </tr>
            <tr>
                <td>Tipe Room</td>
                <td></td>
            </tr>
            <tr>
                <td>Harga Per Malam</td>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal Check In</td>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal Check Out</td>
                <td></td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>