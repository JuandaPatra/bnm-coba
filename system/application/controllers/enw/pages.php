<?php

class Pages extends Controller {

	function Pages()
	{
		parent::Controller();
		session_start();
    if(!isset($_SESSION['lang'])){

      $_SESSION['lang'] = "id";

    }
	}
	
	function view($pages_id,$title)
  	{
		$data['query'] = $this->db->query("select * from pages where pages_id = '$pages_id'");
		$this->load->view('pages',$data);
  	}


  	function detail($id)
  	{
  		$sql = "SELECT * FROM pages where product_id = '$id' order by pages_id asc";
  		$query = $this->db->query($sql);

      $views = '';
      $view1 = 'tangki-silinder';
      $view2 ='tangki-tanam';
      $vieww3 = 'tangki-industri';
      $view4 = 'bak-terbuka-circular-persegi-panjang';
      $view5 = 'bak-bulat-susun-tutup';
      $view6 = 'cool-box';
      $view7 = 'cone-barrier';
      $view8 ='fl-blow-tank';
      $view9 = 'el-blow-tank';
      $view10 ='stainless-steel-tanks';
      $view11 ='elite-roof';
      $view12 ='excel-tech';
      $view13 = 'polycarbonate-sheets';
      $view14 = 'polypropylene-roofing-and-sheets';

  		if($query->num_rows()>0)
  		{
  			$data['query_pages'] = $query;
  		}else{
  			redirect('home');
  		}

      if($id==6)
      {
        $views = $view2;
      }elseif ($id==2) {
        $views = $view1;
      }elseif($id == 7){
        $views = $view3;
      }elseif ($id==8) {
        $views =$view4;
      }elseif($id==9){
          $views = $view5;
      }elseif ($id==10) {
        $views = $view6;
      }elseif ($id==11) {
        $views = $view7;
      }elseif($id==12){
          $views = $view8;
      }elseif($id ==13){
         $views = $view9;
      }elseif($id== 14){
        $views = $view10;
      }elseif($id==15)
      {
        $views = $view11;
      }elseif($id ==16){
        $views = $view12;
      }elseif($id==17){
        $views = $view14;
      }elseif($id==18){
        $views = $view13;
      }


  		$this->load->view($views,$data);
  	}

}
?>


