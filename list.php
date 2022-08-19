<?php 
header('Content-Type: php; charset=utf-8');
$servername = "localhost";
// Should be echoed together with the config using the installation bash script
$username = "debian-sys-maint";
$password = "CwnS4PxQ8fMXwSWw";
$dbname = "tomesswith";
$conn = new mysqli($servername, $username, $password, $dbname);

mysqli_set_charset ($conn, 'UTF-8');
$query = "SELECT * FROM `ip-message` ";
$queryResult = $conn->query($query);
echo '<div height="200px"><table>';
while ($queryRow = $queryResult->fetch_row()) {
    echo "<tr>";
    for($i = 0; $i < $queryResult->field_count; $i++){
        echo "<td>$queryRow[$i]</td>";
    }
    echo "</tr>";
}   
echo "</table></div>";
echo '<a href="/list.php#end" name="end">Refresh</a>';

?>
