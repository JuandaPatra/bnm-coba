<?php

class Cart extends Controller {

	function Cart()
	{
		parent::Controller();
		//$this->load->model("M_home");
		session_start();
		if(!isset($_SESSION['lang'])){
		  $_SESSION['lang'] = "id";
		}
		/*if(!isset($_SESSION['username'])){
			echo "<script language='javascript'>alert('Please login first');</script>";
			?><meta http-equiv='refresh' content='0;URL=<? echo site_url('home'); ?>'><?
			exit;
		}*/
	}
	
	function in($color,$qty,$product)
	{
		$id_products = $product;
		$qty = $qty;
		$color = $color;
		$idSession = session_id();
		$datenow = date("Y-m-d");
		$timenow = date("H:i:s");
		$q = $this->db->query("select * from cart_temp where session_id = '$idSession' and product_id = '$id_products' and color = '$color'");
		if($q->num_rows() > 0){
			$in = $this->db->query("update cart_temp set quantity = '$qty' where session_id = '$idSession' and product_id = '$id_products' and color = '$color'");
		}else{
			$in = $this->db->query("insert into cart_temp values('','$id_products','$idSession','$qty','$datenow','$timenow','0','$color')");
		}
		if($in)
		{
			$q2 = $this->db->query("select * from cart_temp where session_id = '$idSession' and product_id = '$id_products'");
			if($q2->num_rows() > 0){
				foreach($q2->result_array() as $r2){
					$qColor = $this->db->query("select * from productcolor where color_id = '$r2[color]'");
					$rColor = $qColor->row_array();
					echo $rColor['color_name'] . " : " . $r2['quantity'] . "<br>";
				}
			}
		}
	}
	
	function in2()
	{
		$id_products = $this->input->post('product',TRUE);
		$qty = $this->input->post('qty',TRUE);
		$idSession = session_id();
		$datenow = date("Y-m-d");
		$timenow = date("H:i:s");
		$in = $this->db->query("insert into cart values('','$id_products','$idSession','$qty','$datenow','$timenow','0','0');");
		if($in)
		{
			//$update = $this->db->query("update products set stock1 = stock1 - '$qty'");
			?><meta http-equiv='refresh' content='0;URL=<? echo site_url('cart/show'); ?>'><?
		}
	}
	
	function stock($color,$product){
		$id_products = $product;
		$color = $color;
		$q2 = $this->db->query("select * from productcolor where product_id = '$id_products' and color_id = '$color'");
		if($q2->num_rows() > 0){
			$r2 = $q2->row_array();
			echo $r2['stock'];
		}
	}
	
	function emptyCart($product){
		$idSession = session_id();
		$q = $this->db->query("delete from cart_temp where product_id = '$product' and session_id = '$idSession'");
	}
	
	function submitCart($product){
		$idSession = session_id();
		$query = $this->db->query("select * from cart_temp where session_id = '$idSession' and product_id = '$product'");
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$in = $this->db->query("insert into cart values('','$row[product_id]','$idSession','$row[quantity]','$row[date_cart]','$row[time_cart]','0','$row[color]')");
			}
			if($in){
				$del = $this->db->query("delete from cart_temp where session_id = '$idSession'");
			}
			echo "yes";
		}else{
			echo "no";
		}
	}
	
	function show()
	{
		$idSession = session_id();
		$data['query'] = $this->db->query("select p.*, c.* from product p, cart c where p.product_id = c.product_id and c.session_id = '$idSession'");
		$this->load->view('add-to-cart',$data);
	}
	
	function delete($idCart)
	{
		$query = $this->db->query("select * from cart where cart_id = '$idCart'");
		$row = $query->row_array();
		//$up = $this->db->query("update productcolor set stock = stock + '$row[quantity]' where color_id = '$row[color]'");
		$del = $this->db->query("delete from cart where cart_id = '$idCart'");
		if($del)
		{
			?><meta http-equiv='refresh' content='0;URL=<? echo site_url('cart/show'); ?>'><?
		}
	}
	
	function checkout()
	{
		$idSession = session_id();
 		$data['query'] = $this->db->query("select p.*, c.* from product p, cart c where p.product_id = c.product_id and c.session_id = '$idSession'");
		$this->load->view('checkout',$data);
	}
	
	function confirm()
	{
		if(isset($_SESSION['mem_id']) && $_SESSION['mem_id'] != ""){
			$qMm = $this->db->query("select * from member where member_id = '$_SESSION[mem_id]'");
			$rMm = $qMm->row_array();
		}
		$member_id = 0;
		if(isset($_SESSION['mem_id']) && $_SESSION['mem_id'] != ""){
			$member_id = $_SESSION['mem_id'];
		}
		$idSession = session_id();
		$province_id = $this->input->post('province',TRUE);
		$city_id = $this->input->post('city',TRUE);
		$provider_id = $this->input->post('provider',TRUE);
		$service_id = $this->input->post('service',TRUE);
		$qcheck = $this->db->query("select * from courier where province_id = '$province_id' and city_id = '$city_id' and provider_id = '$provider_id' and service_id = '$service_id'");
		$courier = $qcheck->row_array();
		$courier_id = $courier['courier_id'];
                $qservice = $this->db->query("select * from service where service_id = '$service_id'");
                $service_n = $qservice->row_array(); 
                $service_name = $service_n['service_name'];
		$title = $this->input->post('title',TRUE);
		$first_name = $this->input->post('first_name',TRUE);
		$last_name = $this->input->post('last_name',TRUE);
		$address = $this->input->post('address',TRUE);
		$email = $this->input->post('email',TRUE);
		$ship = $this->input->post('ship',TRUE);
		$addressBuyer = "";
		$shipping_address = "";
		if($ship == "Dropship"){
			$addressBuyer = $this->input->post('addressBuyer',TRUE);	
		}else{
			if(isset($_SESSION['mem_id']) && $_SESSION['mem_id'] != ""){
				$shipping_address = $rMm['address'];
			}else{
				$addressBuyer = $this->input->post('addressBuyer',TRUE);
			}
		}
		$receiver = $this->input->post('receiver',TRUE);
		$receiver_name = "";
		$receiver_phone = "";
		$receiver_hp = "";
		if($receiver == "not"){
			$receiver_name = $this->input->post('receiver_name',TRUE);
			$receiver_phone = $this->input->post('receiver_phone',TRUE);
			$receiver_hp = $this->input->post('receiver_hp',TRUE);
		}
		$phone = $this->input->post('phone',TRUE);
		$hp = $this->input->post('hp',TRUE);
		$zip_code = $this->input->post('zip_code',TRUE);
		$datenow = date("Y-m-d");
		$timenow = date("H:i:s");
	    $waktu=date("Y-m-d H:i:s");
		$total = $this->input->post('total',TRUE);
		$discount = $this->input->post('discount',TRUE);
		
                $cekCart1 = $this->db->query("select p.*, c.* from product p, cart c where p.product_id = c.product_id and c.session_id = '$idSession'");	
                $weight1 =0;
foreach($cekCart1->result_array() as $row ){
    $weight1 += $row['weight'];
}
		$shipping_cost = isset($courier['price'])?$courier['price']*  ceil($weight1):0;
                $total_cost = $total - ($total * $discount /100) + $shipping_cost;
		
		$in = $this->db->query("insert into orders values('','$courier_id','$title','$first_name','$last_name','$address','$phone','$hp','$email','$shipping_address','$addressBuyer','','$zip_code','New','$total','$discount','$shipping_cost','$datenow','$timenow','$member_id',now(),'$receiver_name','$receiver_phone','$receiver_hp');");
		
		$idOrder = mysql_insert_id();
                $product_id = 0;
                $product_quantity = 0;
                
		$query = $this->db->query("select p.*, c.* from product p, cart c where p.product_id = c.product_id and c.session_id = '$idSession'");
		foreach($query->result_array() as $row)
		{
			$update = $this->db->query("update productcolor set stock = stock - '$row[quantity]' where color_id = '$row[color]'");
			$this->db->query("insert into orderdetail values('$idOrder','$row[product_id]','$row[quantity]','$row[color]');");
                        $product_id = $row['product_id'];
                        $product_quantity = $row['quantity'];
		}
				
		/*$data['oid'] = $idOrder; 
		$emailbody = $this->load->view("cart-email",$data,true);*/
				
		if($in)
		{
			//$del = $this->db->query("delete from cart where session_id = '$idSession'");
                        $cekCart = $this->db->query("select p.*, c.* from product p, cart c where p.product_id = c.product_id and c.session_id = '$idSession'");	
			//if($del)
			//{
//                            $text = "Name : " . $first_name.' '.$last_name. "<br>";
//                            $text .= "E-mail : " . $email . "<br>";
//                            $text .= "Address : " . $address . "<br>";
//                            $text .= "Product  : " . $product_id ."<br>";
//                            $text .= "QTY :". $product_quantity. "<br>";
//                            $text .= "TOTAL : " . $total . "<br>";
                        
                        /*===============================================================  TEMPLATE EMAIL =========================================================*/                    

  $text = "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
<title>BatikIndo.com</title>
<style>
body { font-family:arial; font-size:14px; }
a { text-decoration:none; }
</style>
</head>

<body>
<table cellpadding=\"5\">
	<tr><td><img src=\"http://www.batikindo.com/images/logo.png\" /></td>
	<tr><td><p><b>Hi, ".$first_name.' '.$last_name; 
$text .= ",</b><br />Terima kasih telah berbelanja di BatikIndo.com - Batik Murah, Berkualitas & Bergaransi!</p></td></tr>
    <tr><td bgcolor=\"#4b91c6\"><font color=\"#fff\"><b>Invoice details</b></font></td></tr>
    <tr><td>Invoice No: <b><a href=\"#\"><font color=\"#f2bf0b\">".$idOrder." ";
$text .= "</font></a></br>Tanggal : ".date('d-m-Y h:m:s')."</b><br />Payment: <b>Transfer ke Bank BCA</b></td></tr>
    <tr><td>
    	<table cellpadding=\"5\" width=\"100%\">
        	<tr>
            	<td bgcolor=\"#cc9966\"><b>Invoice No.</b></td><td bgcolor=\"#cc9966\"><b>Product</b></td><td bgcolor=\"#cc9966\"><b>Unit price</b></td>
                <td bgcolor=\"#cc9966\"><b>Quantity</b></td><td bgcolor=\"#cc9966\"><b>Weight</b></td> <td bgcolor=\"#cc9966\"><b>Total price</b></td> </tr>";
$weight =0;
foreach($cekCart->result_array() as $row ){
    $weight += $row['weight'];
            $text .="<tr>
            	<td bgcolor=\"#ebecee\">".$idOrder."</td>";
                
                    $color = 'No';
				if($row['color'] > 0){
					$qColor = $this->db->query("select * from productcolor where color_id = '".$row['color']."'");
					if($qColor->num_rows() > 0){
						$rColor = $qColor->row_array();
						$color = $rColor['color_name'];
                                                $size = $rColor['size'];
					}
				}
                    
                                if($row['discount'] > 0){
					//echo number_format($row['discount'],0); 
					$price = $row['discount'];
				}else{
					//echo number_format($row['price'],0); 
					$price = $row['price'];
				}
                    $text .= "<td bgcolor=\"#ebecee\">". $row['name_'.$_SESSION['lang']]."  Size :". $size." Color : ".$color."</td>
            	<td bgcolor=\"#ebecee\">"."Rp. " . number_format($price,0);
                    $sum = $row['quantity'] * $price;
                            $text.="</td><td bgcolor=\"#ebecee\">".$row['quantity']."</td><td bgcolor=\"#ebecee\">".$row['weight']."</td><td bgcolor=\"#ebecee\">"."Rp. " . number_format($sum,0)."</td>";
                            $text .= "</tr>"; 
                }
            
            $text .="<tr>
            	<td></td><td bgcolor=\"#b9babe\" colspan=\"4\" 
                align=\"right\">Sub Total</td><td bgcolor=\"#b9babe\" align=\"right\">"."Rp. " . number_format($total,0)."</td></tr>";
            
            $text .="<tr>
            	<td></td><td bgcolor=\"#b9babe\" colspan=\"4\" 
                align=\"right\">Berat Total</td><td bgcolor=\"#b9babe\" align=\"right\">"." " . ceil($weight)."</td></tr>";
            
             $text .="<tr>
            	<td></td><td bgcolor=\"#ebecee\" colspan=\"4\" align=\"right\">Discounts ".$discount." %</td><td bgcolor=\"#ebecee\" align=\"right\"> "."Rp. " . number_format(($discount*$total/100),0)." </td>
            </tr>";
            /*
            <tr>
            	<td></td><td bgcolor=\"#ebecee\" colspan=\"3\" align=\"right\">Gift-wrapping</td><td bgcolor=\"#ebecee\" align=\"right\">Rp. 0,00 </td>
            </tr>*/
            $text .= "<tr>
            	<td></td><td bgcolor=\"#ebecee\" colspan=\"4\" align=\"right\">Shipping</td><td bgcolor=\"#ebecee\" align=\"right\">Rp. ".  number_format($shipping_cost,0)."</td</tr>"; 
            $text .="<tr>
            	<td></td><td bgcolor=\"#4b91c6\" colspan=\"4\" align=\"right\"><b>Total Amount</b></td><td bgcolor=\"#4b91c6\" align=\"right\"><b>"."Rp. " . number_format($total_cost,0)."</b></td>
            </tr>
        </table>
    </td></tr>
    <tr><td bgcolor=\"#4b91c6\"><font color=\"#fff\"><b>Shipping</b></font></td></tr>
    
    <tr><td>
    	<table cellpadding=\"5\" width=\"100%\">
        	<tr>
            	<td bgcolor=\"#b9babe\"><b>Courier</b></td>
            </tr>
            <tr>
            	<td bgcolor=\"#ebecee\"> Jne - ".$service_name."</td>";
            
           
                $text .="    </tr>
        </table>
    </td></tr>
    <tr><td bgcolor=\"#4b91c6\"><font color=\"#fff\"><b>Payment Detail</b></font></td></tr>
    <tr><td>
    	Pembayaran dapat di <b>Transfer ke Bank BCA</b> Berikut detail No rekening kami:<br /><br />
        <b>Total Amount: <a href=\"#\"><font color=\"#cc9966\">"."Rp. " . number_format($total_cost,0)."</font></a></b><br /><br /><br />
		
		
		<b>Account owner:</b> Yudi Setiawan<br /><br />
        <b>Account number:</b> 261-181-4455<br /><br />
        <b>Bank branch:</b> Bank BCA<br /><br /><br /><br />
		
		
		
        <b>YOU MUST CONFIRM YOUR PAYMENT</b><br />
		<li><b><a href=\"http://www.batikindo.com/confirmationn\"><font color=\"#cc9966\">Confirmation Form</font></a></b></li><br> 
		<li>by Email to <b><a href=\"mailto:love@batikindo.com\"><font color=\"#cc9966\">love@batikindo.com</font></a></b></li><br> 
        <li>by SMS <b><a href=\"#\"><font color=\"#cc9966\">08118770753/ 087821569091</font></a></b></li><br /><br />
        Transfer and Confirmation <b>MAX 24 HOURS</b> after order placement or your order will be cancelled automatically<br /><br />
       
	</td></tr>
    <tr><td><hr /><p>Batik Murah, Berkualitas & Bergaransi!</p></td></tr>
</table>
</body>
</html>
";
  /*=============================================================== END TEMPLATE EMAIL =========================================================*/

                                
                             $this->load->library('email');
                                $config['mailtype'] = 'html';
                                $this->email->initialize($config);
                                $this->email->from($email, $first_name.' '.$last_name);
                                $this->email->to('love@batikindo.com');
                                $this->email->cc($email);
                                //$this->email->bcc('them@their-example.com');
                                
                                $this->email->subject('Batikindo.com');
                                $this->email->message($text);
                            
							/*$this->load->plugin('phpmailer');
		
							$mail = new phpmailer();
							# Principal settings
							
							$mail->IsSMTP();
							$mail->Host     = "localhost";
							$mail->SMTPAuth = true;     // turn on SMTP authentication
							$mail->Username = "cs@wacoal.co.id";  // SMTP username
							$mail->Password = "wacoalcs"; // SMTP password
							
							$mail->From     = "online@wacoal.co.id";
							$mail->FromName = "System Admin Wacoal";
							$mail->AddAddress("online@wacoal.co.id","Wacoal"); //You can add more emails
							$mail->AddAddress($email,"Wacoal"); //You can add more emails
							
							$mail->IsHTML(true); // send as HTML
							# Embed images
							//$mail->AddEmbeddedImage('img/mailings/logo.gif', "logo_header");
							
							$mail->Subject = 'Order Wacoal.co.id';
							//$mail->Body = $this->load->view('email/mailing_view','',TRUE);
							$mail->Body       = $emailbody;
							//$mail->AltBody = "This is the text-only body";
							
							if(!$mail->Send())
							{
							echo "Message was not sent <br>";
							echo "Mailer Error: " . $mail->ErrorInfo;
							exit;
							}
							else {*/
							//	$this->load->view('payment');
							//}*/
                                                if(!$this->email->send())
							{
							echo "Message was not sent <br>";
							echo "Mailer Error: " . $this->email->error();
							exit;
							}
							else {
                                                            $del = $this->db->query("delete from cart where session_id = '$idSession'");
								$this->load->view('payment');
							}
			//}// end delete
		}
	}
	
  function done(){
  	echo "<script language='javascript'>alert('Thank you, Please check your email for further information');</script>";
	?><meta http-equiv='refresh' content='0;URL=<? echo site_url('home'); ?>'><?
  }
  
  function process()
  {
    $status_code = $this->input->post('status_code',TRUE);
    $order_number = $this->input->post('order_number',TRUE);
    if($status_code == "00")
    {
        $data['oid'] = $order_number; 
        $emailbody = $this->load->view("cart-email",$data,true);
        
              $this->load->plugin('phpmailer');
    
              $mail = new phpmailer();
              # Principal settings
              
              $mail->IsSMTP();
              $mail->Host     = "localhost";
              $mail->SMTPAuth = true;     // turn on SMTP authentication
              $mail->Username = "cs@wacoal.co.id";  // SMTP username
              $mail->Password = "wacoalcs"; // SMTP password
              
              $mail->From     = "online@wacoal.co.id";
              $mail->FromName = "System Admin Wacoal";
              $mail->AddAddress("online@wacoal.co.id","Wacoal"); //You can add more emails
              $mail->AddAddress($email,"Wacoal"); //You can add more emails
              
              $mail->IsHTML(true); // send as HTML
              # Embed images
              //$mail->AddEmbeddedImage('img/mailings/logo.gif', "logo_header");
              
              $mail->Subject = 'Order Wacoal.co.id';
              //$mail->Body = $this->load->view('email/mailing_view','',TRUE);
              $mail->Body       = $emailbody;
              //$mail->AltBody = "This is the text-only body";
              
              if(!$mail->Send())
              {
              echo "Message was not sent <br>";
              echo "Mailer Error: " . $mail->ErrorInfo;
              exit;
              }
              else {
                  echo "<script language='javascript'>alert('Thank you, Please check your email for further information');</script>";
                ?><meta http-equiv='refresh' content='0;URL=<? echo site_url('home'); ?>'><?
              }
    }
    else
    {
	  	$dOrder = mysql_query("delete from orders where idOrder = '$order_number'");
      	$dOrder_detail = mysql_query("delete from orderdetail where idOrder = '$order_number'");
      	echo "<script language='javascript'>alert('Sorry, transaction failed');</script>";
      	?><meta http-equiv='refresh' content='0;URL=<? echo site_url('home'); ?>'><?
    }
  }
  
  function transfer()
  {
    $idOrder = $this->input->post('idOrder',TRUE);
	$cek = $this->db->query("select * from orders where idOrder = '$idOrder'");
	$r = $cek->row_array();
    $up = $this->db->query("update orders set payment = 'transfer' where idOrder = '$idOrder'");
    if($up)
    {
      $data['oid'] = $idOrder; 
      $emailbody = $this->load->view("cart-email",$data,true);
              
              $this->load->plugin('phpmailer');
    
              $mail = new phpmailer();
              # Principal settings
              
              $mail->IsSMTP();
              $mail->Host     = "localhost";
              $mail->SMTPAuth = true;     // turn on SMTP authentication
              $mail->Username = "cs@wacoal.co.id";  // SMTP username
              $mail->Password = "wacoalcs"; // SMTP password
              
              $mail->From     = "online@wacoal.co.id";
              $mail->FromName = "System Admin Wacoal";
              //$mail->AddAddress("online@wacoal.co.id","Wacoal"); //You can add more emails
              $mail->AddAddress($r['email'],"Wacoal"); //You can add more emails
              
              $mail->IsHTML(true); // send as HTML
              # Embed images
              //$mail->AddEmbeddedImage('img/mailings/logo.gif', "logo_header");
              
              $mail->Subject = 'Order Wacoal.co.id';
              //$mail->Body = $this->load->view('email/mailing_view','',TRUE);
              $mail->Body       = $emailbody;
              //$mail->AltBody = "This is the text-only body";
              
              if(!$mail->Send())
              {
              echo "Message was not sent <br>";
              echo "Mailer Error: " . $mail->ErrorInfo;
              exit;
              }
              else {
                  echo "<script language='javascript'>alert('Thank you, Please check your email for further information');</script>";
                ?><meta http-equiv='refresh' content='0;URL=<? echo site_url('home'); ?>'><?
              }
    }
  }
  
  function showCity($province){
  		$html = "";
		$query = $this->db->query("select * from city where province_id = '$province'");
		if($query->num_rows() > 0){
			$html .= '<select name="city" id="city"><option value="0">Select One</option>';
			foreach($query->result_array() as $row){
				$html .= '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
			}
			$html .= '</select>';
		}else{
			$html .= '<select name="city" id="city"><option value="0">Select One</option></select>';
		}
		
		echo $html;
  }
	
	function shipping_cost($total,$service,$provider,$city,$province)
	{
		$html = "";
		$query = $this->db->query("select * from courier where province_id = '$province' and city_id = '$city' and provider_id = '$provider' and service_id = '$service'");
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$shipping_cost = $row['price'];
			$html .= '
				<table width="100%">
				  <tr>
					<td colspan=4 align=right class="text1"><b>Shipping Cost</b> &nbsp;</td> 
					<td width=120 align="right" class="text1" style="font-weight:bold; ">Rp. ' . number_format($shipping_cost,0) . '</td>
				  </tr>
				  <tr>
					<td colspan=4 align=right class="text1"><b>Grand Total</b> &nbsp;</td> 
					<td width=120 align="right" class="text1" style="font-weight:bold; ">Rp. ' . number_format($total + $shipping_cost,0) . '</td>
				  </tr>
				</table>
			';
		}
		
		echo $html;
	}
	
	function code(){
		$idSession = session_id();
		$code = trim($this->input->post('code',TRUE));
		$cek = $this->db->query("select * from promo_code where code = '$code' and (start_date <= now() and end_date >= now()) limit 1");
		if($cek->num_rows() > 0){
		  $row = $cek->row_array();
		  $this->db->query("update cart set diskon = '$row[diskon]' where session_id = '$idSession'");
		  echo $row['diskon'];
		}else{
		  echo 0;
		}
	  }
	  
	function login()
	{
		$this->load->view('login-checkout');
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
			?><meta http-equiv='refresh' content='0;URL=<?php echo site_url("cart/checkout"); ?>'><?php
		}
		else
		{
			session_destroy();
			echo "<script language='javascript'>alert('Username or Password Invalid');</script>";
			?><meta http-equiv='refresh' content='0;URL=<?php echo site_url('cart/login'); ?>'><?php
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
		$this->load->view('register-checkout',$data);
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
			$this->load->view('register-checkout',$data);
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
							
					$username = trim($username);
					$password = trim($password);
					$cek = $this->db->query("select * from member where username = '$username' and password = '$password'");
					$rCek = $cek->row_array();
					if($cek->num_rows() == 1)
					{
						$_SESSION['username'] = $rCek['username'];
						$_SESSION['name'] = $rCek['name'];
						$_SESSION['email'] = $rCek['email'];
						$_SESSION['mem_id'] = $rCek['member_id'];
						echo "<script language='javascript'>alert('Register Succeed');</script>";
						?><meta http-equiv='refresh' content='0;URL=<?php echo site_url('cart/checkout'); ?>'><?php
						exit;
					}
							
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
}
?>