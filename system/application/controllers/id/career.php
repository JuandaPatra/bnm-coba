<?php

class Career extends Controller {

	function Career()
	{
		parent::Controller();
		
		session_start();
	}
	
	function index()
	{
		$data['query'] = $this->db->query("select * from career where expired_date >= now()");
		$this->load->view('career',$data);
	}
	
	function detail($news_id,$link)
  {
    $data['query'] = $this->db->query("select * from career where career_id = '$news_id'");
    $this->load->view('career-detail',$data);
  }
}
?>