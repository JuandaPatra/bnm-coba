<?php

class Front extends Controller {

  function Front()
  {
    parent::Controller();
    session_start();
	if(!isset($_SESSION['lang'])){
		  $_SESSION['lang'] = "id";
		}
  }
  
  function index()
  {
    $this->load->view('front');
  }
}
?>