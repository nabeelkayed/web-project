<?php
if (isset($_POST['ticket1'])) {
    setcookie("ticket", $_POST["ticket1"]);
    $_COOKIE['ticket'] = $_POST["ticket1"];
}
if (isset($_POST["buy"])) {
    @$db = new mysqli(localhost, root, "", project);
    if (mysqli_connect_errno()) {
        echo "error";
        die();
    }

    $strQry = 'INSERT INTO `ticketsreservation`(`ticketNumber`,`clientName`, `email`, `visa`, `address`, `phone`)
 VALUES (' . $_COOKIE['ticket'] . ',"' . $_POST["firstname"] . ' ' . $_POST["lastname"] . '","' . $_POST["email"] . '",' . $_POST["credit"] . ',"' . $_POST["address"] . '",' . $_POST["phone"] . ')';
    $res1 = $db->query($strQry);
    $db->close();
    header("location: tickets.php");
}
if (isset($_POST["cancel"])) {
    header("location: tickets.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Ticket</title>
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
<div class="custom-shape-divider-top-1608195643">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
              opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
              opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
              class="shape-fill"></path>
    </svg>
</div>
<img src="img/pexels-ithalu-dominguez-907485.jpg" height="657px;" width="100%">
<div class="carousel-caption container" style="margin-left: -90px;color: #1d2124">
    <h4 style="margin-top: -400px;margin-left: 90px;font-family: 'Bell MT';font-size: 40px">Personal Information</h4>
    <br> <br>
    <form action="" method="post">
        <div class="row" style="font-family: 'Bell MT';font-size: 25px">
            <div class="col-md">
                <label>First Name</label>
                <input type="text" name="firstname">
                <label style="margin-left: 20px">Last Name</label>
                <input type="text" name="lastname">
            </div>
        </div>
        <br> <br>
        <div class="row" style="font-family: 'Bell MT';font-size: 25px">
            <div class="col-md">
                <label style="margin-left: -30px">Email Address</label>
                <input type="text" name="email">
                <label style="margin-left: 10px">Credit Card</label>
                <input type="number" name="credit">
            </div>
        </div>
        <br> <br>
        <div class="row" style="font-family: 'Bell MT';font-size: 25px">
            <div class="col-md">
                <label style="margin-left: -30px;">Phone Number</label>
                <input type="number" name="phone">
                <label style="margin-left: 45px">Address</label>
                <input type="text" name="address">
            </div>
        </div>
        <br> <br>
        <input type="submit"
               style="font-family: 'Bell MT';font-size: 25px;width: 200px;border-color: #1d2124;color: #1d2124;background-color: #ffffff;border-radius: 10px;margin-left: 60px"
               name="buy" value="Buy">
        <input type="submit"
               style="font-family: 'Bell MT';font-size: 25px;width: 200px;border-color: #1d2124;color: #1d2124;background-color: #ffffff;border-radius: 10px"
               name="cancel" value="Cancel">
    </form>
</div>
</div>
</body>

</html>