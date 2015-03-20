<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class User
 *
 * @property Model_user model_user
 */
class User extends MY_Controller
{
    public $post;

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_user');
    }

    /**
     * Login user
     */
    public function login()
    {
        //Do not allow to login when already logged-in
        if ($this->data['is_login']) {
            redirect();
        }

        //get all POST parameters
        $this->post = $this->input->post(null, true);

        //validate user email and password
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_user_validate');

        //validation failed return to the login page
        if (false == $this->form_validation->run()) {
            $this->data['title'] = 'Login page';
            $this->data['content'] = $this->load->view('templates/login', null, true);
            return $this->load->view('templates/main', $this->data);
        }

        //Validation successful, that means user have valid user name and password (user_validate callback at validator)

        $distination = $this->session->userdata('destination');
        if ($distination) {
            $this->session->unset_userdata('destination');// vitashit datu iz distanation kotoruu sohranili v cart
            redirect(site_url() . $distination);
        }

        redirect();
    }

    /**
     * User Registration
     */
    public function register()
    {
        //get all POST parameters
        $this->post = $this->input->post(null, true);

        //validate fields
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|callback_email_exist');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_lenght[6]|matches[re_password]|xss_clean|');
        $this->form_validation->set_rules('re_password', 'Password', 'trim|required|xss_clean');

        //validation failed
        if ($this->form_validation->run() == false) {
            $this->data['title'] = 'Registration page';
            $this->data['content'] = $this->load->view('templates/register', null, true);
            return $this->load->view('templates/main', $this->data);
        }

        //Validation success, save new user
        $is_register = $this->model_user->userSave($this->post);

        //user registered, go on.
        if ($is_register) {
            redirect();
        }

        //failed to register go back to registration page
        redirect('user/register/');
    }

    /**
     * @TODO Edit user functionality should be added here
     */
    public function edit()
    {
        echo "Todo...noten la golesh efsharut leshanot et pratav";
    }

    /**
     * Logout current user
     */
    public function logout()
    {
        $user_data = array(
            'uid' => '',
            'name' => '',
            'email' => '',
            'admin' => '',
        );
        $this->session->unset_userdata($user_data);

        //Remove everything from the cart
        $this->cart->destroy();
        redirect();
    }

    /**
     * Used as validator for password validator on login
     * @return bool
     */
    public function user_validate()
    {
        $is_login = $this->model_user->userValidate($this->post['email'], $this->post['password']);
        if ($is_login) {
            return true;
        }
        $this->form_validation->set_message('user_validate', 'Email/Password are incorrect');
        return false;
    }

    /**
     * Used as validator for email validator on registration
     * @return bool
     */
    public function email_exist()
    {
        if (!empty($this->post['email'])) {
            $is_exist = $this->model_user->emailExist($this->post['email']);
            if (!$is_exist) {
                return true;
            }
        }
        $this->form_validation->set_message('email_exist', 'Email exist');
        return false;
    }
}