<?php

class M_product extends Model {

	function M_product()
	{
		parent::Model();	
	}
	
	function view()
	{
		$sekarangL = date("Y-n-d");
		$string_query       = "select * from product order by product_id desc";
	  	$query          	  = $this->db->query($string_query);              
	  	$config['base_url']     = base_url().'index.php/product/view';  
	  	$config['total_rows']   = $query->num_rows();  
	  	$config['per_page']     = '16';   
	  	$num            = $config['per_page'];
		$config['uri_segment'] = 3;
	  	$offset         = $this->uri->segment(3);  
	  	$offset         = ( ! is_numeric($offset) || $offset < 1) ? 0 : $offset;  
	  	if(empty($offset))  
	  	{  
	  	$offset=0;  
	  	}  
	  	$this->pagination->initialize($config);       
	  	$data['query']      = $this->db->query($string_query." limit $offset,$num");    
	  	$data['base']       = $this->config->item('base_url');
		$data['jlhQuery'] = $query->num_rows();
	  	return $data;  
	}
	
	function category($category_id)
	{
		if(!isset($_SESSION['sort'])){
			if(isset($_POST['select_sort'])){
				$_SESSION['sort'] = $_POST['select_sort'];
			}else{	
				$_SESSION['sort'] = 'default';
			}
		}else{
			if(isset($_POST['select_sort'])){
				$_SESSION['sort'] = $_POST['select_sort'];
			}
		}
		if($_SESSION['sort'] == 'default'){
			$q_sort = 'order by product_id desc';
		}else{
			$q_sort = 'order by '.$_SESSION['sort'].' asc';
		}
		$sekarangL = date("Y-n-d");
		$per_page = '16';
		$string_query       = "select * from product where category_id = '$category_id' ".$q_sort."";
	  	$query          	  = $this->db->query($string_query);              
	  	$config['base_url']     = base_url().'index.php/product/category/'.$category_id;  
	  	$config['total_rows']   = $query->num_rows();  
	  	$config['per_page']     = '16';   
	  	$num            = $config['per_page'];
		$config['uri_segment'] = 4;
	  	$offset         = $this->uri->segment(4);  
	  	$offset         = ( ! is_numeric($offset) || $offset < 1) ? 0 : $offset;  
	  	if(empty($offset))  
	  	{  
	  	$offset=0;  
	  	}  
	  	$this->pagination->initialize($config);       
	  	$data['query']      = $this->db->query($string_query." limit $offset,$num");    
	  	$data['base']       = $this->config->item('base_url');
		$data['jlhQuery'] = $query->num_rows();
		$data['total_rows'] = $query->num_rows();  
		$data['offset'] = $offset;
		$data['per_page'] = $per_page;
	  	return $data;  
	}
	
	function subcategory($subcategory_id,$category_id)
	{
		if(!isset($_SESSION['sort'])){
			if(isset($_POST['select_sort'])){
				$_SESSION['sort'] = $_POST['select_sort'];
			}else{	
				$_SESSION['sort'] = 'default';
			}
		}else{
			if(isset($_POST['select_sort'])){
				$_SESSION['sort'] = $_POST['select_sort'];
			}
		}
		if($_SESSION['sort'] == 'default'){
			$q_sort = 'order by product_id desc';
		}else{
			$q_sort = 'order by '.$_SESSION['sort'].' asc';
		}
		$sekarangL = date("Y-n-d");
		$per_page = '16';
		$string_query       = "select * from product where category_id = '$category_id' and subcategory_id = '$subcategory_id' ".$q_sort."";
	  	$query          	  = $this->db->query($string_query);              
	  	$config['base_url']     = base_url().'index.php/product/subcategory/'.$subcategory_id."/".$category_id;  
	  	$config['total_rows']   = $query->num_rows();  
	  	$config['per_page']     = '16';   
	  	$num            = $config['per_page'];
		$config['uri_segment'] = 5;
	  	$offset         = $this->uri->segment(5);  
	  	$offset         = ( ! is_numeric($offset) || $offset < 1) ? 0 : $offset;  
	  	if(empty($offset))  
	  	{  
	  	$offset=0;  
	  	}  
	  	$this->pagination->initialize($config);       
	  	$data['query']      = $this->db->query($string_query." limit $offset,$num");    
	  	$data['base']       = $this->config->item('base_url');
		$data['jlhQuery'] = $query->num_rows();
		$data['total_rows'] = $query->num_rows();  
		$data['offset'] = $offset;
		$data['per_page'] = $per_page;
	  	return $data;  
	}
	
	function subcategory2($subcategory2_id,$subcategory_id,$category_id)
	{
		if(!isset($_SESSION['sort'])){
			if(isset($_POST['select_sort'])){
				$_SESSION['sort'] = $_POST['select_sort'];
			}else{	
				$_SESSION['sort'] = 'default';
			}
		}else{
			if(isset($_POST['select_sort'])){
				$_SESSION['sort'] = $_POST['select_sort'];
			}
		}
		if($_SESSION['sort'] == 'default'){
			$q_sort = 'order by product_id desc';
		}else{
			$q_sort = 'order by '.$_SESSION['sort'].' asc';
		}
		$sekarangL = date("Y-n-d");
		$per_page = '16';
		$string_query       = "select * from product where category_id = '$category_id' and subcategory_id = '$subcategory_id' and subcategory2_id = '$subcategory2_id' ".$q_sort."";
	  	$query          	  = $this->db->query($string_query);              
	  	$config['base_url']     = base_url().'index.php/product/subcategory2/'.$subcategory2_id."/".$subcategory_id."/".$category_id;  
	  	$config['total_rows']   = $query->num_rows();  
	  	$config['per_page']     = '16';   
	  	$num            = $config['per_page'];
		$config['uri_segment'] = 6;
	  	$offset         = $this->uri->segment(6);  
	  	$offset         = ( ! is_numeric($offset) || $offset < 1) ? 0 : $offset;  
	  	if(empty($offset))  
	  	{  
	  	$offset=0;  
	  	}  
	  	$this->pagination->initialize($config);       
	  	$data['query']      = $this->db->query($string_query." limit $offset,$num");    
	  	$data['base']       = $this->config->item('base_url');
		$data['jlhQuery'] = $query->num_rows();
		$data['total_rows'] = $query->num_rows();  
		$data['offset'] = $offset;
		$data['per_page'] = $per_page;
	  	return $data;  
	}
	
	function subcategory3($subcategory3_id,$subcategory2_id,$subcategory_id,$category_id)
	{
		if(!isset($_SESSION['sort'])){
			if(isset($_POST['select_sort'])){
				$_SESSION['sort'] = $_POST['select_sort'];
			}else{	
				$_SESSION['sort'] = 'default';
			}
		}else{
			if(isset($_POST['select_sort'])){
				$_SESSION['sort'] = $_POST['select_sort'];
			}
		}
		if($_SESSION['sort'] == 'default'){
			$q_sort = 'order by product_id desc';
		}else{
			$q_sort = 'order by '.$_SESSION['sort'].' asc';
		}
		$sekarangL = date("Y-n-d");
		$per_page = '16';
		$string_query       = "select * from product where category_id = '$category_id' and subcategory_id = '$subcategory_id' and subcategory2_id = '$subcategory2_id' and subcategory3_id = '$subcategory3_id' ".$q_sort."";
	  	$query          	  = $this->db->query($string_query);              
	  	$config['base_url']     = base_url().'index.php/product/subcategory3/'.$subcategory3_id."/".$subcategory2_id."/".$subcategory_id."/".$category_id;  
	  	$config['total_rows']   = $query->num_rows();  
	  	$config['per_page']     = '16';   
	  	$num            = $config['per_page'];
		$config['uri_segment'] = 7;
	  	$offset         = $this->uri->segment(7);  
	  	$offset         = ( ! is_numeric($offset) || $offset < 1) ? 0 : $offset;  
	  	if(empty($offset))  
	  	{  
	  	$offset=0;  
	  	}  
	  	$this->pagination->initialize($config);       
	  	$data['query']      = $this->db->query($string_query." limit $offset,$num");    
	  	$data['base']       = $this->config->item('base_url');
		$data['jlhQuery'] = $query->num_rows();
		$data['total_rows'] = $query->num_rows();  
		$data['offset'] = $offset;
		$data['per_page'] = $per_page;
	  	return $data;  
	}
}
?>