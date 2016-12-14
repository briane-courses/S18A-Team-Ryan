<?php

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

include "connector.php";
require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

$table = $_SESSION['table'];

$emailadd = isset($_POST["emailadd"]) ? $_POST["emailadd"] : false;

echo $emailadd;
if($emailadd == 'All Faculty')
{

}
else if($emailadd == 'SpecFaculty')
{
	$filter = "WHERE ";
    $inputs = isset($_POST["inputs"]) ? $_POST["inputs"] : false;
                                                    
		if($inputs == 'idnumber'){
			
            $idnumber = isset($_POST["idnumber"]) ? $_POST["idnumber"] : false;
                 
            $stmt= $conn->prepare("SELECT first_name, middle_name, last_name FROM faculty 
                                        WHERE id = :idnumber ;");

            $stmt->execute(["idnumber" => $idnumber]);

            $result = $stmt->execute();
            
            if(!$rows = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo "<script>
                alert('Faculty member not found.');
                
                </script>";
            }

            $filter = $filter."last_name ='".$rows['last_name']."' AND  first_name ='".$rows['first_name']."' AND middle_name ='".$rows['middle_name']."'";
            echo $filter;
        }
        else
        {
            $name = isset($_POST["name"]) ? $_POST["name"] : false;
            $stmt= $conn->prepare("SELECT first_name, middle_name, last_name FROM faculty 
                                    WHERE first_name= :name OR last_name= :name OR middle_name= :name");

            $stmt->execute(["name" => $name]);

            $result = $stmt->execute();
            
            if(!$rows = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo "<script>
                alert('Faculty member not found.');
                window.location.replace('../dashboard.html');
                </script>";
            }
            $filter = $filter."last_name ='".$rows['last_name']."' AND  first_name ='".$rows['first_name']."' AND middle_name ='".$rows['middle_name']."'";         
        }
        $stmt= $conn->prepare("SELECT email FROM faculty 
                                ".$filter);

        $result = $stmt->execute();
            
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
	
		$emailaddress = $rows['email'];
	
}
else
{
	$emailaddress = isset($_POST["emailcustom"]) ? $_POST["emailcustom"] : false;
		
}

echo $emailaddress;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "famsdlsu2.0@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "Fams123456!";

//Set who the message is to be sent from
$mail->setFrom('famsdlsu2.0@gmail.com', 'FAMS DLSU');

//Set an alternative reply-to address
$mail->addReplyTo('famsdlsu2.0@gmail.com', 'FAMS DLSU');

//Set who the message is to be sent to
$mail->addAddress($emailaddress);

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($table);


//send the message, check for errors
// if (!$mail->send()) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// } else {
//     echo "Message sent!";
// }
?>