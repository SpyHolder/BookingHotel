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

// GAK JALAN
// function hargaTotal()
// {
//     global $hargaPerMalam, $totalHarga;
//     if (isset($_POST['checkin']) || isset($_POST['checkout'])) {
//         $tanggal_1 = date_create($_POST['checkout']);
//         $tanggal_2 = date_create($_POST['checkin']);
//         $diff = date_diff($tanggal_1, $tanggal_2);
//         $selisih = $diff->days;
//         $totalHarga = $selisih * $hargaPerMalam;
//     }
// }

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
        <input type="hidden" value="<?= $idRoom ?>" name="idroom">
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
                <td><input type="text" disabled value="<?= $hargaPerMalam ?>" id="hargaPerMalam"></td>
            </tr>
            <tr>
                <td>Tanggal Check In</td>
                <td><input type="date" name="checkin" id="checkin"></td>
            </tr>
            <tr>
                <td>Tanggal Check Out</td>
                <td><input type="date" name="checkout" id="checkout"></td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td><input type="number" name="totalharga" id="totalHarga" disabled></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="submit">Bayar</button></td>
            </tr>
        </table>
    </form>

    <!-- GAK JALAN
    <script>
        function totalHarga() {
            const checkin = document.getElementById('checkin').value;
            const checkout = document.getElementById('checkout').value;
            const hargaPerMalam = document.getElementById('hargaPerMalam').value;
            if (checkin && checkout) {

                const tanggalCheckin = new Date(checkin);
                const tanggalCheckout = new Date(checkout);

                const selisihWaktu = tanggalCheckout - tanggalCheckin;
                const selisihHari = selisihWaktu / (1000 * 60 * 60 * 24);

                const totalHarga = selisihHari * hargaPerMalam;
                document.getElementById('totalHarga').value = totalHarga;
            }
        }
    </script> -->

</body>

</html>