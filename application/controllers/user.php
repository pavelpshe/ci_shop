<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
  public $post;
  function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('model_user');  
  }
    public function login(){
      if($this->data['is_login']) redirect();//chtob ne mog sdelat login kogda uje v login
    $this->post=$this->input->post(null,true);  
    $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
    $this->form_validation->set_rules('password','Paswordik','trim|required|xss_clean|callback_user_validate');
    
    if ($this->form_validation->run()==false){
      $this->data['title']='Login page';
      $this->data['content']= $this->load->view('templates/login',null,true);
      $this->load->view('templates/main',$this->data);
     }
     else{
       $distination=$this->session->userdata('destination');
    if($distination){
      $this->session->unset_userdata('destination');// vitashit datu iz distanation kotoruu sohranili v cart
      redirect(site_url().$distination);
    }
    else{
     redirect();
    }
     }
         
     } 
    public function register(){
      $this->post=$this->input->post(null,true);
    $this->form_validation->set_rules('name','Name','trim|required|min_length[2]|xss_clean');
    $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|callback_email_exist');   
    $this->form_validation->set_rules('password','Password','trim|required|min_lenght[6]|matches[re_password]|xss_clean|');
    $this->form_validation->set_rules('re_password','Password','trim|required|xss_clean');
    
    if ($this->form_validation->run()==false){
      $this->data['title']='Registration page';
      $this->data['content']= $this->load->view('templates/register',null,true);
      $this->load->view('templates/main',$this->data);
    
      
    }
    else{
      $is_register= $this->model_user->user_save($this->post);
      if($is_register){
        redirect();
      
    } else{
      redirect('user/register/');
    }
    }
    }
    public function edit(){
      echo "Todo...noten la golesh efsharut leshanot et pratav";
    }
    public function logout(){
    
        $user_data=array(
          'uid'=>'',
          'name'=>'',
          'email'=>'',
          'admin'=>'',
        );
        $this->session->unset_userdata($user_data);
      //  $this->cart->destroy();//udalit vse iz karti kogda delaem logout
        redirect();
    } 
    public function user_validate() {
     $is_login=$this->model_user->user_validate($this->post['email'],$this->post['password']);
      if($is_login){
        return true;
      }
     $this->form_validation->set_message('user_validate','Email/Password are incorrect');
     return false;
  }
  public function email_exist() {
    if(!empty($this->post['email'])){
      $is_exist=$this->model_user->email_exist($this->post['email']);
      
     
      if(!$is_exist){
        return true;
      }
      
      
  }
     $this->form_validation->set_message('email_exist','Email exist');
     return false;  
  }
  }