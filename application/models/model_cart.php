<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Model_cart
 * @property Model_products $model_products
 */
class Model_cart extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('model_products');
    }

    /**
     * Save order into the DB
     *
     * @param $order
     */
    public function orderSave($order)
    {
        $uid = $this->session->userdata('uid');

        $sql = "INSERT INTO orders VALUES(?,?,NOW())";

        $this->db->query($sql, array($order, $uid));
        $this->cart->destroy();
    }

    /**
     * Add product to cart,
     * In case product already in cart - update it
     *
     * @param $id
     * @return bool
     */
    public function addToCart($id)
    {
        $product = $this->model_products->getProductById($id);

        if (is_null($product)) {
            return false;
        }

        //prepare product data for insertion to cart
        $data = array(
            'id' => $id,
            'qty' => 1,
            'price' => $product['price'],
            'name' => $product['title']
        );

        //check if product in the cart
        $inCart = false;
        foreach ($this->cart->contents() as $item) {
            if ($data['id'] == $item['id']) {
                $inCart = true;
                break;
            }
        }

        if ($inCart) {
            return $this->cart->update($data);
        }

        return $this->cart->insert($data);
    }
}
