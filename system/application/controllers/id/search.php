<?php

class Search extends Controller {

	function Search()
	{
		parent::Controller();
		$this->load->model("M_search");
		session_start();
	}
	
	function view()
	{
		$data = $this->M_search->view();
		$this->load->view('search',$data);

	}
}
?>