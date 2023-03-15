<?php



class Product extends Controller {



  function Product()

  {

    parent::Controller();

	$this->load->model("M_product");

    session_start();

	if(!isset($_SESSION['lang'])){

		  $_SESSION['lang'] = "id";

		}

  }

  

  function view()

  {

  	$data = $this->M_product->view();

  	$this->load->view('product',$data);

  }

  

  function category($category_id)

  {

  	$data = $this->M_product->category($category_id);

  	$this->load->view('product',$data);

  }

  

  function subcategory($subcategory_id,$category_id)

  {

  	$data = $this->M_product->subcategory($subcategory_id,$category_id);

  	$this->load->view('product',$data);

  }

  function subcategory2($subcategory2_id,$subcategory_id,$category_id)

  {

  	$data = $this->M_product->subcategory2($subcategory2_id,$subcategory_id,$category_id);

  	$this->load->view('product',$data);

  }
  
  function subcategory3($subcategory3_id,$subcategory2_id,$subcategory_id,$category_id)

  {

  	$data = $this->M_product->subcategory3($subcategory3_id,$subcategory2_id,$subcategory_id,$category_id);

  	$this->load->view('product',$data);

  }

  function detail($product_id,$link)

  	{

		$data['query'] = $this->db->query("select * from product where product_id = '$product_id'");
    $data['images'] = $this->db->query("select * from imageproduct where product_id = '$product_id'");
   

		$this->load->view('product-detail',$data);

  	}

}

?>