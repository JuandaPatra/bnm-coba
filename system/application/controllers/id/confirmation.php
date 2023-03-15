<?php

class Confirmation extends Controller {

	function Confirmation()
	{
		parent::Controller();
		session_start();
	}
	
	function index()
	{
		$this->load->view('confirmation');
	}
	
	function send()
	{	
		$name = $this->input->post('name',TRUE);
		$address = $this->input->post('address',TRUE);
		$phone = $this->input->post('phone',TRUE);
 		$email = $this->input->post('email',TRUE);
		$message = $this->input->post('message',TRUE);
		$captcha = $this->input->post('captcha',TRUE);
		if ( $this -> _check_capthca($captcha) ) 
		{
			$insert = $this->db->query("insert into contact values('','$name','$address','$phone','$email','$message')");
			if($insert)
			{
				$captcha_result = 'Contact Us Succeed';
				$text = "Name : " . $name . "<br>";
				$text .= "Address : " . $address . "<br>";
				$text .= "Phone : " . $phone . "<br>";
				$text .= "E-mail : " . $email . "<br>";
				$text .= "Comment :  <br>";
				$text .= $message;
				
				$this->load->plugin('phpmailer');
		
				$mail = new phpmailer();
				# Principal settings
							
				$mail->IsSMTP();
				$mail->Host     = "localhost";
				$mail->SMTPAuth = true;     // turn on SMTP authentication
				$mail->Username = "system@batikindo.com";  // SMTP username
				$mail->Password = "B4TIQindo!@#"; // SMTP password
							
				$mail->From     = $email;
				$mail->FromName = $name;
				$mail->AddAddress("love@batikindo.com","Love BatikIndo.com");
				$mail->addCC('rosita@sketsa.net','Rosita');
				$mail->addCC('yudi@sketsa.net','Yudi');
							
				$mail->IsHTML(true); // send as HTML
				# Embed images
				//$mail->AddEmbeddedImage('img/mailings/logo.gif', "logo_header");
							
				$mail->Subject = 'Payment Confirmation - BatikIndo.com';
				//$mail->Body = $this->load->view('email/mailing_view','',TRUE);
				$mail->Body       = $text;
				//$mail->AltBody = "This is the text-only body";
							
				if(!$mail->Send())
				{
					echo "Message was not sent <br>";
					echo "Mailer Error: " . $mail->ErrorInfo;
					exit;
				}
				else {
					echo "<script language='javascript'>alert('Thank you for your attention');</script>";
					?><meta http-equiv='refresh' content='0;URL=<?php echo site_url('contactus'); ?>'><?php
				}				
			}
		}
		else 
		{
			$captcha_result = 'Security Code Invalid';
		}
		$data['name'] = $name;
		$data['address'] = $address;
		$data['phone'] = $phone;
 		$data['email'] = $email;
		$data['message'] = $message;
		$data['cap_msg'] = $captcha_result;
		$data['cap_img'] = $this -> _make_captcha();
		$this->load->view('contact-us',$data);
	}
	
	function _make_captcha()
	  {
	    //$this -> load -> plugin( 'captcha' );
	    $vals = array(
	      'img_path' => './captcha/', // PATH for captcha ( *Must mkdir (htdocs)/captcha )
	      'img_url' => base_url() . 'captcha/', // URL for captcha img
	      'img_width' => 100, // width
	      'img_height' => 30, // height
	      'font_path'     => './system/fonts/comic.ttf',
	      'expiration' => 3600 ,
	      );
	    // Create captcha
	    $cap = create_captcha( $vals );
	    // Write to DB
	    if ( $cap ) {
	      $data = array(
	        'captcha_id' => '',
	        'captcha_time' => $cap['time'],
	        'ip_address' => $this -> input -> ip_address(),
	        'word' => $cap['word'] ,
	        );
	      $query = $this -> db -> insert_string( 'captcha', $data );
	      $this -> db -> query( $query );
	    }else {
	      return "Umm captcha not work" ;
	    }
	    return $cap['image'] ;
	  }
	 
	  function _check_capthca()
	  {
	    // Delete old data ( 2hours)
	    $expiration = time()-3600 ;
	    $sql = " DELETE FROM captcha WHERE captcha_time < ? ";
	    $binds = array($expiration);
	    $query = $this->db->query($sql, $binds);
	 
	    //checking input
	    $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
	    $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
	    $query = $this->db->query($sql, $binds);
	    $row = $query->row();
	 
	  if ( $row -> count > 0 )
	    {
	      return true;
	    }
	    return false;
	 
	  }
}
?>