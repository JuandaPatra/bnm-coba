<?php

class Home_n extends Controller {

  function Home_n()
  {
    parent::Controller();
    session_start();
	if(!isset($_SESSION['lang'])){
		  $_SESSION['lang'] = "id";
		}
  }
  
  function view()
  {
    $this->load->view('home_en');
  }
}
?>