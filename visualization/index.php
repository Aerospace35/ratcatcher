<?php 

require("../handle/connection.php");
$sql = "SELECT user_id, city, isvaccinated, teststaken FROM users";

?>
<table>
    <thead>
        <tr>
            <th>#ID </th>
            <th> City </th>
            <th> Vaccine status </th>
            <th> teststaken</th>
        </tr>
    </thead>
    <tbody>
   <?php 
    $result = $conn->query($sql); 
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){ 
    ?>
        <tr>
            <td><center><?php echo $row['user_id']; ?></center></td>
            <td><center><?php echo $row['city'].' '.$row['last_name']; ?></center></td>
            <td><center><?php echo $row['isvaccinated']; ?></center></td>
            <td><center><?php echo $row['teststaken']; ?></center></td>
        </tr>
    <?php } }else{ ?>
        <tr><td colspan="7">No records found</td></tr>
    <?php } ?>
    </tbody>
</table>
