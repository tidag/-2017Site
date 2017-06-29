<?php

//if they pressed the button, pull out the user inputs
    $senderName = $_POST['name'];
    $senderEmail = $_POST['email'];
    $senderMessage = $_POST['message'];
    $senderInterests = htmlspecialchars(implode(', ', $_POST['interest']));
    $senderEmail = filter_var($senderEmail, FILTER_SANITIZE_EMAIL);
    $senderMessage = filter_var($senderMessage, FILTER_SANITIZE_STRING);
    $senderInterests = stripslashes($senderInterests, FILTER_SANITIZE_STRING);
    $senderHobby = stripslashes($senderHobby, FILTER_SANITIZE_STRING);



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
}