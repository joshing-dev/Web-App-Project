<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
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
    <title>Meme Emporium</title>
    <link rel="stylesheet" type="text/css" href="css/makeItRain.css">

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
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

        function ajaxClick() {
            var username = $("#ajaxInput").val();
            $.ajax({
                url: "ajaxReceiver.php", dataType: "json", data: {username: username}, success: (result) => {
                    console.log(result);
                    $("#response").html(result[0].username + "/" + result[0].password + "/" + result[0].created_at);
                }
            });
        };
        $(document).ready(() => {
            requestAnimationFrame(cashMeOutsideTextChanger);
            $("#rain").makeItRain();
        });
    </script>
    <style type="text/css">
        #rain {
            position: absolute;
            bottom: 0;
            right: 0;
        }
    </style>
</head>
<body>
<?php require "headerLinks.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <label for="ajaxInput">Ajax username to look up</label>
            <input id="ajaxInput" type="text"/>
            <button id="ajax" type="button" class="btn btn-primary" onclick="ajaxClick()">
                Ajax test
            </button>
            <p id="response"></p>
        </div>
        <div class="col-sm">
        </div>
        <button id="rain" type="button" class="btn btn-primary">
            Cash me outside
        </button>
    </div>
</div>


</body>
</html>
