<?php

if($_POST) {

    $name = "";
    $eAddress = "";
    $queryType = "";
    $subject = "";
    
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
        $recipient = "sherrin.copplestonecfw@gmail.com";
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
    elseif($queryType == "website"){
        $recipient = "chris.m.sampson@gmail.com";
    }
    
    $headers = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $eAddress . "\r\n";
    
    if(mail($recipient, "Query from website", $subject, $headers)) {
        echo "<p>Thank you for contacting us, $name. We will respond ASAP.</p>";
    } else {
        echo '<p>We are sorry, the email did not go through, please try again.</p>';
    }
    
} else {
    echo '<p>Something went wrong</p>';
}

?>