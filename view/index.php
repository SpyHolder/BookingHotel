<?php 

$conn = mysqli_connect("localhost","root","","hotelbooking");
if (!$conn) {
    echo "koneksi gagal";
}
$query = mysqli_query($conn,"select * from room");
// $query = mysqli_query($conn,"select * from room join photoroom on room.idfoto = photoroom.idfoto");

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

    <a href="#">Home</a>
    <a href="#">Room</a>
    <a href="#">About</a>
    <?php session_start();
    if (!isset($_SESSION['user'])) : ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    <?php else : ?>
        <a href="#">Profil</a>
        <a href="logout.php">Logout</a>
    <?php endif; ?>

    <div class="d-flex justify-content-center">
        <?php 
        if (mysqli_num_rows($query) > 0) :
            while ($row = mysqli_fetch_assoc($query)) : ?>
                <div class="card m-3" style="width: 18rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row["roomtype"]?></h5>
                        <p class="card-text"><?=  $row["harga"]?></p>
                        <a href="detailroom.php?id=<?= $row["idroom"] ?>" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            <?php endwhile; 
                    endif;?>
    </div>
</body>
</html>