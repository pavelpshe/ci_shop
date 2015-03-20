<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Dashboard extends MY_Controller {
  function __construct() {
    parent::__construct();
    if (!$this -> data['is_admin']) {
      redirect(site_url() . 'user/login/');
    }
    $this -> load -> model('model_cms');
    //zagrujaem model_cms
  }

  public function index() {
    $products_list = $this -> model_cms -> getProductsList();
    //die_r($products_list);
    if (!empty($products_list['products'])) {
      $this -> data['content'] = $this -> parser -> parse('cms/all_products', $products_list, true);
    }
    $this -> load -> view('cms/main', $this -> data);
  }

  public function orders() {
  }

  public function addProduct(){
    
    $post = $this->input->post(null, true);    
    
    if ($this->form_validation->run() == false){
      
      $categories = $this->model_cms->getCategories();
      
      if($categories){
        
        $this->data['categories'] = $this->parser->parse('cms/categories_parser', $categories, true);
        $this->data['content'] = $this->load->view('cms/addProduct_form', $this->data, true);   
             
      } else {
        
        $this->data['content'] = 'No categories';
        
      }
      
      $this->load->view('cms/main', $this->data);
      
    } else {
      
      // $data_image = $this->do_upload();
      // insert product to db
    
    }
            
  }
  

  public function deleteProduct($id) {
    
    $post=$this->input->post(null,true);
    $this->data['id']=$this->security->xss_clean($id);
    
      if(isset($post['delete_submit'])){
    
        $this->model_cms->deleteProduct($this->data['id']);
        redirect(site_url(). 'cms/dashboard/');
        
      }
    $this -> data['content'] = $this->load->view('cms/delete_form', $this->data,true);
    $this -> load -> view('cms/main', $this -> data);
  }

  public function editProduct() {
  }
  public function do_upload() {
    
    $config['upload_path'] = './public/images/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '20971520';  // 20 MB
    $config['max_width']  = '5000';
    $config['max_height']  = '5000';
    $config['encrypt_name']  = true;

    $this->load->library('upload', $config);
    $this->upload->do_upload();
    return $this->upload->data();

  }
    
}