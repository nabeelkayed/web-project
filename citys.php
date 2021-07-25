<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
<style>
body{
    padding:0px
}
</style>
    <script>
        function visibility() {
                document.getElementById('nn').style.visibility ="visible";
        }
        function Invisibility() {
            document.getElementById('nn').style.visibility ="hidden";
        }
    </script>
</head>
<body>
<img src="img/pexels-nick-bondarev-5015413.jpg" height="700px" width="1350px" alt="sport" id="nn">
<button onclick="visibility()">visibility</button>
<button onclick="Invisibility()">Invisibility</button>
</body>
</html>
<!--<div class="container">
 background-image: url('img/pexels-nick-bondarev-5015413.jpg')
    <div class="gallery-container w-6 h-3">
        <div class="gallery-item">
            <div class = "image"> <img src="img/pexels-nick-bondarev-5015413.jpg" alt="sport"> </div>

        </div>
    </div>
</div>-->