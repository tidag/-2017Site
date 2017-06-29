<?php//useful to see errors//error_reporting(E_ALL & ~E_NOTICE);

//if they pressed the button, pull out the user inputsif($_POST['did_send'] == 1){// Create local variables from the posted variables
    $senderName = $_POST['name'];
    $senderEmail = $_POST['email'];
    $senderMessage = $_POST['message'];
    $senderInterests = htmlspecialchars(implode(', ', $_POST['interest']));    //http://www.webdeveloper.com/forum/showthread.php?224951-Sending-an-email-with-PHP-and-HTML-Forms-specifically-using-checkboxes$senderHobby = htmlspecialchars(implode(', ', $_POST['hobby']));// Strip slashes on the Local typed-in variables for security and run any php based error check here    $senderName = filter_var($senderName, FILTER_SANITIZE_STRING);
    $senderEmail = filter_var($senderEmail, FILTER_SANITIZE_EMAIL);
    $senderMessage = filter_var($senderMessage, FILTER_SANITIZE_STRING);
    $senderInterests = stripslashes($senderInterests, FILTER_SANITIZE_STRING);
    $senderHobby = stripslashes($senderHobby, FILTER_SANITIZE_STRING);


  //validate the array - make sure the value is on the list of allowed Interests  $allowed = array('UX', 'frontend', 'teach','gd','other');  foreach($senderInterests as $interest){    if(!in_array($interest, $allowed)){      $cleanInterests[] = '';    }else{      $cleanInterests[] = $interest;    }  }    // IMPORTANT - Change these lines to be appropriate for your needs - IMPORTANT !!!!!!!!!!!!!!!!!!
    $to = "info@tidag.com";
    $from = "$senderEmail";
    $subject = "my message in a bottle";
    // Modify the Body of the message however you like
    $message = "form info:
        Name:  $senderName
        Email:  $senderEmail
        Message: $senderMessage
        Hobby: $senderHobby
        Interests: $cleanInterests
        Interests: $senderInterests";
        // Build $headers Variable
        $headers = "From: $from\r\n";
        $headers .= "Content-type: text\r\n";
    //send the mail!
    $mail_sent = mail($to, $subject, $message, $headers);
    //success/error
    if($mail_sent){
        //success
        $display_msg = 'Thank you for sending your form ' .$senderName.'. I will reply really soon';
        $status = 'success';
        //to open a new thank you page use: header( 'Location: thankYou.html' ) ;
    }else{
        //failure
        $display_msg = 'Sorry, '.$senderName. ' something went wrong. Please refresh and try again';
        $status = 'problem';
    }
}?>