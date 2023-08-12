<title>ratcatcher</title>



<link rel="stylesheet" href="assets/main.css" />

<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>ratcatcher- By Brodie Friesen</title>
<a href="index.php"><b>HOME</b></a><br>

<br>
<body>

<div class="wrap">
    <div class="left top"><span style="color: #fff;">Welcome to ratcatcher! If you have a ratcatcher-supported test kit, enter the 11 digit 
    number below, or scan the QR code or NFC tag.<br><br>
    
    <form action="handle/code.php">
		<input type="text" id="code" name="testcode" placeholder="xxxxx-xx-xx-xx"><br><br>
		<input type="submit" value="Submit">
	</form> 
    
    </span></div>
    <div class="right"><span style="color: #000;">If you don't have a test code, or are using a kit that doesn't come with one, enter your information 
    below, so you can input your test results into our system!<br><br>
    
    <form action="handle/usercreate.php">
		<input type="text" id="email" name="email" placeholder="email"><br><br>
		<input type="text" id="name" name="name" placeholder="name"><br><br>
		<input type="text" id="phone" name="phone" placeholder="phone"><br><br>
		<input type="submit" value="Submit">
	</form> 
	
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
