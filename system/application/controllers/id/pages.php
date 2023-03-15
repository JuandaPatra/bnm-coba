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


    function detail($id,$link='')
    {
      $sql = "SELECT * FROM pages where product_id = '$id' order by pages_id asc";
      $query = $this->db->query($sql);

      if($id=='1')
      {
        $views = 'product-application';
      }elseif($id=='2'){
        $views = 'production-facilities';
      }else
       {
        $views = 'technical-information';
      }
      


      $this->load->view($views,$data);
    }

	function test()
	{
		phpinfo();
	}
}
?>


