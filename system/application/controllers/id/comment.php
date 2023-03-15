<?php

class Comment extends Controller {

  function Comment()
  {
    parent::Controller();
    session_start();
  }
  
  function article($article_id,$member_id){
  		$message = addslashes($this->input->post('message',TRUE));
		$qTitle = $this->db->query("select title from article where article_id = '$article_id'");
		$rTitle = $qTitle->row_array();
		$insert = $this->db->query("insert into comment values('','$article_id','$rTitle[title]','$message','$member_id','no',now(),'article')");
		if($insert){
			echo "<script language='javascript'>alert('Thank you for comment us. Waiting for admin approval');</script>";
			?><meta http-equiv='refresh' content='0;URL=<?php echo site_url('home'); ?>'><?php
		}
  }
}
?>