<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
//require 'vendor/autoload.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';


if (isset($_POST['g-recaptcha-response'])) {
	$captcha = $_POST['g-recaptcha-response'];
}
if (!$captcha) {
	echo '<h2>Please check the the captcha form.</h2>';
	exit;
}
$secretKey = "6LfNjmUaAAAAAGdcezGGZtJGeFrBxmfCdgRo58tg";
$ip = $_SERVER['REMOTE_ADDR'];
// post request to server
$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
$response = file_get_contents($url);
$responseKeys = json_decode($response, true);
// should return JSON with success as true
if ($responseKeys["success"]) {
	//echo '<h2>Thanks for posting comment</h2>';



	// Check for empty required field
	if (!isset($_POST["email"]) || !isset($_POST["fname"])) {
		returnAndExitAjaxResponse(
			constructAjaxResponseArray(
				FALSE,
				'MISSING_REQUIRED_FIELDS',
				array('error_message' => 'MISSING_REQUIRED_FIELDS should not be occurred.')
			)
		);
	}



	$tonse_email = "tonsetechnologies@gmail.com";
	// Sanitize input
	$q1 = "Would you like to take this questionnaire?";
	$response	= filter_var($_POST["response"], FILTER_SANITIZE_STRING);
	$q2 = "How big is your team?";
	$teamsize	= filter_var($_POST["teamsize"], FILTER_SANITIZE_STRING);
	$q3 = "What is the stage of your business?";
	$stage	= filter_var($_POST["stage"], FILTER_SANITIZE_STRING);
	$q4 = "What is your average deal size per client or project?";
	$avgdeal	= filter_var($_POST["avgdeal"], FILTER_SANITIZE_STRING);
	$q5 = "What is your annual revenue?";
	$annualrev	= filter_var($_POST["annualrev"], FILTER_SANITIZE_STRING);
	$q6 = "How are you currently managing your IT, CRM and Software/Innovation development?";
	$manage	= filter_var($_POST["manage"], FILTER_SANITIZE_STRING);


	$q7 = "What is your work arrangement for the next 3 - 6 months?";
	$arrangement36	= filter_var($_POST["arrangement36"], FILTER_SANITIZE_STRING);
	$q8 = "What is your revenue goal for the next 6 months?";
	$revgoal	= filter_var($_POST["revgoal"], FILTER_SANITIZE_STRING);
	$q9 = "How long is your project closing cycle?";
	$projcycle	= filter_var($_POST["projcycle"], FILTER_SANITIZE_STRING);
	$q10 = "How urgent is your problem?";
	$urgency	= filter_var($_POST["urgency"], FILTER_SANITIZE_STRING);
	$q11 = "How soon can we get started?";
	$start	= filter_var($_POST["start"], FILTER_SANITIZE_STRING);
	$q12 = "What is the name of your business?";
	$businessname	= filter_var($_POST["businessname"], FILTER_SANITIZE_STRING);

	$q13 = "In a quick sentence, let us know what piqued your interest in Tonse Technologies?
		Why did you decide to check out our prices and know more about our solutions?
		Where did you find out about Tonse Technologies and have you spoken to anyone in our team?";
	$QuickInfo	= filter_var($_POST["QuickInfo"], FILTER_SANITIZE_STRING);
	$q14 = "What is your title in your business?";
	$yourtitle	= filter_var($_POST["yourtitle"], FILTER_SANITIZE_STRING);
	$q15 = "What is your first name?";
	$fname	= strtoupper(filter_var($_POST["fname"], FILTER_SANITIZE_STRING));
	$q16 = "What is your last name?";
	$lname	= strtoupper(filter_var($_POST["lname"], FILTER_SANITIZE_STRING));
	$q17 = "What is your email id for sending you more details (work email id if possible)?";
	$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
	$q18 = "What is your phone number? Please fill in your country code too. (We will not spam you. This is
for record purpose.)";
	$countrycode = filter_var($_POST["countrycode"], FILTER_SANITIZE_STRING);
	$phone	= filter_var($_POST["phone"], FILTER_SANITIZE_STRING);

	$q19 = "Where did you find us?";
	$finding	= filter_var($_POST["finding"], FILTER_SANITIZE_STRING);
	$q20 = "In your honest opinion what is preventing you from hitting your revenue goal?";
	$opinion	= filter_var($_POST["opinion"], FILTER_SANITIZE_STRING);
	$q21 = "Last question... if we can get you to your revenue goal, are you willing to invest?
		This is to make the best use of your time on the call*";
	$lastq	= filter_var($_POST["lastq"], FILTER_SANITIZE_STRING);




	// $website = $_POST["website"];
	// if (!preg_match("~^(?:f|ht)tps?://~i", $website)) $website = "http://" . $website;
	// $website = filter_var($website, FILTER_VALIDATE_URL);

	// $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

	// If non required fields are empty
	if (empty($lname)) {
		$lname = "No last name entered.";
	}
	if (empty($email)) {
		$email = "No email entered.";
	}



	// $_fname = (empty($_POST['fname'])) ? 'No name specified' : $_POST['fname'];
	// $email = $_POST['email'];

	$Tos = array(
		$tonse_email	// "Faheem" => "faheempmh@gmail.com",
		// "nandan" => "nandan.aryan88@gmail.com"
		//	"sharath" => "sharathkumarv183@gmail.com"
	);
	$Ccs = array(
		"Faheem" => "faheempmh@gmail.com",
		"nandan" => "nandan.aryan88@gmail.com"
		// 	"CustomerCare Mothercell" => "customercare@mothercell.com",
		//  //   "Sharu" => "sharu.v.1502@gmail.com",
		// 	"Sunrise Design" => "contact.sunrisedesign@gmail.com"
	);


	// print_r($msg);
	// exit();
	// Instantiation and passing `true` enables exceptions

	$mail = new PHPMailer(true);
	//try {
	//Server settings
	// $mail->SMTPDebug = 2;                     


	//server setting start
	//    $mail->isSMTP();                                           
	//    $mail->Host       = 'mail.tonse.co';                       
	//    $mail->SMTPAuth   = true;                                    
	//    $mail->Username   = 'hello@tonse.co';//'hello@tonse.co';                     // SMTP username
	//    $mail->Password   = '%I;B.!wVB}F7';//'%I;B.!wVB}F7';                               // SMTP password
	//    $mail->SMTPSecure = 'tls';         
	//    $mail->Port       = 587;   
	// 							  // SMTP password
	//  $mail->SMTPOptions = array(
	// 	 'ssl' => array(
	// 		 'verify_peer' => false,
	// 		 'verify_peer_name' => false,
	// 		 'allow_self_signed' => true
	// 	 )
	//  );

	//server setting end


	//server setting start
	$mail->isSMTP();
	$mail->Host       = 'mail.tonse.co';
	$mail->SMTPAuth   = true;
	$mail->Username   = 'hello@tonse.co'; //'hello@tonse.co';                     // SMTP username
	$mail->Password   = '%I;B.!wVB}F7'; //'%I;B.!wVB}F7';                               // SMTP password
	$mail->SMTPSecure = 'tls';
	$mail->Port       = 587;
	$mail->SMTPDebug = 0;
	// SMTP password
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);

	//server setting end


	//$mail->IsHTML(true);								  

	//Recipients
	$mail->setFrom("hello@tonse.co", "TTech");
	// $mail->addAddress('info@mothercell.com', 'Info Mothercell');     // Add a recipient
	// $mail->addAddress('sharathkumarv183@gmail.com');               // Name is optional
	$mail->addReplyTo("hello@tonse.co", "TTech");
	// $mail->addCC('customercare@mothercell.com','sharu.v.1502@gmail.com');
	//$mail->addBCC('bcc@example.com');

	foreach ($Tos as $key => $val) {
		$mail->AddAddress($val, $key);
	}

	foreach ($Ccs as $key => $val) {
		$mail->AddCC($val, $key);
	}


	// Content
	//$mail->isHTML(true);                                  // Set email format to HTML


	$mail->Subject = "TONSE TECHNOLOGIES - New Quotation Request";
	$mail->Body    = "Hi,
	There has been a new quotation request.
	Quotation details are mentioned below. 

	First Name:	$fname
	Last Name:	$lname
	Email:	$email
	Phone:	$countrycode-$phone
	Title:	$yourtitle

	Q1 : $q1 
	A  : $response

	Q2 : $q2
	A  : $teamsize
	
	Q3 : $q3
	A  : $stage
	
	Q4 : $q4
	A  : $avgdeal
	
	Q5 : $q5
	A  : $annualrev	


	Q6 : $q6
	A  : $manage	
	
	Q7 : $q7
	A  : $arrangement36	
	
	Q8 : $q8
	A  : $revgoal
	
	Q9 : $q9
	A  : $projcycle
	
	Q10: $q10
	A  : $urgency	
	

	Q11: $q11
	A  : $start	
	
	Q12: $q12
	A  : $businessname

	Q13: $q13
	A  : $QuickInfo

	Q14: $q19
	A  : $finding	
	
	Q15: $q20
	A  : $opinion	
	
	Q16: $q21
	A  : $lastq	


	";

	// Thank You for contacting us.
	// We will get back to you soon.

	$mail->AltBoy = 'This is the body in plain text for non-HTML mail clients';



	// $mail->send();
	if ($mail->Send()) {
		header("Location: https://tonse.co//price.html");
		returnAndExitAjaxResponse(
			constructAjaxResponseArray(TRUE, '')
		);
	} else {
		returnAndExitAjaxResponse(
			constructAjaxResponseArray(FALSE, '', array('error_message' => $result['title']))
		);
	}
} else {
	//echo '<h2>SPAM Alert!</h2>';
}


function constructAjaxResponseArray($_response, $_message = '', $_json = null)
{
	$_responseArray = array();
	$_response = ($_response === TRUE) ? TRUE : FALSE;
	$_responseArray['response'] = $_response;
	if (isset($_message)) $_responseArray['message'] = $_message;
	if (isset($_json)) $_responseArray['json'] = $_json;

	return $_responseArray;
}
/*
	Returns in the Gframe ajax format.
	Input: data array processed by constructAjaxResponseArray ()
	Outputs as a html stream then exits.
*/
function returnAndExitAjaxResponse($_ajaxResponse)
{
	if (!$_ajaxResponse) {
		$_ajaxResponse = array('response' => false, 'message' => 'Unknown error occurred.');
	}
	header("Content-Type: application/json; charset=utf-8");
	echo json_encode($_ajaxResponse);
	die();
}
