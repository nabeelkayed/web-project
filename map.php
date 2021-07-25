<?php

@$db = new mysqli(localhost, root, "", project);
if (mysqli_connect_errno()) {
    echo "error";
    die();
}
if (isset($_POST["name"])) {
    $strQry = 'INSERT INTO `rate`(`placeName`, `name`, `email`, `description`, `rate`)
 VALUES ("'.$_COOKIE['place'].'","' . $_POST["name"] . '","' . $_POST["email"] . '","' . $_POST["comment"] . '",' . $_POST["rate"] . ')';
    $res = $db->query($strQry);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VOYAGE</title>
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
    <script>
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    </script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
        $(function () {

            $('form').on('submit', function (e) {

                e.preventDefault();

                $.ajax({
                    type: 'post',
                    url: 'map.php',
                    data: $('form').serialize(),
                    success: function () {
                        alert('Your rate was submitted');
                    }
                });

            });

        });
    </script>
</head>
<style>
    .custom-shape-divider-bottom-1608255904 {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        transform: rotate(180deg);
    }

    .custom-shape-divider-bottom-1608255904 svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 150px;
    }

    .custom-shape-divider-bottom-1608255904 .shape-fill {
        fill: #FFFFFF;
    }
</style>
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
<div id="slides" class="carousel " data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
         <li data-target="#slides" data-slide-to="2"></li>
         <!--<li data-target="#slides" data-slide-to="3"></li>-->
    </ul>
    <div class="carousel-inner">
        <?php

        @$db = new mysqli(localhost, root, "", project);
        if (mysqli_connect_errno()) {
            echo "error";
            die();
        }
        $a = "";
        $a1 = "";
        // echo $_POST["place"];
        $strQry = 'select * from images where name= "' . $_COOKIE['place']. '"';
        // $strQry = 'select * from images where name= "Tour Eiffel"';
        $res = $db->query($strQry);
        for ($i = 0; $i < $res->num_rows; $i++) {
            $row = $res->fetch_array();
            if ($i == 0) {
                $a = "active";
                $a1 = 'class=\"active\"';
            } else {
                $a = "";
                $a1 = "";
            }
            echo '  <div class="carousel-item ' . $a . '">
            <img src="' . $row[1] . '" style="width: 100%; height: 656px" ' . $a1 . ' >
            <div class="carousel-caption text-left "><h1 class="display-4" style="margin-top: -400px;color: #1d2124 ; background-color: #FFFFFF ; width: 400px" >The ' . $_COOKIE['place'] . '</h1>
            </div>
        </div>';
        }
        ?>

    </div>
</div>
<br><br>
<hr>
<?php
@$db = new mysqli(localhost, root, "", project);
if (mysqli_connect_errno()) {
    echo "error";
    die();
}
$strQry = 'select * from descriptions where name= "' . $_COOKIE['place'] . '"';
$res = $db->query($strQry);
for ($i = 0; $i < $res->num_rows; $i++) {
    $row = $res->fetch_array();
    echo '<h3>The ' . $_COOKIE['place'] . ' </h3>
<div style="font-family: Andalus ; font-size: 15pt" >' . $row[1] . '
</div>';
}
$db->close();
?>

<br>
<br><br>
<section style="background-color: #24a9c4">

    <div class="container-fluid" style="width: 100%">
        <div class="row">
            <div class="col-sm-12">
                <div id="inam" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        @$db = new mysqli(localhost, root, "", project);
                        if (mysqli_connect_errno()) {
                            echo "error";
                            die();
                        }
                        $a = "";
                        $a1 = "";
                        $count = 0;
                        $strQry = 'select * from rate where placeName= "' . $_COOKIE['place'] . '"';
                        $res = $db->query($strQry);
                        for ($i = 0; $i < $res->num_rows; $i++) {
                            $row = $res->fetch_array();
                            if ($i == 0) {
                                $a = "active";
                            } else {
                                $a = "";
                            }
                            if ($i % 3 == 0) {
                                echo '<div class="carousel-item ' . $a . '">
                            <div class="container">
                                <div class="row"> ';
                            }
                            echo '<div class="col-sm-12 col-lg-4">
                                        <div class="card" style="width: 300px;margin: auto;">
                                            <img src="img/boy.jpg" class="card-img-top">
                                            <div class="card-body">
                                                <p class="card-text">' . $row[3] . '</p><p>
                                                 ';
                            for ($j = 0; $j < $row[4]; $j++)
                                echo "<i class='fa fa-star'></i>";
                            echo '</p>
                                            </div>
                                        </div>
                                    </div>';
                            if (($i + 1) % 3 == 0 or ($i + 1) == $res->num_rows) {
                                echo '</div>
                            </div>
                        </div> ';
                            }
                        }
                        ?>
                    </div>
                    <a href="#inam" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a href="#inam" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br><br>
<div style="width: 100%">
    <?php
    @$db = new mysqli(localhost, root, "", project);
    if (mysqli_connect_errno()) {
        echo "error";
        die();
    }
    $strQry = 'select * from descriptions where name= "' . $_COOKIE['place'] . '"';
    $res = $db->query($strQry);
    for ($i = 0; $i < $res->num_rows; $i++) {
        $row = $res->fetch_array();
        echo '<iframe src=' . $row[2] . ' width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

';
    }
    $db->close();
    ?>
</div>
<br><br>
<section class="contact">
    <div class="contact-title ">
        <br> <br> <br>
        <h1 style="margin-left: -30px">Add Your Comment</h1>
        <h3>We Are Always Ready To Serve You</h3>
    </div>

    <div class="contact-form" style="margin-left: 300px">
        <form id="contact-form">
            <input name="name" type="text" class="form-control" placeholder="Your Name" required>
            <br>
            <input name="email" type="email" class="form-control" placeholder="Your Email" required>
            <br>
            <textarea name="comment" class="form-control" placeholder="Your Comment" rows="4" required></textarea>
            <br>
            <label style="font-size: 20px;color: white;margin-left: -20px"> How Many Star</label>
            <br>
            <input type="number" name="rate" class="form-control" value="1" max="5" min="1" required>
            <br>
            <input type="submit" name="submit" value="Add"
                   style="border-color: white;color: white;background-color:black;border-radius: 10px;font-size: 20px;width: 100px">
            <br><br><br> <br>
        </form>

    </div>
</section>
</body>
</html>