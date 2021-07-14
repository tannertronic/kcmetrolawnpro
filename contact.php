<?php

if($_POST){
    $visitor_name = '';
    $visitor_email = '';
    $visitor_message = '';
    $email_body = '<div>';
    $recipient = 'theryantanner@gmail.com';
    $result_message = '';

    if(isset($_POST['visitor_name'])) {
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                            <label><b>Name:</b></label>&nbsp;<span>".$visitor_name."</span>
                        </div>";
    }

    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }

    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
        $email_body .= "<div>
                           <label><b>Message:</b></label>
                           <div>".$visitor_message."</div>
                        </div>";
    }

    $email_body .= '</div>';

    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";

    if(mail($recipient, 'Message from ' . $visitor_email , $email_body, $headers)) {
        $result_message = 'Thank you for contacting us. We will read your message and respond at our earliest convenience.';
        // $result_message = 'true case. recipient = ' . $recipient . ', email = ' . $visitor_email . ', headers = ' . $headers;
    } else {
        $result_message = 'An error has occured.';
        // $result_message = 'false case. recipient = ' . $recipient . ', email = ' . $visitor_email . ', headers = ' . $headers;
    }

} else {
    echo '<p>Something went wrong.</p>';
}

?>

<!DOCTYPE HTML>
<!--
	Dimension by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>KC Metro Lawn Pro</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<link rel="preload" as="image" href="images/bg2.jpeg">
		<link rel="preload" as="image" href="images/bg3.jpeg">
		<link rel="preload" as="image" href="images/bg4.jpeg">
		<!-- <link rel="preload" as="image" href="images/IMG_6764.jpeg">
		<link rel="preload" as="image" href="images/IMG_7083.jpeg">
		<link rel="preload" as="image" href="images/IMG_9520.jpeg">
		<link rel="preload" as="image" href="images/IMG_9598.jpeg">
		<link rel="preload" as="image" href="images/landscape1.jpeg">
		<link rel="preload" as="image" href="images/landscape2.jpg">
		<link rel="preload" as="image" href="images/hardscape.jpeg">
		<link rel="preload" as="image" href="images/retainingwall2.jpeg">
		<link rel="preload" as="image" href="images/leafremoval.jpg">
		<link rel="preload" as="image" href="images/snowremoval.jpeg"> -->

        <style>
            #main, #message{display:block!important;}
        </style>
	</head>
	<body class="is-preload bg-1 is-article-visible">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">

						<!-- Intro -->
						<article id="message" class="active">
							<h3 id="result_message"><?php echo $result_message ?></h3>
						</article>

					</div>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
            <script>
                document.getElementById('wrapper').addEventListener('click', () => {
                    window.location.href = 'index.html';
                });
                document.querySelector('#main article .close').addEventListener('click', () => {
                    window.location.href = 'index.html';
                })
            </script>
	</body>
</html>
