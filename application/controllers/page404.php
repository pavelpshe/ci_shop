<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Page404 extends MY_Controller{
  public function index(){
    $this->data['title']='Page 404';
    $this->data['content']='The page is not found gnida...';
    $this->load->view('templates/main',$this->data);
  }
}
