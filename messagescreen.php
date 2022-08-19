<?php 
echo '<div height="200px"><table>';
while ($queryRow = $queryResult->fetch_row()) {
    echo "<tr>";
    for($i = 0; $i < $queryResult->field_count; $i++){
        echo "<td>$queryRow[$i]</td>";
    }
    echo '<td ><iframe class="ip-list" height="180px" width="380px"src="/list.php#end" name="end"></iframe></td>';
    echo "</tr>";
    
}   
echo "</table></div>";
?>