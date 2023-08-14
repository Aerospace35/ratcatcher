<div class="wrap">
<div class="left top">
<?php
include("connection.php");

$code = $_POST['code'];
echo "<h3>Test Kit Information</h3>";
if(isset($code)) {
} else {
	$code = $_GET['code'];
}

$code = filter_var($code, FILTER_SANITIZE_NUMBER_INT);


$serialnumber = substr($code, 0, 5);
$testnumber = substr($code, 5, 2);
$testtype = substr($code, 7, 2);
$valid = substr($code, 9, 2);

$code = ltrim($code, "0");

function interpretresult($dataresult) {
	if ($dataresult == "1") {
		return "Positive";
	} else {
		return "Negative";
	}
}

$sql = "SELECT testresult, user_id, timeofreport FROM tests WHERE testserial='$code'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "User ID: " . $row["user_id"]. " - Date: " . date('m/d/Y H:i:s', $row["timeofreport"]). " - Result: " . interpretresult($row["testresult"]). "<br>";
  }
} else {
  echo "no previous records for this test kit";
}
//The following query returns how many times this test ID has been used
$sql = "SELECT * from tests WHERE testserial='$code'";

$result = $conn->query($sql);

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    
$conn->close();

echo "<br>";
$availabletests = $testnumber-$rowcount;
echo $availabletests;
echo " tests remaining in the box ";
?>


<?php
if($rowcount >= $testnumber) {
	echo "<button class=\"modal-button\" type=\"button\">All tests have been used</button>
";
} else {
	echo "<button class=\"modal-button\" href=\"#statusmodal\" type=\"button\">Report Test Result</button>
";
}
?>
</div>
</div>
<link rel="stylesheet" href="../assets/main.css" charset="utf-8" />


<div id="statusmodal" class="modal">

  <div class="modal-content">
    <div class="modal-header">
      <span class="close">×</span>
      <h2>Report Test Result</h2>
    </div>
    <div class="modal-body">
      
      <form method="post" action="newresult.php">
      <input type="email" id="email" name="email" placeholder="email"><br><br>
		<input type="text" id="name" name="name" placeholder="name"><br><br>
		<input type="tel" id="phone" name="phone" placeholder="phone"><br><br>
		<label for="vaxstatus">Are you vaccinated?</label><br>
		<select name="vaxstatus" id="vaxstatus">
		<option value="1">Yes</option>
		<option value="0">No</option>
		<option value="0">Prefer not to say</option>
		</select>
		<br> <br>
		<label for="testresult">Result</label><br>
		<select name="testresult" id="testresult">
		<option value="1">Positive</option>
		<option value="0">Negative</option>
		</select>
		<br> <br>
		<input type="text" id="city" name="city" placeholder="city"><br><br>
		<input type="hidden" id="code" name="code" value="<?php echo $code;?>">
		<input type="text" id="symptoms" name="symptoms" placeholder="symptoms"><br><br>
		<input type="submit" value="Submit">
      </form>
      
    </div>
    <div class="modal-footer">
      <h3>You will be emailed a link to confirm a test result.</h3>
    </div>
  </div>
<div class="left top">
</div>


<script>
// Get the button that opens the modal
var btn = document.querySelectorAll("button.modal-button");

// All page modals
var modals = document.querySelectorAll('.modal');

// Get the <span> element that closes the modal
var spans = document.getElementsByClassName("close");

// When the user clicks the button, open the modal
for (var i = 0; i < btn.length; i++) {
 btn[i].onclick = function(e) {
    e.preventDefault();
    modal = document.querySelector(e.target.getAttribute("href"));
    modal.style.display = "block";
 }
}

// When the user clicks on <span> (x), close the modal
for (var i = 0; i < spans.length; i++) {
 spans[i].onclick = function() {
    for (var index in modals) {
      if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
    }
 }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
     for (var index in modals) {
      if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
     }
    }
}


</script>
