<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

session_start();

if(isset($_POST['send'])){

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

   
    
   
    //Load composer's autoloader

    $mail = new PHPMailer(true);                            
    try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';        //host name              
        $mail->SMTPAuth = true;                             
        $mail->Username = 'mankyada.19.imsc@iict.indusuni.ac.in';     //add emil id for send mail
        $mail->Password = 'Mannkyada@1612';             //add mail id password
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   

        //Send Email
        $mail->setFrom('mankyada.19.imsc@iict.indusuni.ac.in'); //sent for mail
        
        //Recipients
//        $mail->addAddress($email);      
        
        
         $add  = explode(',',$email);
         foreach ($add as $values) {
            $trimvalues = trim($values);
            $mail->addAddress($trimvalues);
        }
   
        $mail->addReplyTo('mankyada.19.imsc@iict.indusuni.ac.in'); //it reply for mail
        
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
		
       $_SESSION['result'] = 'Message has been sent successfully';
	   $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
	   $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['status'] = 'error';
    }
	
	header("location: index.php");

}


