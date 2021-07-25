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
                <li class="nav-item"><a class="nav-link" href="main.html.#hotel" style="font-family: Monospaced ;font-size: 20px"
                                        id="hotel1">Hotels</a></li>
                <li class="nav-item active"><a class="nav-link" href="main.html.#ticket" style="font-family: Monospaced;font-size: 20px">Tickets</a>
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
$flag = false;
if (isset($_POST["submit"])) {
    $strQry = 'select * from tickets';
    $res = $db->query($strQry);

    for ($i = 0; $i < $res->num_rows; $i++) {
        $row = $res->fetch_array();
        if ($_POST["From"] == $row[2] and $_POST["To"] == $row[3] and $_POST["Depart"] == $row[5] and $_POST["Return"] == $row[6] and $_POST["TicketType"]==$row[4]) {
            $flag = true;
            echo ' <div class="card container" style="width: 900px;border-radius: 12px;height: 280px"><div class="row">
             <div class="col-md-4" style="margin: 0; padding: 0;">
            <img src="' .$row[8]. '" height="280px " width="250px" style="border-radius: 12px">
        </div>
        <div class="col-md-8 px-md text-left" >
            <h3 class="text-left card-title" style="text-align: left">' . $row["company"] . '</h3>
            <h5>' . $row["type"] . '</h5>
            <p>' . $row["price"] . ' $ </p>
            <p>From: ' . $row["from."] . ' &nbsp &nbsp &nbsp &nbsp To: ' . $row["to."] . '</p>
            <p>depart: ' . $row["depart"] . ' &nbsp &nbsp &nbsp &nbsp return: ' . $row["return."] . '</p>
            <form action="ticketReservation.php" method="post"><input type="hidden" name="ticket1" value="' . $row[0] . '">
            <input type="submit" value="Book Now" style="border-radius: 6px; border-color: #24a9c4;color: #24a9c4;background-color: white">
            </form>
            <br>
        </div>     
        </div>
        </div>
        <br>';
        }
    }
    if (!$flag) {
        echo '<script>alert("There is no tickets match you specification")
    window.open("main.html.#ticket", "_self")
</script>';
/*
    echo '<script>var result = confirm("There is no tickets match you specification")
if (result==true)
    window.open("main.html", "_self")
    if (result==false)
    window.open("main.html", "_self")
</script>';*/

    }
} else {

    $strQry = 'select * from tickets';
    $res = $db->query($strQry);
    for ($i = 0; $i < $res->num_rows; $i++) {
        $row = $res->fetch_array();
        echo '  <div class="card container" style="width: 900px;border-radius: 12px;height: 280px"><div class="row">
             <div class="col-md-4" style="margin: 0; padding: 0;">
            <img src=' .$row[8].  ' height="280px " width="250px" style="border-radius: 12px">
        </div>
        <div class="col-md-8 px-md text-left" >
            <h3 class="text-left card-title" style="text-align: left">' . $row["company"] . '</h3>
            <h5>' . $row["type"] . '</h5>
            <p>' . $row["price"] . ' $ </p>
            <p>From: ' . $row["from."] . ' &nbsp &nbsp &nbsp &nbsp To: ' . $row["to."] . '</p>
            <p>depart: ' . $row["depart"] . ' &nbsp &nbsp &nbsp &nbsp return: ' . $row["return."] . '</p>
            <form action="ticketReservation.php" method="post">
            <input type="hidden" name="ticket" value="'. $row[0] .'">
            <input type="submit" value="Book Now"  style="border-radius: 6px; border-color: #24a9c4;color: #24a9c4;background-color: white">
            </form>
            <br>
        </div>     
        </div>
        </div>
        <br>';

    }
}
$db->close();

?>
</body>
</html>