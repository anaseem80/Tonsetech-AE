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

// Check for empty required field
if(!isset($_POST["email"]) || !isset($_POST["fname"]) || !isset($_POST["message"])) {
	returnAndExitAjaxResponse(
		constructAjaxResponseArray(
			FALSE,
			'MISSING_REQUIRED_FIELDS',
			array('error_message'=> 'MISSING_REQUIRED_FIELDS should not be occurred.')
		)
	);
}



$tonse_email = "tonsetechnologies@gmail.com";

// Sanitize input
$fname	= filter_var($_POST["fname"], FILTER_SANITIZE_STRING);
$lname	= filter_var($_POST["lname"], FILTER_SANITIZE_EMAIL);
$website = $_POST["website"];
if (!preg_match("~^(?:f|ht)tps?://~i", $website)) $website = "http://" . $website;
$website = filter_var($website, FILTER_VALIDATE_URL);
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$message = filter_var($_POST["message"], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

// If non required fields are empty
if ( empty($lname) ){
	$lname = "No last name entered.";
}
if ( empty($website) ){
	$website = "No website entered.";
}



// $_fname = (empty($_POST['fname'])) ? 'No name specified' : $_POST['fname'];
// $email = $_POST['email'];

$Tos = array(
	$email	// "Faheem" => "faheempmh@gmail.com",
		// "nandan" => "nandan.aryan88@gmail.com"
	//	"sharath" => "sharathkumarv183@gmail.com"
	);	
	$Ccs = array(
		$tonse_email
	// 	"Faheem" => "faheempmh@gmail.com",
	// "nandan" => "nandan.aryan88@gmail.com"
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
    
    
   $mail->isSMTP();                                           
   $mail->Host       = 'mail.tonse.co';                       
   $mail->SMTPAuth   = true;                                    
   $mail->Username   = 'hello@tonse.co';//'hello@tonse.co';                     // SMTP username
   $mail->Password   = '%I;B.!wVB}F7';//'%I;B.!wVB}F7';                               // SMTP password
   $mail->SMTPSecure = 'tls';         
   $mail->Port       = 587;   
							  // SMTP password
 $mail->SMTPOptions = array(
	 'ssl' => array(
		 'verify_peer' => false,
		 'verify_peer_name' => false,
		 'allow_self_signed' => true
	 )
 );
 //$mail->IsHTML(true);								  
 
    //Recipients
    $mail->setFrom("hello@tonse.co", "TTech");
   // $mail->addAddress('info@mothercell.com', 'Info Mothercell');     // Add a recipient
    // $mail->addAddress('sharathkumarv183@gmail.com');               // Name is optional
    $mail->addReplyTo("hello@tonse.co", "TTech");
   // $mail->addCC('customercare@mothercell.com','sharu.v.1502@gmail.com');
    //$mail->addBCC('bcc@example.com');
    
    foreach($Tos as $key => $val){
		$mail->AddAddress($val , $key); 
	}
 
	foreach($Ccs as $key => $val){
		$mail->AddCC($val , $key); 
	}


    // Content
    //$mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "TONSE TECHNOLOGIES - New email from contact form";
    $mail->Body    = "Hi,
    Greetings from TONSE TECHNOLOGIES,
	New Email Subcription. 
	First Name: $fname
	Last Name: $lname
	Email:$email
	Website: $website
	Message:\n$message\n
	We will get back to you soon.";
    $mail->AltBoy = 'This is the body in plain text for non-HTML mail clients';


   // $mail->send();
        if($mail->Send()){ 
			returnAndExitAjaxResponse(
			constructAjaxResponseArray(TRUE,'')
		);
		}else{ 
			returnAndExitAjaxResponse(
			constructAjaxResponseArray(FALSE,'',array('error_message'=>$result['title']) ));
		}


function constructAjaxResponseArray ($_response, $_message = '', $_json = null) {
	$_responseArray = array();
	$_response = ( $_response === TRUE ) ? TRUE : FALSE;
	$_responseArray['response'] = $_response;
	if(isset($_message)) $_responseArray['message'] = $_message;
	if(isset($_json)) $_responseArray['json'] = $_json;

	return $_responseArray;
}
/*
	Returns in the Gframe ajax format.
	Input: data array processed by constructAjaxResponseArray ()
	Outputs as a html stream then exits.
*/
function returnAndExitAjaxResponse ($_ajaxResponse) {
	if(!$_ajaxResponse){
		$_ajaxResponse = array('response'=>false,'message'=>'Unknown error occurred.');
	}
	header("Content-Type: application/json; charset=utf-8");
	echo json_encode($_ajaxResponse);
	die();
}

