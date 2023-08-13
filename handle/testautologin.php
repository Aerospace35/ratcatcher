<?php
include("connection.php");
$email="brodiefriesen77@outlook.com";
$sql = "SELECT user_id FROM users WHERE email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  $data="present";
  echo $row["user_id"];
  }
} else {
  $data="notpresent";
  echo $data;
}
