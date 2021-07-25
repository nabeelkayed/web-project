<?php
if (isset($_POST["place3"])) {
    setcookie("place3", $_POST["place3"]);
    $_COOKIE["place3"] = $_POST["place3"];
}
elseif (isset($_POST['place'])) {
    setcookie("place", $_POST["place"]);
    $_COOKIE["place"] =$_POST["place"];
}


