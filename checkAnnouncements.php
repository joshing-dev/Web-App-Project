<?php
$clientURL = "http://bb.dataii.com:8080";

require_once('classes/Rest.class.php');
require_once('classes/Token.class.php');
require_once('config.php');

$rest = new Rest($clientURL);
$token = new Token();

$token = $rest->authorize();
$access_token = $token->access_token;
$columns = $rest->readAnnouncements($access_token);
$c = $columns->results;
//print_r($c);
$requestOkay = true;
// Check for new announcements and add them to the database.
foreach ($c as $row) {
    $id = mysqli_real_escape_string($link, $row->id);
    $title = mysqli_real_escape_string($link, $row->title);
    $body = mysqli_real_escape_string($link, $row->body);
    $insert = "insert IGNORE into announcements(id, title, body) values ('{$id}', '{$title}', '{$body}') ";
    if(!mysqli_query($link,$insert)) {
        $requestOkay = false;
        echo("Error description: " . mysqli_error($link));
    }
}
if($requestOkay) {
    echo "Updated announcements";
}

?>

