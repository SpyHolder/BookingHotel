<?php
$conn = mysqli_connect("localhost", "root", "", "hotelbooking");
if (!$conn) {
    echo "koneksi gagal";
}

if (isset($_POST['submit'])) {
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $email = $_POST['email'];
    $username = $_POST["username"];
    $alamat = $_POST["alamat"];
    $nomorhp = $_POST["nomorhp"];
    $negara = $_POST["negara"];

    if (empty($password) || empty($email) || empty($username) || empty($alamat) || empty($nomorhp) || empty($negara) || empty($confirmpassword)) {
        $validasi = "Silahkan Lengkapi Data Anda!";
    } else {

        if ($password !== $confirmpassword) {
            $validasi = "Password tidak sama";
        } else {
            if (mysqli_num_rows(mysqli_query($conn, "select * from login where email = '$email'")) > 0) {
                $validasi = "Email sudah terdaftar, silahkan email lain!";
            } else {
                if (mysqli_query($conn, "insert into login (email,password,username,alamat,nomorhp,role,negara) values ('$email','$password','$username','$alamat',$nomorhp,'user','$negara')")) {
                    echo header('Location: login.php');
                } else {
                    $validasi = "Gagal Menambahkan User";
                }
            }
        }
    }
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
</head>

<body>
    <?php
    if (isset($validasi)) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $validasi ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <form method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" id="alamat"></textarea></td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td><input type="number" name="nomorhp"></td>
            </tr>
            <tr>
                <td>Negara</td>
                <td><input type="text" name="negara"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Confirmasi Password</td>
                <td><input type="password" name="confirmpassword"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Register</button></td>
            </tr>
        </table>
    </form>
</body>

</html>