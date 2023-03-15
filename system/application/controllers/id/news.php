<?php

class News extends Controller {

	function News()
	{
		parent::Controller();
		$this->load->model("M_news");
		session_start();
	}

	function index()
	{
		$data = $this->M_news->view();
		$this->load->view('news',$data);
	}

	function detail($news_id,$link)
  {
    $data['query'] = $this->db->query("select * from news where news_id = '$news_id'");
    $data['images'] = $this->db->query("select * from imagenews where news_id = '$news_id'");
    $this->load->view('news-detail',$data);
  }
}
?>
