<?php
include '../../../../UtilityScript/dataBaseConnection.php';
include './login.class.php';
error_reporting(E_ERROR);
ini_set('display_errors', 0);
session_start();
$conn= DataBaseConnection::getConnection();
$data=json_decode(file_get_contents("php://input"));

	
$response	=	array();
$email		=	htmlentities($data->email);
$mobile		=	htmlentities($data->mobile);
$pwd		=	htmlentities($data->password);
$dummy1		=	htmlentities($data->dummy1);
$dummy2		=	htmlentities($data->dummy2);


$base_url='http://localhost/link/to/the/registration.php';
$id_link="usr".(md5($email.time())); // encrypted email+timestamp
$user_exist = check($conn,$email, $mobile);

if($user_exist== "not_exist")
{	
	$response["result"]=add_new_user($base_url,$id_link,$conn,$email,$mobile,$pwd,$dummy1,$dummy2);
}
else if($user_exist== "already_exist")
{
	$response["result"]="already_exist";
}
else if($user_exist== "mobile_already_exist")
{
	$response["result"]="mobile_already_exist";
}
else{
	$response["result"]="error";
}

echo json_encode($response);


function check($conn,$email,$mobile)
{
	//DELETE EX PENDIENT REQUEST
	$statement = $conn->prepare("DELETE FROM users WHERE (email = :email OR mobile = :mobile) AND status_email ='Not Confirmed' AND status_mobile='Not Confirmed'");
	$statement->execute(array(':email' => $email,':mobile' => $mobile));

	$statement = $conn->prepare("SELECT count(*) as cnt FROM users WHERE email = :email");
	$statement->execute(array(':email' => $email));
	$mail = $statement->fetch();

	$statement = $conn->prepare("SELECT count(*) as cnt FROM users WHERE mobile = :mobile");
	$statement->execute(array(':mobile' => $mobile));
	$phone = $statement->fetch();

	if($mail['cnt']>0){
		$result="already_exist";
	}
	else if($phone['cnt']>0){
		$result="mobile_already_exist";
	}
	else{
		$result="not_exist";
	}

	return ($result);
}

function add_new_user($base_url,$id_link, $conn, $email,$mobile, $pw,$dummy1,$dummy2)
{	
	$pwd=hash('sha256',$pw);
	$code = md5(uniqid(rand()));
	
	$smsCode = rand ( 1000 , 9999 );
	$q = $conn->prepare("
						INSERT INTO users (id,email, mobile, password,dummy1,dummy2, TIMESTAMP, status_email,confirmation_code) 
						VALUES (:id, :email, :mobile, :pw, :dummy1, :dummy2, NOW(), 'Not Confirmed', :code)"
						);

	if($q->execute(array(':id'=>$id_link , ':email'=>$email, ':mobile'=>$mobile ,':pw'=>$pwd, ':dummy1'=>$dummy1, ':dummy2'=>$dummy2, ':code'=>$code)))
	{
		session_start();
		session_destroy();
		$_SESSION['userID']	 =	$id_link;
		$_SESSION['name']    =	$name;

		/* activating the email service deleting the comment and replace the parameter "mail " of function mail() with the administrator email address*/
		$myfile  = fopen("/../template/email/registration.html", "r") or die("Unable to open file!");
		$body  = fread($myfile,filesize("../../../template/email/registration.html"));
		fclose($myfile);
		$body  = str_replace("#code", $code."&welcome=1",$body);
		$body  = str_replace("#patientName", $patient["name"],$body);

		$to      = $account;
		$subject = 'YourCompany - Confirm Your Registration';

		$headers = 'From: youremail@yourdomain.com' . "<br>" .'Reply-To: youremail@yourdomain.com';

		$email_from = 'youremail@yourdomain.com';
		$q = $conn->prepare("
							INSERT INTO email_queue (headers, email_from, email_to, subject, message, status, timestamp) 
							VALUES (:headers, :email_from, :email_to, :subject, :message,'Not sent', NOW())");
		if($q->execute(array(':headers'=>$headers, ':email_from'=>$email_from ,':email_to'=>$account,':subject'=>$subject,':message'=>$body)))
		{
			$result="ok";
		}
		else
		{
			$result="failed";
		}		
	}
	else
	{
		$result="failed";
	}

	return($result);
	
}


?>
