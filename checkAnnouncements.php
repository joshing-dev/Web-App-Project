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
</head>
<body>
<?php require "headerLinks.php"; ?>
<?php
$announcement_id = $_GET['announcement_id'];
$clientURL = "http://bb.dataii.com:8080";

require_once('classes/Rest.class.php');
require_once('classes/Token.class.php');

$rest = new Rest($clientURL);
$token = new Token();

$token = $rest->authorize();
$access_token = $token->access_token;
$columns = $rest->readAnnouncements($access_token, $announcement_id);
$c = $columns->results;
//print_r($columns);

foreach ($c as $row) {
    //if ($row->externalGrade == 1)
    if ($row->name == "Total") {
        $finalGradeName = $row->name;
        $finalGradeID = $row->id;
        $finalPossible = $row->score->possible;
        break;
    }
}


$grades = $rest->readGradebookGrades($access_token, $course_id, $finalGradeID);

$g = $grades->results; ?>
<ul class="list-group">
    <?php
    foreach ($c as $row) {
        $user = $rest->readUser($access_token, $row->userId);
        if (empty($row->score)) { ?>
            <li class="list-group-item"><?php echo $user->name->given . " " . $user->name->family . " has 0 out of " . $finalPossible . " points."; ?></li>
            <?php
        } else { ?>
            <li class="list-group-item"><?php echo $user->name->given . " " . $user->name->family . " has " . $row->score . " out of " . $finalPossible . " points." . "</p>"; ?></li>
        <?php
        }

    } ?>
</ul>
</body>
</html>

