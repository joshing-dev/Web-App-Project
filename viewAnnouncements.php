<?PHP
/* Provides result to the announcements ajax call */
require_once  "config.php";

$query = "select * from announcements";
$results = array();
$r = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($r)) {
    $results[] = array(
        'title' => $row['title'],
        'body' => $row['body']
    );
}

echo json_encode($results);
?>