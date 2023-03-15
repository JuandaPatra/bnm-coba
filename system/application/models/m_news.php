<?php

class M_news extends Model {

	function M_news()
	{
		parent::Model();
	}

	function view()
	{
		$sekarangL = date("Y-n-d");
		$string_query       = "select * from news where feature ='no' or feature ='' order by news_id desc";
	  	$query          	  = $this->db->query($string_query);
	  	$config['base_url']     = base_url().'id/news/index/';
	  	$config['total_rows']   = $query->num_rows();
	  	$config['per_page']     = '5';
	  	$num            = $config['per_page'];
			$config['uri_segment'] = 4;
	  	$offset         = $this->uri->segment(4);
	  	$offset         = ( ! is_numeric($offset) || $offset < 1) ? 0 : $offset;
	  	if(empty($offset))
	  	{
	  	$offset=0;
	  	}
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"> <a href="#">';
			$config['cur_tag_close'] = '</a></li>';
	  	$this->pagination->initialize($config);
	  	$data['query']      = $this->db->query($string_query." limit $offset,$num");
	  	$data['base']       = $this->config->item('base_url');
		$data['jlh'] = $query->num_rows();
	  	return $data;
	}
}
?>
