<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_cms extends CI_Model{
  public function deleteProduct($id) {
      
      $sql="DELETE FROM menu WHERE id=?";
      $query=$this->db->query($sql,array($id));
      if($this->db->affected_rows()){

        $this->session->set_flashdata('feedback','Menu has been deleted!');
       }
      
  }
  public function saveMenu($post)
  {
      $machine_name=make_machine_name($post['link']);
      
      $sql="INSERT INTO menu VALUES('',?,?,?)";
      
    $query=$this->db->query($sql,array($post['title'],$post['link'], $machine_name));
    if($this->db->affected_rows()>0){
      
      $this->session->set_flashdata('feedback','Menu saved');
    }
  
        
  }
  public function getMenu(){
    $menu=null;
    $query=$this->db->get('menu');
    if($query->num_rows()>0){
      
      $menu['menu']=$query->result_array();
    }
     return $menu; 
  }

  public function getProductsList(){
    $data=array();
    $x=0;
    
    $query=$this->db->get('categories');
   if($query->num_rows() >0){
     foreach ($query->result_array()as $row) {
     $data['products'][$x]=$row;
       $sql="SELECT *,id AS prg_id FROM products WHERE categorie_id={$row['id']} ";//delaem alies chtob ne bilo itnagshuta id
       $items_query=$this->db->query($sql);
       if($items_query->num_rows()>0){
         foreach ($items_query->result_array() as $sub_row) {
             $data['products'][$x]['items'][]=$sub_row;
         }
       }    
       $x++;
     }
   }
   return $data;
      
  }
  public function getCategories($id=null) {
      $categories=null;
      $sql="SELECT * FROM categories";
      if(!is_null($id)){
        $sql.= " ORDER BY CASE WHEN id =$id THEN 0 ELSE id END";//probel pered ORDER? 
      }
      $query=$this->db->query($sql);
      if($query->num_rows()>0){

        $categories['categories'] = $query->result_array();
        if (is_null($id)) {
            $default=array('id'=>-1, 'name'=>'Choose categories...');
          array_unshift($categories['categories'], $default);
        }      
      }
      return $categories;
  }
  public function deleteProduct($id) {
      
      $sql="DELETE FROM products WHERE id=?";
      $query=$this->db->query($sql,array($id));
      if($this->db->affected_rows()){

        $this->session->set_flashdata('feedback','Product has been deleted!');
       }
      
  }
  }
