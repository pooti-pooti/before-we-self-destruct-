<?php
header('Content-Type: php; charset=utf-8');
$servername = "localhost";
// Should be echoed together with the config using the installation bash script
$username = "debian-sys-maint";
$password = "CwnS4PxQ8fMXwSWw";
$dbname = "tomesswith";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->query('set character_set_client=utf8');
$conn->query('set character_set_connection=utf8');
$conn->query('set character_set_results=utf8');
$conn->query('set character_set_server=utf8');
mysqli_set_charset ($conn, 'UTF-8');


header('Content-Type: text/html; charset=utf-8');
ini_set("default_charset", "UTF-8");
iconv_set_encoding("internal_encoding", "UTF-8");
iconv_set_encoding("output_encoding", "UTF-8");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
function getUserIP()
{
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
$ipaddress = getUserIP();
$sql = "INSERT INTO `ip-message` (`ip address`, `ip address2`, `ip address3`, `ip address4`) VALUES (?, 'is', 'the', 'ip')";
$stmt= $conn->prepare($sql);
$stmt->bind_param("s", $ipaddress);
$stmt->execute();
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
}

// NO HTML ABOVE

$query = "SELECT * FROM `sent_messages` ";
mysqli_set_charset ($query, 'UTF-8');

$queryResult = $conn->query($query);
echo '
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    p {
        font-family: ubuntu;
    }
    </style>
</head>
<body>';
echo '<div class="messageScreen">';

include 'messagescreen.php';

echo "</table>";

echo "</div>";

echo '<div class="cPanel">';

include 'cpanel.html';

echo "</div>";

echo '<div class="messageBox">';

include 'message.php';

echo "</div>";

// require __DIR__ . '/options.php';

echo '</body></html>';

$conn->close();

?>

<style>
<?php include 'style.css'; ?>
</style>

<script>
<?php include 'mainscript.js'; ?>
</script>
