<?php

class Profil extends Controller {

	function Profil()
	{
		parent::Controller();
	}
	
	function view()
	{
		
		$this->load->view('profile');
	}
		function view1()
	{
		
		$this->load->view('excel-high-tech');
	}
	function view2()
	{
		
		$this->load->view('size-tepat');
	}
	function view3()
	{
		
		$this->load->view('product-reference');
	}
	function view4()
	{
		
		$this->load->view('kenali-bahan');
	}
}
?>