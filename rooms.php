<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VOYAGE</title>
    <link rel="stylesheet" type="text/css" href="css/stylee.css">
    <link rel="stylesheet" href="c.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light  sticky-top" style="background-color: white">
    <div class="container-fluid">
        <a class="navbar-brand"><img src="img/VOYAGE%20(3).jpg" width="200px" height="50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item "><a class="nav-link" href="main.html" style="font-family: Monospaced;font-size: 20px">Home</a>
                </li>
                <li class="nav-item active" ><a class="nav-link" href="main.html.#hotel" style="font-family: Monospaced ;font-size: 20px"
                                        id="hotel1">Hotels</a></li>
                <li class="nav-item"><a class="nav-link" href="main.html.#ticket" style="font-family: Monospaced;font-size: 20px">Tickets</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="main.html.#tours" style="font-family: Monospaced;font-size: 20px">Tours</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="main.html.#about-us"
                                        style="font-family: Monospaced;font-size: 20px">About us</a></li>
            </ul>
        </div>
    </div>
</nav>
<br><br>
<?php
@$db = new mysqli(localhost, root, "", project);
if (mysqli_connect_errno()) {
    echo "error";
    die();
}
if (isset($_POST['submit1'])) {
    $strQry = 'select * from hotels , rooms  where hotels.hotelName = rooms.hotelName ';
    $res = $db->query($strQry);
    $flag = false;
    for ($i2 = 0; $i2 < $res->num_rows; $i2++) {
        $row = $res->fetch_array();
        if ($_POST["City"] == $row['City'] and $_POST["Type"] == $row['description']) {
            $flag = true;
            echo '  <div class="card container" style="width: 900px;border-radius: 12px;height: 280px">
    <div class="row">
  <div class="col-md-4" style="margin: 0; padding: 0;">
            <img src="' .$row["image"]. '" height="280px " width="250px" style="border-radius: 12px">
        </div>
        <div class="col-md-8 px-md text-left" >
            <h3 class="text-left card-title" style="text-align: left">' . $row['hotelName'] .
                '</h3>
            <h5>' . $row['Location'] .
                ' </h5>
            <p>';
            for ($i = 0; $i < $row['stars']; $i++)
                echo '<i class="fa fa-star"></i>';
            echo '  </p><p>' . $row['price'] .
                ' $ for each day</p>
            <p>' . $row['description'] .
                '&nbsp Room</p>
            <form action="roomReservation.php" method="post">  <input type="hidden" name= "hotel" value="' . $row['hotelName'] . '">
            <input type="hidden" name= "roomNumber" value="' . $row['roomNumber'] . '">
            <input type="hidden" name= "checkin" value="' . $_POST["CheckIn"] . '">
            <input type="hidden" name= "checkout" value="' . $_POST["CheckOut"] . '">
            <input type="submit" value="Booknow" style="border-radius: 6px; border-color: #24a9c4;color: #24a9c4;background-color: white"></form>
            <br>
        </div>
            </div>
</div> ';

        }
    }
    if (!$flag) {
        echo '<script>alert("There is no rooms match you specification")
    window.open("main.html.#hotel", "_self")
</script>';
    }
} else {
    $strQry = 'select * from hotels , rooms  where hotels.hotelName = rooms.hotelName ';
    $res = $db->query($strQry);
    $flag = false;
    for ($i4 = 0; $i4 < $res->num_rows; $i4++) {
        $row = $res->fetch_array();
        echo '  
        <div class="card container" style="width: 900px;border-radius: 12px;height: 280px">
        <div class="row">
            <div class="col-md-4" style="margin: 0; padding: 0;">
                  <img src="' .$row["image"]. '" height="280px " width="250px" style="border-radius: 12px">
            </div>
            <div class="col-md-8 px-md text-left" >
                  <h3 class="text-left card-title" style="text-align: left">' . $row['hotelName'] . '</h3>
            <h5>' . $row['Location'] . ' </h5>
            <p>';
        for ($i = 0; $i < $row['stars']; $i++)
            echo '<i class="fa fa-star"></i>';
        echo '  </p>
            <p>' . $row['price'] . ' $ for each day</p>
            <p>' . $row['description'] . '&nbsp Room</p>
            <form action="roomReservation.php" method="post">  <input type="hidden" name= "hotel" value="' . $row['hotelName'] . '">
            <input type="hidden" name= "roomNumber" value="' . $row['roomNumber'] . '">';
            if (isset($_POST["CheckIn"]) and isset( $_POST["CheckOut"])){
          echo' <input type="hidden" name= "checkin" value="' . $_POST["CheckIn"] . '">
            <input type="hidden" name= "checkout" value="' . $_POST["CheckOut"] . '">';
            }
            echo '<input type="submit" value="Booknow" style="border-radius: 6px; border-color: #24a9c4;color: #24a9c4;background-color: white"></form>
            <br>
        </div>
            </div>
</div> ';
    }
}
$db->close();
?>

</body>
</html>



