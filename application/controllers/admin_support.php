<?php

class admin_support extends admin_module
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['support_new'] = $this->supportmodel->get_support('new');
		$this->data['support_answered'] = $this->supportmodel->get_support('made');
		
		$this->data['subview'] = 'admin/support/index.php';

		$view = registry::register("view");
		$view->addExternalView('admin/_layout_admin', $this->data);
	}

	public function show_answered($id)
	{
		$this->data['show_answer'] = $this->supportmodel->show_answered($id);

		$this->data['subview'] = 'admin/support/show_answered.php';

		$view = registry::register("view");
		$view->addExternalView('admin/_layout_admin', $this->data);
	}

	public function answer($id)
	{
		$this->data['support'] = $this->supportmodel->get_email_n_body($id);

		if(isset($_POST['submit']))
		{
			$body = trim(xss_clean($_POST['answer_body']));
			if($this->supportmodel->save_answer($id, $body))
			{
				$mail = registry::register('PHPMailer');

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = '@gmail.com';                 // SMTP username
				$mail->Password = '';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 465;                                    // TCP port to connect to
				$mail->CharSet = "UTF-8";
				$mail->setFrom('pskprojektpp2@gmail.com', 'WiPeK CMS');
				$mail->addAddress($this->data['support']['email']);               // Name is optional
				$mail->addReplyTo('pskprojektpp2@gmail.com', 'WiPeK CMS');
				//$mail->addCC('cc@example.com');
				//$mail->addBCC('bcc@example.com');
    // Optional name
				$mail->isHTML(true);                                  // Set email format to HTML

				$mail->Subject = 'Zgłoszenie';
				$message = $body;
				$mail->Body    = $message;

				if(!$mail->send()) {
				    $_SESSION['err'] = 'Odpowiedź nie została wysłana.';
					//redirect('admin_support');
				} else {
				    $_SESSION['err'] = 'Odpowiedź została wysłana.';
					//redirect('admin_support');
				}
			}	
		}

		$this->data['subview'] = 'admin/support/answer.php';

		$view = registry::register("view");
		$view->addExternalView('admin/_layout_admin', $this->data);
	}

}