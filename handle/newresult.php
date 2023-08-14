<div class="wrap">
<div class="left top">
<?php
include "connection.php";

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$vaxstatus = $_POST["vaxstatus"];
$testresult = $_POST["result"];
$city = $_POST["city"];
$symptoms = $_POST["symptoms"];
$code = $_POST["code"];

$testnumber = substr($code, 1, 2);

$name = filter_var($name, FILTER_SANITIZE_STRING);
$phone = filter_var($phone, FILTER_SANITIZE_NUMBER_FLOAT);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$vaxstatus = filter_var($vaxstatus, FILTER_SANITIZE_NUMBER_FLOAT);
$testresult = filter_var($testresult, FILTER_SANITIZE_NUMBER_FLOAT);
$city = filter_var($city, FILTER_SANITIZE_STRING);
$symptoms = filter_var($symptoms, FILTER_SANITIZE_STRING);

$time = time();
$testserial = "99";
$testserial = $code;
$testid = $code+$time;
$time = time();
$sql = "SELECT user_id FROM users WHERE email='$email';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $data = "present";
        $userid = $row["user_id"];
    }
} else {
    $data = "notpresent";
    $userid = substr(str_shuffle("0123456789"), 0, 16);
}


if($data == "notpresent") {
    $sql="INSERT INTO users (user_id, name, email, phone, isvaccinated, city, teststaken, flagged)
VALUES ('$userid', '$name', '$email', '$phone', '$vaxstatus', '$city', '0', '0');";
$sql.="INSERT INTO tests (test_id, testserial, user_id, city, result, symptoms, recent_travel, where_travel)
VALUES ('$testid', '$testserial', '$userid', '$city', '$testresult', '$symptoms', '0', '0');";
} else {
    $sql="INSERT INTO tests (test_id, testserial, user_id, city, result, symptoms, recent_travel, where_travel)
VALUES ('$testid', '$testserial', '$userid', '$city', '$testresult', '$symptoms', '0', '0');";
}

if ($conn->multi_query($sql) === TRUE) {
  echo "New records created successfully";
  header('Location: ../index.php?thanks=true');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT * FROM tests WHERE user_id='$userid';";
$result = $conn->query($sql);
$rowcount = mysqli_num_rows( $result );
$conn->close();

echo "<br>";
$availabletests = $testnumber - $rowcount;
echo $availabletests;
echo " tests remaining in the box";
?>
</div>
</div>
<link rel="stylesheet" href="../assets/main.css" charset="utf-8" />
