<?php
		$min_number = 1;
		$max_number = 10;
	
		$random_number1 = mt_rand($min_number, $max_number);
		$random_number2= mt_rand($min_number, $max_number);
?>

	<form action="validateCaptcha.php" method="post">
		Resolve the captcha below:<br/>
		
<?php
	echo $random_number1. "+". $random_number2. "=";
?>

	<input type="text" name="captchaResults" size="3"/>
	
	<input type="hidden" name="firstRandomNumber" value="<?php echo $random_number1;?>"/>
	<input type="hidden" name="secondRandomNumber" value="<?php echo $random_number2;?>"/>
	
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST["firstRandomNumber"]) && !empty($_POST["secondRandomNumber"]) && !empty($_POST["captchaResults"])) {
		$getRandomNumber1 = $_POST["firstRandomNumber"];
		$getRandomNumber2 = $_POST["secondRandomNumber"];
		$getCaptcharesults = $_POST["captchaResults"];
		
		$totalNumber = $getRandomNumber1 + $getRandomNumber2;
			
	if ($totalNumber == $getCaptcharesults) {
		echo "<p><b>Captcha correct.</b></p>";
		}
		
	else {
		echo "<p><b>Captcha incorrect.</b></p>";
		}
	}
?>