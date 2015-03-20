<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @property Model_boot $model_boot
 */
class MY_Controller extends CI_Controller
{
    public $data = array('title' => 'CI Shop');

    function __construct()
    {

        parent::__construct();

        $this->data['is_login'] = ($this->session->userdata('uid') == true) ? true : false;
        $this->data['is_admin'] = ($this->session->userdata('admin') == true) ? true : false;

        $this->load->model('model_boot');
        $menu = $this->model_boot->getMenu();
        if ($menu) {
            $this->data['menu'] = $this->parser->parse('parser/menu', $menu, true);
        }
    }
}
