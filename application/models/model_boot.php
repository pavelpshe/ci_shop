<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_boot extends CI_Model{
  
  public function getMenu(){
    $menu=null;
    $query=$this->db->get('menu');
    if($query->num_rows()>0){
      
      $menu['menu']=$query->result_array();
    }
     return $menu; 
  }
  
  public function getContent($page)
  {
  $content=null;
  $sql="SELECT m.title menu_title,c.title,c.article FROM content c
  JOIN menu m ON m.id=c.menu_id
  WHERE m.machine_name =? ";
  $query=$this->db->query($sql,array($page));
  
  if($query->num_rows()>0){
    $content['content']=$query->result_array();
    
  } 
  //die_r($content);
  return $content;     
  }
}