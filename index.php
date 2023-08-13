<?php
$thanks = $_GET['thanks'];
if(isset($thanks)) {
	echo "<h1><span style=\"color: #000;background: #fff;\">Please check your email to confirm this test!</span></h1> <br><br>";
}
?>
<title>ratcatcher- By Brodie Friesen</title>



<link rel="stylesheet" href="assets/main.css" />

<meta name="viewport" content="width=device-width, initial-scale=1" />

<a href="index.php"><b>HOME</b></a><br>

<br>
<body>

<div class="wrap">
    <div class="left top"><span style="color: #fff;">Welcome to ratcatcher! If you have a ratcatcher-supported test kit, enter the 11 digit 
    number below, or scan the QR code or NFC tag.<br><br>
    
    <form method="POST" action="handle/code.php">
		<input type="text" id="code" name="code" placeholder="xxxxx-xx-xx-xx"><br><br>
		<input type="submit" value="Submit">
	</form> 
    
    </span></div>
    <div class="right"><span style="color: #000;">If you don't have a test code, or are using a kit that doesn't come with one, enter your information 
    below, so you can input your test results into our system!<br><br>
    
    <form method="post" action="handle/newresult.php">
      <input type="email" id="email" name="email" placeholder="email"><br>
		<input type="text" id="name" name="name" placeholder="name"><br>
		<input type="tel" id="phone" name="phone" placeholder="phone"><br>
		<label for="vaxstatus">Are you vaccinated against COVID-19?</label>
		<select name="vaxstatus" id="vaxstatus">
		<option value="1">Yes</option>
		<option value="0">No</option>
		<option value="0">Prefer not to say</option>
		</select>
		<br><br>
		<label for="result">Result</label>
		<select name="result" id="result">
		<option value="positive">Positive</option>
		<option value="negative">Negative</option>
		</select>
		<br>
		<input type="text" id="city" name="city" placeholder="city"><br>
		<input type="hidden" id="code" name="code" value="<?php echo $code;?>">
		<input type="text" id="symptoms" name="symptoms" placeholder="symptoms"><br>
		<input type="submit" value="Submit">
      </form>
	</form> 
	
	If you have already used this site, just input your information and we'll send you an email to verify your identity.
	</span></div>
    <div class="left bot"><span style="color: #000;">The data from ratcatcher is open source, with redacted location and personal information data. 
    Below, you can find buttons to access the data sources. You can visualize it in our system, or download it to use in your own analysis programs. 
    Please read the data usage policy, while you're at it.<br><br>
    
     <button onclick="window.location.href='visualizer';">
      Data Visualizer
    </button>
     <button onclick="window.location.href='visualizer/raw';">
      Raw Data
    </button>
     <button onclick="window.location.href='agreements/datausage.html';">
      Data Usage Agreement
    </button>
    </span></div>
</div>
