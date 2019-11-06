<?php
require_once(__DIR__.'/query_runner.php');
session_start();
$query_runner = new QueryRunner();

$nameError = "";
$emailError = "";
$surnameError = "";
$messageError = "";
	$name = "";
	$surname = "";
	$phonenumber = "";
	$email = "";
	$message = "";
	if(!empty($_POST['submit']))
	{
		if(empty($_POST["name"]))
		{
			$nameError = "Name is required";
		}
		if(empty($_POST["surname"]))
		{
			$surnameError = "Surname is required";
		}
		if(empty($_POST["email"]))
		{
			$emailError = "Email is required";
		}
		if(empty($_POST["message"]))
		{
			$messageError = "Message is required";
		}

				if(isset($_POST['name']))
	{
		$name = "Name: {$_POST['name']}\n";
		$_SESSION["name"] = $_POST["name"];
	}
	if(isset($_POST['surname']))
	{
		$surname = "Surname: {$_POST['surname']}\n";
		$_SESSION["surname"] = $_POST["surname"];
		
	}
	if(isset($_POST['email']))
	{
		$email = "Email: {$_POST['email']}\n";
		$_SESSION["email"] = $_POST["email"];
	}
	if(isset($_POST['phonenumber']))
	{
		$phonenumber = "Phonenumber: {$_POST['phonenumber']}\n";
		$_SESSION["phonenumber"] = $_POST["phonenumber"];
	}
	if(isset($_POST['message']))
	{
		$message = "Message: {$_POST['message']}\n";
		$_SESSION["message"] = $_POST["message"];
	}


	$result = $name.$surname.$email.$phonenumber.$message;
	echo nl2br($result, false);
	// print_r($_SESSION);
	echo "<hr>";

	
	
	

   
    

    $register_result = $query_runner->register();
    if($register_result)
    {
        $_SESSION["register_success"] = "You have successfully registered";
    
	}
	
	

    if(isset($_POST['email'])) { 
			$to =  "florimsejdiu@gmail.com";
            $subject = $email. "has sent you a message";
			$message = $message;  
			$contactInfo = $name. '" "'.$surname.  '" "' .$phonenumber; 
			$headers = 'From: webmaster@example.com' . "\r\n" .
    		'Reply-To: webmaster@example.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();      
			
			
			mail($to,$subject,$message,$contactInfo,$headers);
			echo 'Email sent to: ' . $to. ' from '.$email.'<br>';
		}

	session_unset();
	session_destroy();

			}	

?>





<h2>Contact Form</h2>
<form method="POST" action="contactForm.php">
  Name: <input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>">
  <span><?php if(isset($nameError)){echo $nameError;}?></span>
  <br><br>
  Surname: <input type="text" name="surname" value="<?php if(isset($_POST['surname'])) echo $_POST['surname'];?>">
  <span><?php if(isset($surnameError)){echo $surnameError;}?></span>
  <br><br>
  E-mail: <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
  <span><?php if(isset($emailError)){echo $emailError;}?></span>
  <br><br>
  Phonenumber: <input type="number" name="phonenumber" value="<?php if(isset($_POST['phonenumber'])) echo $_POST['phonenumber'];?>">
  <br><br>
  Message: <textarea name="message" rows="5" cols="40"><?php if(isset($_POST['message'])) echo $_POST['message'];?></textarea>
  <span><?php if(isset($messageError)){echo $messageError;}?></span>
  <br><br>
  
  <input type="submit" name="submit" value="Submit">
</form>



