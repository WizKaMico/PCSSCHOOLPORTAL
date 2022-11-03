<?php
if(!empty($_GET['email'])){
$email = $_GET['email']; 
$subject = $_GET['subject'];
$body = 'MICO';
}else{
$email = 'undef'; 
$subject = 'undef';
$body = 'MICO'; 	
} 
include('libs/phpqrcode/qrlib.php'); 

function getUsernameFromEmail($email) {
	$find = '@';
	$pos = strpos($email, $find);
	$username = substr($email, 0, $pos);
	return $username;
}

if(isset($_POST['submit']) ) {
	$tempDir = 'temp/'; 
	$email = $_POST['mail'];
	$subject =  $_POST['subject'];
	$filename = getUsernameFromEmail($email);
	$body =  $_POST['msg'];

	$codeContents = 'localhost/GNHS/PAGES/STUDENT/index.php?email='.$email.'&stud_lrn='.urlencode($subject).'&body='.urlencode($body); 
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
}
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="libs/css/bootstrap.min.css">
	<link rel="stylesheet" href="libs/style.css">
	</head>
	<body>
		
		<div class="myoutput">
			<div class="input-field">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
					<div class="form-group">
						<input type="hidden" class="form-control" name="mail" style="width:20em;" placeholder="Enter your Email" value="<?php echo $email; ?>" required />
					</div>
					<div class="form-group">
						<input type="hidden" class="form-control" name="subject" style="width:20em;" placeholder="Enter your Email Subject" value="<?php echo $subject; ?>" required pattern="[a-zA-Z .]+" />
					</div>
					<div class="form-group">
						<input type="hidden" class="form-control" name="msg" style="width:20em;" value="<?php echo $body; ?>" required pattern="[a-zA-Z0-9 .]+" placeholder="Enter your message"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="GENERATE QR CODE" class="btn btn-primary submitBtn" style="margin-top:100px; width:20em; margin:0;" />
					</div>
				</form>
			</div>
			<?php
			if(!isset($filename)){
				$filename = "author";
			}
			?>
			<div class="qr-field">
				<h3>QR Code Result: </h3>
				<center>
					<div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
							<?php echo '<img src="temp/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
					</div>
					<a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
				</center>
			</div>
			
		</div>
	</body>
</html>