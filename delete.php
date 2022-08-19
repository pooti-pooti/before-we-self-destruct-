<?php
$servername = "localhost";
$username = "";
$password = "";
$database = "";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($servername, $username, $password, $database);
?>
<?php
$query = "DELETE FROM `sent_messages` ";
$queryResult = $conn->query($query);
$conn->close();
echo "<center>The Message Has Been Deleted !</center>";
?>
<script>
    setTimeout(function () {
   window.location.href = "https://whatever-site-you-want-to-go-to-after-deletion.com"; 
}, 3000); 
</script>
