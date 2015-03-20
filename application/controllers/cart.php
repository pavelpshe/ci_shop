<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends MY_Controller {
 function __construct()
  {
  parent::__construct(); 
  $this->load->model('model_cart');   
  }
    public function checkout(){
    $this->data['content']=$this->load->view('content/checkout',null,true);
    $this->load->view('templates/main',$this->data);  
    }
    public function addToCart()
  {
    $id=$this->input->get('id',true);
    if($id){
      $this->model_cart->addToCart($id);
    }
  }
   public function updateCart() { 
       $cart_details=$this->input->post(null,true);
       $this->cart->update($cart_details);
       redirect(site_url().'cart/checkout/');
   }
  public function order(){
   
    if($this->data['is_login']){ //in core my_controller
     $order=$this->cart->contents();
    if(count($order)>0){
      $order=json_encode($order);
      $this->model_cart->orderSave($order);
      $this->data['title']='Order confirmation';
      $this->data['content']='Order has been save';
      $this->load->view('templates/main',$this->data);
    }else{
      redirect(site_url().'products/');
    }
    } 
    
    else {
      $this->session->set_userdata('destination','cart/order/');//shmira v session agali kniyot
      redirect(site_url().'user/login/');
    }
  }
}