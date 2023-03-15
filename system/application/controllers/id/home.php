<?php

class Home extends Controller {

  function Home()
  {
    parent::Controller();
    session_start();
	if(!isset($_SESSION['lang'])){
		  $_SESSION['lang'] = "id";
		}else{
      $_SESSION['lang'] = "id";
    }
  }
  
  function index()
  {
    $this->load->view('home');
    //echo 'tes';
  }

  function video()
  {
    $this->load->view('video'); 
  }

}
?>