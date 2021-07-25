<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Places.css" media="all">
    <title>VOYAGE</title>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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

    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>

    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>


    <script>
        $(document).ready(function () {
            $('.nabeel').click(function () {
               dataid = $(this).attr('id');
                $.ajax({
                    url: 'map1.php',
                    type: 'POST',
                    data: { place : dataid }
                });
            });
        });
    </script>
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
                <li class="nav-item"><a class="nav-link" href="main.html.#ticket" style="font-family: Monospaced;font-size: 20px">Tickets</a>
                </li>
                <li class="nav-item active"><a class="nav-link" href="main.html.#tours" style="font-family: Monospaced;font-size: 20px">Tours</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="main.html.#about-us"
                                        style="font-family: Monospaced;font-size: 20px">About us</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <?php
    @$db = new mysqli(localhost, root, "", project);
    if (mysqli_connect_errno()) {
        echo "error";
        die();
    }
    $strQry = 'select * from cites';
    $res = $db->query($strQry);
    for ($i = 0; $i < $res->num_rows; $i++) {
        $row = $res->fetch_array();
        if ($_COOKIE["place3"] == $row[0]) {
            echo '  <div class="gallery-container w-2 h-3">
        <div class="gallery-item">
            <a href="map.php"> <div class = "image"> <img src="' . $row[2] . '" alt="sport" id ="' . $row[1] . '" class="nabeel"> </div></a>
             <div class="text">' . $row[1] . '</div>
        </div>
               </div>';
        }
    }
    $db->close();
    ?>
</div>
</body>
</html>