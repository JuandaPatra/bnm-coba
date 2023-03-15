


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link ilo-full-src="images/favicon.ico" rel="SHORTCUT ICON" href="images/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
<title>Produk Tangki Air/Tandon Air, Tangki Kimia, Atap UPVC Kualitas Terbaik | Graha Excel</title>

<meta name="DC.title" content="Tangki Air" />
<meta name="geo.region" content="ID-JK" />
<meta name="geo.placename" content="Jakarta" />
<meta name="geo.position" content="-6.208763;106.845599" />
<meta name="ICBM" content="-6.208763, 106.845599" />
<meta name="Resource-type" content="Document" />

<meta name="Keywords" content="graha excel, tangki air, tandon air, toren air, tangki kimia, septic tank, tangki stainless steel, atap polycarbonate, atap UPVC, jual tangki air, Jakarta, Indonesia">  
 
<meta name="Description" content="Graha Excel menyediakan tangki air, tandon air, tangki stainless steel, dan tangki kimia di Indonesia. Kunjungi website kami untuk selengkapnya.">  

<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<script language="javascript">
function cekContact(){
	var name = document.form_contact.name.value;
	var address = document.form_contact.address.value;
	var email = document.form_contact.email.value;
	var phone = document.form_contact.phone.value;
	var subjek = document.form_contact.subjek.value;
	var message = document.form_contact.message.value;	
	if(name == ""){
		alert("Nama harus di isi");
		return false;
	}
	else if(address == ""){
		alert("Alamat Harus di isi");
		return false;
	}
	else if(email == ""){
		alert("email harus di isi");
		return false;
	} 
	
	else if(phone == ""){
		alert("Telphone harus di isi");
		return false;
	}
	else if(subjek == ""){
		alert("Subjek harus di isi");
		return false;
	}
	else if(message == ""){
		alert("Pesan harus di isi");
		return false;
	}
	else{
		document.form_contact.submit();
	}
}
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48556590-1', 'grahaexcel.com');
  ga('send', 'pageview');

</script>



<body>
<?php include'include/header.php' ?>
<?php include'include/menu.php' ?>
<div id="content-home">
	<?php include'include/content-home-left.php' ?>
    <div id="content-home-right">
    	
    	
       
    	<?php

    	$contacQuery = $this->db->query("select * from pages where pages_id = 120");

    	$contact = $contacQuery->row();

    	if($_SESSION['lang']=='id')
    	{

    		echo stripslashes($contact->description_id);
    		echo "<h2>Form Hubung Kami</h2>";

    	}else
    	{
    		echo stripslashes($contact->description_en);
    		echo "<h2>FORM CONTACT US</h2>";
    	}

    	

    	?>




        
         
         		<form name="form_contact" method="post" action="<?php echo site_url($_SESSION['lang']."/contact-us/send"); ?>">
        <table class="form">
        	<tr><td>Name</td><td>:</td><td><input type="text" name="name" placeHolder="masukkan nama anda" value="<?php echo $name; ?>" /></td></tr>
            <tr><td>Address</td><td>:</td><td><textarea placeHolder="masukkan alamat anda"  name="address" value="<?php echo $address; ?>"></textarea></td></tr>
          <tr><td>Email</td><td>:</td><td><input type="text"  name="email" placeHolder="masukkan email anda"   value="<?php echo $email; ?>"></td></tr>
            <tr><td>Handphone</td><td>:</td><td><input type="text" width="300" name="phone" placeHolder="masukkan  No.handphone anda"  value="<?php echo $phone; ?>"/></td></tr>
           <tr><td>Subject</td><td>:</td><td><input type="text" name="subjek" placeHolder="masukkan subjek anda" value="<?php echo $subjek; ?>" /></td></tr>
            <tr><td>Message</td><td>:</td><td><textarea cols="31" name="message" placeHolder="masukkan message anda"   rows="4"><?php echo stripslashes($message); ?></textarea></td></tr>

<tr><td>Captcha</td><td>:</td><td>
				<?php echo $cap_img; ?></td></tr>


<tr><td>Security Code</td><td>:</td><td><input id="captcha" name="captcha" type="text" maxlength=6 size=16><font color="red">
				<?php echo $cap_msg; ?></td></tr>

            <tr><td></td><td><input type="submit" class="tombol" value="SEND"></td></tr>
        </table>
        </form>
    </div>
</div>
<?php include'include/footer2.php' ?>
</body>
</html>