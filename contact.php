<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['eAddress'])) {
		$emailError = 'Email is empty';
	} else {
		$eAddress =  str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['eAddress']);
		if (!filter_var($eAddress, FILTER_VALIDATE_EMAIL)) {
			$emailError = 'Invalid email';
		}
	}

	if (empty($_POST['name'])) {
		$nameError = 'Name is empty';
	} else {
		$name = $_POST['name'];
		if (!filter_var($name, FILTER_SANITIZE_STRING)) {
			$nameError = 'Invalid name';
		}
	}

	if (empty($_POST['queryType'])) {
		$queryError = 'Query is empty';
	} else {
		$queryType = $_POST['queryType'];
		if (!filter_var($queryType, FILTER_SANITIZE_STRING)) {
			$queryError = 'Invalid query';
		}
	}

	if (empty($_POST['subject'])) {
		$subjectError = 'Message is empty';
	} else {
		$subject = $_POST['subject'];
		if (!filter_var($subject, FILTER_SANITIZE_STRING)) {
			$subjectError = 'Invalid message';
		}
	}
    
    if (empty($emailError) && empty($nameError) && empty($queryError) && empty($subjectError)) {
		$date = date('j, F Y h:i A');
		$siteAddress = "admin@copplestonechurch.org.uk";
        $recipient = '';
	

		if($queryType == "leadership"){
        		$recipient = "Leadership < johnwiltshireringsash@gmail.com >";
        	}
        	elseif($queryType == "youthWork"){
        		$recipient = "Children and Youth < markwilliamsccy@gmail.com >";
        	}
        	elseif($queryType == "magazine"){
        		$recipient = "Enlightener < lunn.family4@gmail.com >";
        	}
        	elseif($queryType == "safeguard"){
        		$recipient = "Safeguard < hjpetherick@hotmail.co.uk >";
        	}
        	elseif($queryType == "notice"){
        		$recipient = " Notices < davidandeunice@hotmail.co.uk >";
        	}
        	elseif($queryType == "lifespring"){
        		$recipient = "Lifespring < seannicschofield@yahoo.co.uk >";
        	}
        	elseif($queryType == "website"){
        		$recipient = "Website Issue < chris.m.sampson@gmail.com >";
		}
        
        $message = "
			<html>
			<head>
				<title>You have been sent the following message via Copplestone Church\'s contact form.</title>
			</head>
			<body>
				<div style=\"padding:20px;\">
					Date: $date
					<br>
                    <br>
					Name: $name
					<br>
                    <br>
					Email Address: $eAddress
					<br>
                    <br>
					Message: $subject
				</div>
			</body>
			</html>
			";

        
        $headers = "From: Admin < admin@copplestonechurch.org.uk >" . "\r\n" .
			"Reply-To: $eAddress" . "\r\n" .
            "X-Sender: admin < $siteAddress >" . "\r\n" .
            "X-Mailer: PHP/" . phpversion() . "\r\n" . 
            "X-Priority: 1" . "\r\n" . 
            "Return-Path: chris.m.sampson@gmail.com" . "\r\n" .
			"MIME-Version: 1.0" . "\r\n" .
			"Content-Type: text/html; charset=ISO-8859-1" . "\r\n";


        if(mail($recipient, "Query from website", wordwrap($message), $headers)) {
            echo "<p>Thank you for contacting us, $name. We will respond ASAP.</p>";
        } else {
            echo '<p>We are sorry, the email did not go through, please try again.</p>';
        }
    } elseif(isset($emailError) || (isset($nameError)) || (isset($queryError)) || (isset($subjectError))) {
        echo isset($emailError) ? $emailError . '<br>' : '' ;
        echo isset($nameError) ? $nameError . '<br>' : '' ;
        echo isset($queryError) ? $queryError . '<br>' : '' ;
        echo isset($subjectError) ? $subjectError . '<br>' : '' ;
    }
} else {
    echo '<p>Something went wrong</p>';
}

?>