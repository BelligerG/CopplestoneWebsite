<?php

if($_POST) {

    $name = "";
    $eAddress = "";
    $queryType = "";
    $subject = "";
    $siteAddress = "admin@copplestonechurch.org.uk";
    $boundary = str_replace(" ", "", date('l jS \of F Y h i s A'));
    
    if(isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    } 
    
    if(isset($_POST['eAddress'])) {
        $eAddress = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['eAddress']);
        $eAddress = filter_var($eAddress, FILTER_VALIDATE_EMAIL);
    }
    
    if(isset($_POST['queryType'])) {
        $queryType = filter_var($_POST['queryType'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['subject'])) {
        $subject = htmlspecialchars($_POST['subject']);
    }
    
    if($queryType == "leadership"){
        $recipient = "johnwiltshireringsash@gmail.com";
    }
    elseif($queryType == "youthWork"){
        $recipient = "hjpetherick@hotmail.co.uk";
    }
    elseif($queryType == "magazine"){
        $recipient = "lunn.family4@gmail.com";
    }
    elseif($queryType == "safeguard"){
        $recipient = "hjpetherick@hotmail.co.uk";
    }
    elseif($queryType == "notice"){
        $recipient = "seannicschofield@yahoo.co.uk";
    }
    elseif($queryType == "lifespring"){
        $recipient = "seannicschofield@yahoo.co.uk";
    }
    elseif($queryType == "website"){
        $recipient = " Lindsey < lindsey2@talk21.com >";
        //$recipient = "chris.m.sampson@gmail.com";
    }
    
    $message = '<div>You have been sent the following message via Copplestone Church\'s contact form.<br /><br />Sender: ' . $eAddress . '<br /><br />Please do not reply directly to this message, but to the sender (above).<br /><br /> Message:</div>';
    
    $message .= '<div>' . $subject . '<br /><br /></div>';
    $message .= '<div>End of message. <br />Name of Sender: ' . $name . '</div>';
    
    $headers = '';
    $headers .= 'From: ' . $siteAddress . "\r\n" . 'Reply-To: ' . $siteAddress . "\r\n";
    $headers .= 'Return-Path: ' . $siteAddress . "\r\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";


    if($queryType == "website"){
       $headers = '';
       $headers .= 'From: admin < ' . $siteAddress . " >\n" . 'Reply-To: admin < ' . $siteAddress . " >\n";
       $headers .= 'X-Sender: admin < ' . $siteAddress . " >\n";
       $headers .= "Cc: testsite < chris.m.sampson@gmail.com >\n";
       $headers .= 'X-Mailer: PHP/' . phpversion();
       $headers .= "X-Priority: 1\n"; // Urgent message!
       $headers .= "Return-Path: chris.m.sampson@gmail.com\n"; // Return path for errors
       $headers .= "MIME-Version: 1.0\r\n";
       $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
    }
    
    
    if(mail($recipient, "Query from website", wordwrap($message), $headers)) {
        echo "<p>Thank you for contacting us, $name. We will respond ASAP.</p>";
    } else {
        echo '<p>We are sorry, the email did not go through, please try again.</p>';
    }
    
} else {
    echo '<p>Something went wrong</p>';
}

?>