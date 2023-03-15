<?php

class Member extends Controller {

	function Member()
	{
		parent::Controller();
		session_start();
		if(!isset($_SESSION['lang'])){
		  $_SESSION['lang'] = "id";
		}
	}
	
	function register()
	{
		$data['username'] = "";
		$data['password'] = "";
		$data['name'] = "";
		$data['address'] = "";
		$data['email'] = "";
		$data['phone'] = "";
		$data['hp'] = "";
		$data['phone_area'] = "";
		$data['hp_area'] = "";
		if(!empty($_SESSION['username'])){
			echo "<script language='javascript'>alert('You have logged in');</script>";
			?><meta http-equiv='refresh' content='0;URL=<? echo site_url('home'); ?>'><?
			exit;
		}
		$this->load->view('register',$data);
	}
	
	function doRegister()
	{
		$file_dir = "memberfile/";
		$username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
		$name = $this->input->post('name',TRUE);
		$address = $this->input->post('address',TRUE);
		$email = $this->input->post('email',TRUE);
		$phone_area = $this->input->post('phone_area',TRUE);
		$phone = $this->input->post('phone',TRUE);
		$hp_area = $this->input->post('hp_area',TRUE);
		$hp = $this->input->post('hp',TRUE);
		$qcek = $this->db->query("select * from member where email = '$email' or username = '$username'");
		if($qcek->num_rows() > 0){
			echo "<script language='javascript'>alert('Registration Failed, Email / Username already Exist');</script>";
			$data['username'] = "";
			$data['password'] = "";
			$data['name'] = $name;
			$data['address'] = $address;
			$data['email'] = "";
			$data['phone_area'] = $phone_area;
			$data['hp_area'] = $hp_area;
			$data['phone'] = $phone;
			$data['hp'] = $hp;
			$this->load->view('register',$data);
		}
		else{
			$phone = $phone_area . $phone;
			$hp = $hp_area . $hp;
			$in = $this->db->query("insert into member values('',now(),'$name','$email','$address','$phone','$hp','$username','$password')");
			
			if($in)
			{
				$comments = "Registration new member in LadyBelle <br>";
				$comments .= "Username : " . $username . "<br>";
				$comments .= "Name : " . $name . "<br>";
				$comments .= "Address : " . $address . "<br>";
				$comments .= "Email : " . $email . "<br>";
				$comments .= "Phone : " . $phone . "<br>";
				$comments .= "HP : " . $hp . "<br>";
		
							$this->load->plugin('phpmailer');
		
							$mail = new phpmailer();
							# Principal settings
							
							$mail->IsSMTP();
							$mail->Host     = "localhost";
							$mail->SMTPAuth = true;     // turn on SMTP authentication
							$mail->Username = "system@sketsaphotography.com";  // SMTP username
							$mail->Password = "system123"; // SMTP password
							
							$mail->From     = 'noreply@sketsaphotography.com';
							$mail->FromName = 'System Admin Sketsa';
							$mail->AddAddress("lix_factor@yahoo.com","Felix Wijoyo");
							$mail->AddAddress("lady_belle@ymail.com","Emmy");
							
							$mail->IsHTML(true); // send as HTML
							# Embed images
							//$mail->AddEmbeddedImage('img/mailings/logo.gif', "logo_header");
							
							$mail->Subject = 'New Member Registration';
							//$mail->Body = $this->load->view('email/mailing_view','',TRUE);
							$mail->Body       = $comments;
							//$mail->AltBody = "This is the text-only body";
							
							$mail->Send();
							
				echo "<script language='javascript'>alert('Register Succeed');</script>";
				?><meta http-equiv='refresh' content='0;URL=<?php echo site_url('home'); ?>'><?php
				exit;
			}
		}
	}
	
	function cekUsername($username)
	{
		$string = substr($username,0,5);
		if($string == "admin")
		{
			?>
			<div style="color:#FF0000; ">Username Invalid</div>
			<?php
		}
		else
		{
			$user = $this->db->query("select username from member where username = '$username'");
			if($user->num_rows() == 1)
			{
				?>
				<div style="color:#FF0000; ">Unavailable</div>
				<?php
			}
			else
			{
				?>
				<div style="color:#339900; ">Available (Tersedia)</div>
				<?php
			}
		}
	}
	
	function login()
	{
		$this->load->view('login');
	}
	
	function doLogin()
	{
		$username = trim($this->input->post('username',TRUE));
		$password = $this->input->post('password',TRUE);
		$cek = $this->db->query("select * from member where username = '$username' and password = '$password'");
		$rCek = $cek->row_array();
		if($cek->num_rows() == 1)
		{
			$_SESSION['username'] = $rCek['username'];
			$_SESSION['name'] = $rCek['name'];
			$_SESSION['email'] = $rCek['email'];
			$_SESSION['mem_id'] = $rCek['member_id'];
			?><meta http-equiv='refresh' content='0;URL=<?php echo site_url("home"); ?>'><?php
		}
		else
		{
			session_destroy();
			echo "<script language='javascript'>alert('Username or Password Invalid');</script>";
			?><meta http-equiv='refresh' content='0;URL=<?php echo site_url('member/login'); ?>'><?php
		}
	}
	
	function logout()
	{
		$idSession = session_id();
		$this->db->query("delete from cart_temp where session_id = '$idSession'");
		$this->db->query("delete from cart where session_id = '$idSession'");
		session_destroy();
		?><meta http-equiv='refresh' content='0;URL=<?php echo site_url('home'); ?>'><?php
	}
	
	function profile()
	{
                if(empty($_SESSION['email'])){
			session_destroy();
			echo "<script language='javascript'>alert('Please Login!');</script>";
			?><meta http-equiv='refresh' content='0;URL=<? echo site_url('home'); ?>'><?
			exit;
		}
		$mem_id = $_SESSION['mem_id'];
		$data['query'] = $this->db->query("select * from member where member_id = '$mem_id'");
		$this->load->view('profile',$data);
	}
	
	function doProfile()
	{
		$file_dir = "memberfile/";
		$mem_id = $this->input->post('mmid',TRUE);
		$name = $this->input->post('name',TRUE);
		$address = $this->input->post('address',TRUE);
		$phone = $this->input->post('phone',TRUE);
		$hp = $this->input->post('hp',TRUE);
		$qcek = $this->db->query("update member set name = '$name', address = '$address', phone = '$phone', hp = '$hp' where member_id = '$mem_id'");
		if($qcek){
			echo "<script language='javascript'>alert('Edit Account Succeed');</script>";
			?><meta http-equiv='refresh' content='0;URL=<?php echo site_url('member/profile'); ?>'><?php
			exit;	
		}
	}
	
	function forgot()
	{
		$this->load->view('forgot');
	}
	
	function doForgot()
	{
		$email = $this->input->post('email',TRUE);
		$cek = $this->db->query("select * from member where email = '$email' limit 1");
		if($cek->num_rows() == 0)
		{
			echo "<script language='javascript'>alert('Sorry," . $email . " not registered in our database');</script>";
			?><meta http-equiv='refresh' content='0;URL=<?php echo site_url('member/forgot'); ?>'><?
		}
		else
		{
		$row = $cek->row_array();
		$comments = "This is your username and password in LadyBelle <br>";
		$comments .= "Username : " . $row['username'] . "<br>";
		$comments .= "Password : " . $row['password'];
		
							$this->load->plugin('phpmailer');
		
							$mail = new phpmailer();
							# Principal settings
							
							$mail->IsSMTP();
							$mail->Host     = "localhost";
							$mail->SMTPAuth = true;     // turn on SMTP authentication
							$mail->Username = "system@sketsaphotography.com";  // SMTP username
							$mail->Password = "system123"; // SMTP password
							
							$mail->From     = 'noreply@sketsaphotography.com';
							$mail->FromName = 'System Admin Sketsa';
							$mail->AddAddress($email,$email); //You can add more emails
							
							$mail->IsHTML(true); // send as HTML
							# Embed images
							//$mail->AddEmbeddedImage('img/mailings/logo.gif', "logo_header");
							
							$mail->Subject = 'Forgot Password Sketsa';
							//$mail->Body = $this->load->view('email/mailing_view','',TRUE);
							$mail->Body       = $comments;
							//$mail->AltBody = "This is the text-only body";
							
							if(!$mail->Send())
							{
							echo "Message was not sent <br>";
							echo "Mailer Error: " . $mail->ErrorInfo;
							exit;
							}
							else {
							  echo "<script language='javascript'>alert('Your password has been sent to your email');</script>";
							  ?><meta http-equiv='refresh' content='0;URL=<? echo site_url('home'); ?>'><?
							}
		}
		
	}
}
?>