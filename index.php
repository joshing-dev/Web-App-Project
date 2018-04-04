<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <title>Joke Emporium</title>
    <link rel="stylesheet" type="text/css" href="css/makeItRain.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="js/makeItRain.js"></script>

    <script>
        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        function random_rgb() {
            colors = ['8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
            r = colors[Math.floor(Math.random() * 8)];
            g = colors[Math.floor(Math.random() * 8)];
            b = colors[Math.floor(Math.random() * 8)];
            return '#' + r + g + b;
        }

        function cashMeOutsideTextChanger() {
            $("#rain").each(function () {
                this.style.color = random_rgb();
            });
            sleep(500).then(() => {
                requestAnimationFrame(cashMeOutsideTextChanger);
            });
        }

        $(document).ready(() => {
            requestAnimationFrame(cashMeOutsideTextChanger);
            $("#rain").makeItRain();
        });
    </script>
</head>
<body>
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" href="#">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
    </li>
</ul>

<button id="rain" type="button" class="btn btn-primary">
    Cash me outside
</button>


</body>
</html>
