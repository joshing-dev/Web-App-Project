<?PHP
session_start();
require('captcha.php');

$username = $_POST['username'];
$password = $_POST['password'];


if ($username == "admin" && $password == "welcome" && $allowLogin) {
    $_SESSION['auth'] = $username;
} else {
    $_SESSION['auth'] = "";
}
if(empty($_SESSION['auth'])) {
    echo "Wrong credentials. You are not logged in.";
} else {
    echo "You are logged in! Welcome $username";
}
?>