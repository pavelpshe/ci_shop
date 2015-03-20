<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Products
 */
class Products extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_products');
    }

    /**
     * @param null $category_machine_name
     * @param null $product_machine_name
     */
    public function index($category_machine_name = null, $product_machine_name = null)
    {
        //Filter variable, check for injections
        $category_machine_name = $this->security->xss_clean($category_machine_name);
        $product_machine_name = $this->security->xss_clean($product_machine_name);

        //Show all categories, no category selected
        if (is_null($category_machine_name)) {
            $this->data['title'] = 'Our categories';

            $categories = $this->model_products->getCategories();

            if (!is_null($categories)) {
                $this->data['content'] = $this->parser->parse('parser/categories', $categories, TRUE);
            }
            return $this->_finishIt();
        }

        //We made it till here, so category was selected

        //Check that the product was NOT selected
        if (is_null($product_machine_name)) {
            //get all products
            $products = $this->model_products->getProductsWithCategory($category_machine_name);
            if (!is_null($products)) {
                $this->data['title'] = $products['cat_name'] . 'Products';
                $this->data['content'] = $this->parser->parse('parser/products', $products, TRUE);

            }
            return $this->_finishIt();
        }

        //get product by product machine name
        $product = $this->model_products->getProduct($product_machine_name);
        if (!is_null($product)) {
            $this->data['title'] = $product['title'];
            $this->data['content'] = $this->parser->parse('parser/item', $product, TRUE);

        }

        return $this->_finishIt();
    }

    protected function _finishIt()
    {
        return $this->load->view('templates/main', $this->data);
    }

}
