<?php

class Profile extends Controller {

	function Profile()
	{
		parent::Controller();
	}
	
	function view()
	{
		
		$this->load->view('profile_n');
	}
		function view1()
	{
		
		$this->load->view('excel-high-tech_n');
	}
	function view2()
	{
		
		$this->load->view('knowing-the-right-size');
	}
	function view3()
	{
		
		$this->load->view('product-reference_n');
	}
	function view4()
	{
		
		$this->load->view('materials-info');
	}
}
?>