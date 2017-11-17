<?php

ini_set('max_execution_time', 600);

require './phpMailer/PHPMailerAutoload.php';
include './../dataBaseConnection.php';
$pdo = DataBaseConnection::getConnection();

$emailSql = $pdo->prepare("SELECT * FROM email_queue WHERE status = :status ORDER BY id ASC LIMIT 5");
$emailSql->execute(array(':status' => "Not sent"));
$result = $emailSql->fetchAll();

foreach ($result as $row)
{
  $id = $row['id'];
  //Update status of the 50 collected emails
  $emailStatus = new StatusUpdate('Sending', $id);
}

foreach ($result as $row)
{
  $fromEmail = $row['email_from'];
  $email = $row['email_to'];
  $subject = $row['subject'];
  $message = $row['message'];
  $id = $row['id'];
  $attachments = html_entity_decode($row['attachments'], ENT_QUOTES, "ISO-8859-1");
  //Set default emails for blank entries
  if(!$email)
  {
    $email = "info@sacana.co.uk";
  }
  
  if(!$fromEmail)
  {
    $fromEmail = "info@sacana.co.uk";
  }
  //Send email
  $sendEmail = new Email($fromEmail, $email, $subject, $message, $id, $attachments);
}

class Email
{
  public function __construct($fromEmail, $email, $subject, $message, $id, $attachments)
  {
    $mail = new PHPMailer;
    //Set email parameters  
    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = 'smtp.office365.com';      // Specify main and backup server
    $mail->SMTPAuth = true;                          // Enable SMTP authentication
    $mail->Username = 'emailaccount@domain.com';     // SMTP username
    $mail->Password = 'yourpassword';                  // SMTP password                      
    $mail->SMTPSecure = 'tls';           // Enable encryption, 'ssl' also accepted
    $mail->Port = 587;
    $mail->From = $fromEmail;
    $mail->FromName = self::getEmailName($email);
    $mail->addAddress($email);
    $mail->WordWrap = 50;                            // Set word wrap to 50 characters  
    $mail->isHTML(true);                             // Set email format to HTML
    $mail->CharSet = "UTF-8";
        
    if($attachments)
    {
      $attachments = unserialize($attachments);
      foreach($attachments as $attachment)
      {       
        if(substr( $attachment, 0, 1 ) === "/")
        {
          $mail->addAttachment('/../'.$attachment);
        }
        else
        {
          $mail->addAttachment('/../../attachments/'.$attachment);
        }
      }
    }
    
    $mail->Subject = html_entity_decode($subject, ENT_QUOTES);
    $mail->Body = html_entity_decode($message, ENT_QUOTES);

    if(!$mail->send()) {
      $sendingStatus = self::updateEmailStatus('Not sent', $id);

      //$failedEmail = mail($fromEmail, "Failed to send: $subject", "Your email to $email, failed to send. Please validate the recipients email address and try again."); 
    }
    else
    {
      $sendingStatus = self::updateEmailStatus('Sent', $id);
    }
  }

  public static function updateEmailStatus($status, $id)
  {
    //Retrieve database connection
    $pdo = DataBaseConnection::getConnection();
    //Set status query
    $sql = "UPDATE email_queue SET status=? WHERE id=?";
    //Prepare statements
    $pdoSent = $pdo->prepare($sql);
    //Update status
    $pdoSent->execute(array($status, $id));
  }

  public static function getEmailName($email)
  {
    $pdo = DataBaseConnection::getConnection();

    $statement = $pdo->prepare("SELECT * FROM Users WHERE email = :email");
    $statement->execute(array(':email' => $email));
    $row = $statement->fetch();

    $name = $row['name'];

    return ($name ? $name : "DefaultName ");
  }
}

class StatusUpdate
{
  public function __construct($status, $id)
  {
    //Retrieve database connection
    $pdo = DataBaseConnection::getConnection();
    //Set status query
    $sql = "UPDATE email_queue SET status=? WHERE id=?";
    //Prepare statements
    $pdoSent = $pdo->prepare($sql);
    //Update status
    $pdoSent->execute(array($status, $id));
  }
}
?>