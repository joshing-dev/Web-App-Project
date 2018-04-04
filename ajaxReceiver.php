<?php
require_once  "config.php";
$query = "select * from login_information where username LIKE '$_GET[username]'";
$results = array();
$r = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($r)) {
    $results[] = array(
        'username' => $row['username'],
        'password' => $row['password'],
        'created_at' => $row['created_at']
    );
}

echo json_encode($results);