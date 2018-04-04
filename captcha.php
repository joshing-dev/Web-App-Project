<?PHP

$allowLogin = false;
$response = $_POST["g-recaptcha-response"];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
    'secret' => '6LfeGUQUAAAAAP6q72gcu8Gy-I9Ii5F2OII5rfdm',
    'response' => $_POST["g-recaptcha-response"]
);
$secret = '6LfeGUQUAAAAAP6q72gcu8Gy-I9Ii5F2OII5rfdm';
$options = array(
    'http' => array(
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);
$context = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
//echo 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response'];
//echo "<br>";
//error_log(print_r($verify, TRUE));
$captcha_success = json_decode($verify);
if ($captcha_success->success == false) {
    $allowLogin = false;
} else if ($captcha_success->success == true) {
    $allowLogin = true;
}
?>