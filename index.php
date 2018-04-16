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
    <script src="js/shakeItBaby.js"></script>
    <!-- Setup for cash me outside javascript fun -->
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
        function updateAnnouncements() {
            $.ajax({
                url: "checkAnnouncements.php", dataType: "text", success: (result) => {
                    alert(result);
                }
            });
        }
        function lookupAnnouncements() {
            $.ajax({
                url: "viewAnnouncements.php", dataType: "json", success: (result) => {
                    console.log(result);
                    var tableHead = jQuery("#announcementTable thead");
                    var tableBody = jQuery("#announcementTable tbody");
                    tableHead.empty();
                    tableBody.empty();
                    var header = "<tr><th>Title</th><th>Body</th></tr>";
                    tableHead.append(header);
                    for(var i = 0; i < result.length; i++) {
                        try {
                            var markup = "<tr><td>"+result[i].title+"</td><td>"+result[i].body+"</td></tr>";
                            tableBody.append(markup);

                        } catch(ex) {
                            console.log("Error with announcement lookup: " + ex);
                        }
                    }
                }
            });
        }
        /* ajax call */
        function lookupUsername() {
            var username = $("#usernameLookup").val();
            $.ajax({
                url: "ajaxReceiver.php", dataType: "json", data: {username: username}, success: (result) => {
                    console.log(result);
                    $("#usernameResponse").html(result[0].username + "/" + result[0].password + "/" + result[0].created_at);
                }
            });
        };
        $(document).ready(() => {
            requestAnimationFrame(cashMeOutsideTextChanger);
            $("#rain").makeItRain();
            $("#yolo").click(() => {
                shakeIt();
            })
        });
    </script>
</head>
<body>
<?php require "headerLinks.php"; ?>
<!-- Formatting for webpage -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm">
            <button id="updateAnnouncements" type="button" class="btn btn-primary" onclick="updateAnnouncements()">
                Update Announcements
            </button>
            <button id="announcementButton" type="button" class="btn btn-primary" onclick="lookupAnnouncements()">
                View Announcements
            </button>
            <table id="announcementTable" class="table table-striped">
                <thead></thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="col-sm">
            <label for="usernameLookup">Ajax username to look up</label>
            <input id="usernameLookup" type="text"/>
            <button id="usernameButton" type="button" class="btn btn-primary" onclick="lookupUsername()">
                Look up username
            </button>
            <p id="usernameResponse"></p>
        </div>
        <div class="col-sm">
            <button id="rain" type="button" class="btn btn-primary">
                Cash me outside
            </button>
            <button id="yolo" type="button" class="btn btn-primary">
                Don't press this
            </button>
        </div>

    </div>
</div>


</body>
</html>
