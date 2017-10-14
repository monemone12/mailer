<meta charset="utf-8" />

<?php
include_once('common.php');
/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Asia/Seoul');

require 'PHPMailer/PHPMailerAutoload.php';
$success = 0;
$fail = 0;

$user_id = $_POST['user_id'];
$user_email = $user_id ."@daum.net";
$user_password = $_POST['user_password'];
$sender_name =$_POST['sender_name'];

$to = explode(";",$_POST['to']);


$count_to = count($to) - 1;
$title = $_POST['title'];

$contents = $_POST['contents'];

$send_file = $_FILES['send_file'];

if($send_file['size']>0){
  fileupload($send_file, "file-", GENERAL_UPLOAD_PATH);
}

  //Create a new PHPMailer instance
  $mail = new PHPMailer;
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 2;
  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';

  $mail->CharSet = 'UTF-8';
  //Set the hostname of the mail server
  $mail->Host = "smtp.daum.net";
  //Set the SMTP port number - likely to be 25, 465 or 587
  $mail->Port = 465;
  //Whether to use SMTP authentication

  $mail->SMTPAuth = true;

  $mail->SMTPSecure = 'ssl';
  //Username to use for SMTP authentication
  $mail->Username = $user_email;
  //Password to use for SMTP authentication
  $mail->Password = $user_password;
  //Set who the message is to be sent from
  $mail->setFrom($user_email, $sender_name);
  //Set the subject line
  $mail->Subject = $title;
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  $mail->msgHTML($contents, dirname(__FILE__));
  //Replace the plain text body with one created manually
  // $mail->AltBody = 'This is a plain-text message body';
  //Attach an image file
  $mail->addAttachment(GENERAL_UPLOAD_PATH.$file_name,$file_org_name);

    //send the message, check for errors

  for ($i=0;$i<$count_to;$i++){
    if($to[$i] !=""){
      //Set an alternative reply-to address
      $mail->addAddress($to[$i]);
      //Set who the message is to be sent to

      // echo "Mailer Error: " . $mail->ErrorInfo;


    }


  }
  if (!$mail->send()) {
    $fail ++;
      echo "메일발송에 실패했습니다.";
  } else {
    $success ++;

  }



@unlink(GENERAL_UPLOAD_PATH.$file_name);

echo $count_to. "개의 발송목록중 " . $success . " 개의 메일이 성공적으로 발송되었습니다.";
echo "<br>";
echo $fail . "개의 실패로그가 있습니다.";
?>
<br>

<a href="index.php">홈으로</a>
