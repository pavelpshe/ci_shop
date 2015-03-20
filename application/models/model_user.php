<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model{
  public function user_validate($email, $pwd){
    $pwd=make_hash($pwd);
    $sql="SELECT * FROM users u
          JOIN roles r ON u.id=r.uid
          WHERE u.email=? AND u.password = ? LIMIT 1";
    $query=$this->db->query($sql,array($email,$pwd));
    if($query->num_rows()>0){
      $user=$query->row_array();
      $set_user['uid'] = $user['id'];
      $set_user['name'] = $user['name'];
      $set_user['email'] = $user['email'];
      $set_user['role'] = $user['role'];
      
      return $this->set_login($set_user);
    }
     return false; 
  }
  public function functionName($value='')
  {
      
  }
   public function user_save($post){
    
    $pwd = make_hash($post['password']);
    
    $sql = "INSERT INTO users VALUES('', ?, ?, ?)";
    $this->db->query($sql, array($post['name'], $post['email'], $pwd));
    
    if($this->db->affected_rows()){
      
      $id = $this->db->insert_id();
      
      $data = array( 'uid' => $id, 'role' => 2);//role=2(not admin static)

      $this->db->insert('roles', $data); 
      
      $set_user['uid'] = $id;
      $set_user['role'] = 2;
      $set_user['name'] = $post['name'];
      $set_user['email'] = $post['email'];
      
      $this->set_login($set_user);
 
      return true;
      
    }
    
    return false;
    
  }
   public function email_exist($email){
    
    $sql="SELECT email FROM users
          WHERE email=? ";
    $query=$this->db->query($sql,array($email));
    if($query->num_rows()>0){
      
      
      return true;
    }
     return false; 
  }
  public function set_login($user){
      $user['admin']=($user['role'] == 1) ? true : false;
      unset($user['role']);
      $this->session->set_userdata($user);
      return true;
  }
}
