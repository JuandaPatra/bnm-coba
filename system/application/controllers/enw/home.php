<?php

class Home extends Controller {

  function Home()
  {
    parent::Controller();
    session_start();
	
		  $_SESSION['lang'] = "en";
	
  }
  
  function index()
  {
    $this->load->view('home');
  }

   function video()
  {
    $this->load->view('video'); 
  }
  
}
?>