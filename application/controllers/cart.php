<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Model_cart $model_cart
 */
class Cart extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_cart');
    }

    /**
     * Display checkout page
     *
     * @return mixed
     */
    public function checkout()
    {
        $this->data['content'] = $this->load->view('content/checkout', null, true);
        return $this->load->view('templates/main', $this->data);
    }

    /**
     * Action used to add product to the cart
     */
    public function addToCart()
    {
        $id = $this->input->get('id', false);
        if ($id) {
            $this->model_cart->addToCart($id);
        }
    }

    /**
     * Update cart
     */
    public function updateCart()
    {
        //get all POST parameters from input,
        // the first parameter of the post() method is null so we will get all of them
        $cart_details = $this->input->post(null, true);

        //use standard codeingniter class cart to update
        $this->cart->update($cart_details);

        //redirect to checkout page
        redirect(site_url() . 'cart/checkout/');
    }

    /**
     * Make order
     */
    public function order()
    {
        if (!$this->data['is_login']) { //in core my_controller
            //Save to session cart
            $this->session->set_userdata('destination', 'cart/order/');
            redirect(site_url() . 'user/login/');
        }

        //check that the cart is not empty
        $order = $this->cart->contents();
        if (count($order) == 0) {
            redirect(site_url() . 'products/');
        }

        //save order
        $order = json_encode($order);
        $this->model_cart->orderSave($order);
        $this->data['title'] = 'Order confirmation';
        $this->data['content'] = 'Order has been save';
        $this->load->view('templates/main', $this->data);

    }
}