<?php

class Gallery extends Controller {

	function Gallery()
	{
		parent::Controller();
		$this->load->model("M_gallery");
		session_start();
	}
	
	function view()
	{
		$data = $this->M_gallery->view();
		$this->load->view('gallery',$data);
	}
	
	function detail($gallery_id,$link)
  {
    $data['query'] = $this->db->query("select * from gallery where gallery_id = '$gallery_id'");
    $this->load->view('gallery-detail',$data);
  }
}
?>