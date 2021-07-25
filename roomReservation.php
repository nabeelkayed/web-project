<?php
if (isset($_POST["Cancel"])) {
    header("location: rooms.php");
}
$hotel = "";
if (isset($_POST["hotel"])) {
    setcookie("hotel", $_POST["hotel"]);
    $_COOKIE['hotel'] = $_POST["hotel"];
}
if (isset($_POST["roomNumber"])) {
    setcookie("roomNumber", $_POST["roomNumber"]);
    $_COOKIE['roomNumber'] = $_POST["roomNumber"];
}
if (isset($_POST["checkin"])) {
    setcookie("checkin", $_POST["checkin"]);
    $_COOKIE['checkin'] = $_POST["checkin"];
}
if (isset($_POST["checkout"])) {
    setcookie("checkout", $_POST["checkout"]);
    $_COOKIE['checkout'] = $_POST["checkout"];
}
if (isset($_POST["Booknow"])) {
    @$db = new mysqli(localhost, root, "", project);
    if (mysqli_connect_errno()) {
        echo "error";
        die();
    }
    $strQry = 'INSERT INTO `roomreservation` (`roomNumber`,`hotelName`,`checkin`,`checkout`,`clientName`,`email` ,`visa`, `address`, `phone`) 
     VALUES ("'.$_COOKIE['roomNumber'].'","' . $_COOKIE['hotel'] . '","'. date( $_COOKIE['checkin']).'","'. date( $_COOKIE['checkout']).'","' . $_POST["firstname"] . ' ' . $_POST["lastname"] .
        '","'.$_POST["email"].'",' . $_POST["credit"] . ',"' . $_POST["address"] . '",' . $_POST["phone"] . ')';
    $res1 = $db->query($strQry);
    $db->close();
    header("location: rooms.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CHECK</title>
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


</head>
<body>

<section>
    <div id="slides" class="carousel " data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
            <li data-target="#slides" data-slide-to="3"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/pexels-leonardo-rossatti-2598638.jpg" style="width: 100%; height: 656px" class="active">
            </div>
            <div class="carousel-item">
                <img src="img/pexels-oliver-sjöström-1078983.jpg" style="width: 100%; height: 656px">
            </div>
            <div class="carousel-item">
                <img src="img/pexels-aleksandar-pasaric-3629227.jpg" style="width: 100%; height: 656px">
            </div>
            <div class="carousel-item">
                <img src="img/pexels-carlos-oliva-3586966.jpg" style="width: 100%; height: 656px">
            </div>
        </div>
    </div>
    <section class="bg-model">
        <div class="info" id="info">
            <form action="" method="post">
                <a href="main.html">
                    <div class="close">+</div>
                </a>
                <div class="text-left" style="margin-top: -20px"><img src="img/VOYAGE%20(3).jpg" width="100px"></div>
                <br>
                <h4 style="font-family: 'Bell MT';font-size: 40px">Personal Information</h4>
                <hr>
                <div class="row" style="font-family: 'Bell MT';font-size: 20px">
                    <div class="col-md-6">
                        <label class="text-center">First Name</label>
                        <input type="text" name="firstname" class="" style="width: 240px">
                    </div>
                    <div class="col-md-6">
                        <label class=" text-center">last Name</label>
                        <input type="text" name="lastname" class=" text-center" style="width: 240px">
                    </div>
                </div>
                <br>
                <div class="row" style="font-family: 'Bell MT';font-size: 20px">
                    <div class="col-md-6">
                        <label class="text-center">email address</label>
                        <input name="email" type="text" style="width: 240px">
                    </div>
                    <div class="col-md-6">
                        <label class="text-center">Credit Card</label>
                        <input type="text" name="credit" style="width: 240px">
                    </div>

                </div>
                <br>
                <div class="row" style="font-family: 'Bell MT';font-size: 20px">
                    <div class="col-md-6">
                        <label class="text center">Phone Number</label>
                        <input type="text" name="phone" style="width: 240px">
                    </div>
                    <div class="col-md-6">
                        <label class="text center">Address</label>
                        <input type="text" name="address" style="width: 240px">
                    </div>
                </div>

                <br>
                <input type="submit" name="Booknow" value="Book now"
                       style="margin-left: -20px;border-radius: 10px;background-color: white;border-color: #0f5133;color: #0f5133;font-family: 'Bell MT';width: 120px">
                <input type="submit" name="Cancel" value="Cancel"
                       style="border-radius: 10px;background-color: white;border-color: #0f5133;color: #0f5133;font-family: 'Bell MT';width: 120px">
                <br>
            </form>
        </div>
    </section>
</section>
</body>
</html>