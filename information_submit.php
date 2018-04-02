<?php
if(!empty($_POST[email]) && !empty($_POST[password])) {
    $l = mysqli_connect("34.224.83.184", "student3", "phppass3", "student3");
    $query = "insert into final_users values ('$_POST[email]', '$_POST[password]')";

    $r = mysqli_query($l, $query);
    print_r($r);
}

echo "An email and password were required fool";
