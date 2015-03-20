<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('model_products');
    
  }

	public function index($category=null,$product = null) {
	  
    if(is_null($category)){//pokazivaet vse kategorii
	  $this->data['title']='Our categories';
    $cat=$this->model_products->getCategories();
    if($cat){
      $this->data['content']=$this->parser->parse('parser/categories',$cat,TRUE);
    } 
    }
    
    elseif(!is_null($category) && is_null($product)){//pokazat chto v categorii
     
     $categories=$this->security->xss_clean($category);//vstroennaya funkciya v codeigniter dlya xss_clean
     
     $prd=$this->model_products->getProducts($category);
      if ($prd){
        $this->data['title']=$prd['cat_name'].'Products';
        $this->data['content']=$this->parser->parse('parser/products',$prd,TRUE);
       
     }
    }elseif(!is_null($category) && !is_null($product)){//pokazat chto v categorii
     
     $product=$this->security->xss_clean($product);
     $item=$this->model_products->getItem($product);
     if ($item){
        $this->data['title']=$item['title'];
        $this->data['content']=$this->parser->parse('parser/item',$item,TRUE);
       
     }
    }
    $this->load->view('templates/main', $this->data);
		
	}
  
}
