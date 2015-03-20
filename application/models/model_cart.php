<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_cart extends CI_Model{
  public function orderSave($order){
    $uid=$this->session->userdata('uid');
    $sql="INSERT INTO orders VALUES('','$order','$uid',NOW())";
    $query=$this->db->query($sql);
    $this->cart->destroy();
     
  }
  
  
  public function addToCart($id){
    
     
      $product = $this->getProductById($id);
      
      if( $product){
        
        $data=array(
              'id' =>$id,
              'qty' =>1,
              'price' =>$product['price'],
              'name' => $product['title']        
        );
        
        //check if product in the cart
       /*
        $in_cart=false;
               foreach ($this->cart->content() as $item) {
                if($data['id']==$item['id']){
                  $in_cart=true;
                }   
               }
               if($in_cart)$this->cart->update($data);
               else $this->cart->insert($data);
               */
       
      }
     
  }
  
  private function getProductById($id){
    
     $product=null;
     
      $sql="SELECT  * FROM products WHERE id = ?";
      $query = $this->db->query($sql, array($id));
      
      if( $query->num_rows() > 0){
        
        $product=$query->row_array();//budem ispolzovat v parser
      }
      return $product;
      
  }
}
