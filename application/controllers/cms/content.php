<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content extends MY_Controller
{
    public $post;

    function __construct()
    {
        parent::__construct();

        if (!$this->data['is_admin']) {
            redirect(site_url() . 'user/login/');
        }
        $this->load->library('form_validation');
        $this->load->model('model_cms');
        //zagrujaem model_cms
    }

    public function index()
    {
        echo 'Content';
    }

    public function content()
    {

    }

    public function addContent()
    {

    }

    public function editContent()
    {

    }

    public function deleteContent()
    {

    }
}