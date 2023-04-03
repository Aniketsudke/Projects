<?php

$url = "https://www.google.com/search?q=whatsapp&rlz=1C1CHWL_enIN1028IN1028&oq=whatsapp&aqs=chrome..69i57j0i67i131i433i650j0i131i433i512l5j0i512j0i131i433i512.2975j0j15&sourceid=chrome&ie=UTF-8";

$CI = curl_init();

curl_setopt($CI, CURLOPT_URL, $url);
curl_setopt($CI, CURLOPT_RETURNTRANSFER, true);

$info = curl_exec($CI);

curl_close($CI);

preg_match('/<title>([^<]*)<\/title>/', $info, $matches);
$title = isset($matches[1]) ? $matches[1] : null;

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `url_title` ( `url`, `title`, `tstamp`) VALUES ( '$url', '$title', current_timestamp())";

if (mysqli_query($conn, $sql)) {
    echo "Record inserted Title and URL successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
