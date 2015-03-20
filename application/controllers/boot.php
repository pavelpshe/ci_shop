<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Boot extends MY_Controller{
  function __construct(){
    parent:: __construct();
  }
  
 public function index($page=null)
 {
   $page=$this->security->xss_clean($page);
   if ($page)
   {
    $content= $this->model_boot->getContent($page);
     if($content)
     {
        $this->data['title']=$content['content'][0]['menu_title'];
        $this->data['content']=$this->parser->parse('parser/content',$content,true);
     }
   }
   $this->load->view('templates/main',$this->data);
 

 }
}