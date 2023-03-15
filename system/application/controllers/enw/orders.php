<?php

class Orders extends Controller {

	function Orders()
	{
		parent::Controller();
		//$this->load->model("M_home");
		session_start();
		if(!isset($_SESSION['lang'])){
		  $_SESSION['lang'] = "id";
		}
		/*
		if(!isset($_SESSION['username'])){
			echo "<script language='javascript'>alert('Please login first');</script>";
			?><meta http-equiv='refresh' content='0;URL=<? echo site_url('home'); ?>'><?
			exit;
		}*/
	}

	function index()
	{
		$this->load->view('orders-track');
	}
	
	function view()
	{
		$order_id = isset($_POST['order_id'])?$_POST['order_id']:'';
		//$data['query'] = $this->db->query("select * from orders where member_id = '$_SESSION[mem_id]'");
		$data['query'] = $this->db->query("select * from orders where order_id = '$order_id'");
		$this->load->view('orders-track-detail',$data);
	}
	
	function detail($order_id)
	{
		$data['query'] = $this->db->query("select * from orders where order_id = '$order_id'");
		$this->load->view('orders-detail',$data);
	}
}
?>