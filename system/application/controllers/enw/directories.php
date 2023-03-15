<?php

class Directories extends Controller {

  function Directories()
  {
    parent::Controller();
	$this->load->model("M_directory");
    session_start();
  }
  
  function view()
  {
  	$data = $this->M_directory->view();
  	$this->load->view('directory',$data);
  }
  
  function category($category_id)
  {
  	$data = $this->M_directory->category($category_id);
  	$this->load->view('directory',$data);
  }
  
  function detail($directory_id,$link)
  	{
		$data['query'] = $this->db->query("select * from directory where directory_id = '$directory_id'");
		$this->load->view('directory-detail',$data);
  	}
}
?>