<?php

class support extends front_module
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if(isset($_POST['submit']))
		{
			$this->main->load('validation_helper');
			$em = trim($_POST['email_support']);
			$em = xss_clean($_POST['email_support']);
			$bd = trim($_POST['support_body']);
			$bd = xss_clean($_POST['support_body']);
			if(valid_email($em))
			{
				//$mail = new PHPMailer;
				$mail = registry::register('PHPMailer');

				//$mail->SMTPDebug = 3;                               // Enable verbose debug output

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = '@gmail.com';                 // SMTP username
				$mail->Password = '';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 465;                                    // TCP port to connect to
				$mail->CharSet = "UTF-8";
				$mail->setFrom('pskprojektpp2@gmail.com', 'WiPeK CMS');
				$mail->addAddress($em);               // Name is optional
				$mail->addReplyTo('pskprojektpp2@gmail.com', 'WiPeK CMS');
				//$mail->addCC('cc@example.com');
				//$mail->addBCC('bcc@example.com');
    // Optional name
				$mail->isHTML(true);                                  // Set email format to HTML

				$mail->Subject = 'Zgłoszenie';
				$message = '<p>Wysłałeś zgłoszenie o treści:</p>';
		    	$message .= $bd;
		    	$message .= "<p>Gdy zostanie rozpatrzone otrzymasz wiadomość.</p>";
				$mail->Body    = $message;
				//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				if($this->supportmodel->save_application($em, $bd))
				{
					if(!$mail->send()) {
					    $_SESSION['err'] = 'Zgłoszenie nie zostało wysłane.';
						redirect('');
					} else {
					    $_SESSION['err'] = 'Zgłoszenie zostało wysłane.';
						redirect('');
					}
				}
				else
				{
				    $_SESSION['err'] = 'Zgłoszenie nie zostało zapisane.';
					redirect('');
				}

			    'Reply-To: wipekxxx@gmail.com' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();
			}
			else
			{
				$_SESSION['err'] = 'Zgłoszenie nie zostało wysłane.';
				redirect('');
			}		
		}
		
		else
		{
			$_SESSION['err'] = 'Zgłoszenie nie zostało wysłane.';
			redirect('');
		} 
	}
}