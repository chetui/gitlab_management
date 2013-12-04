<?php   
require("/opt/gitlab-6.3.0-0/gitlab_management/phpmailer/class.phpmailer.php");   

$stream = fopen("php://stdin", "r");
$stri = "";
while(!feof($stream))
{
    $stri .= fread($stream, 100);
}
fclose($stream);

#echo $stri;

$mail = new PHPMailer();  
$mail->IsSMTP();  
$mail->Host = "smtp.hehe.com";   
$mail->SMTPAuth = true;  
$mail->Username = "your_email@hehe.com";    
$mail->Password = "your_pass";    
$mail->From = "your_email@hehe.com";   
$mail->FromName = "10.214.0.186";   
$mail->AddAddress("your_target_email@hehe.com", "");   
$mail->IsHTML(false);
$mail->Subject = "$argv[1]";   
$mail->Body = "$stri";   

if(!$mail->Send())   
{   
    echo "Mailer Error: " . $mail->ErrorInfo;   
}   
else
    echo "Mailer Succ";
?>  

