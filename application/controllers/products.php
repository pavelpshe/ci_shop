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
     * @param null $category
     * @param null $product
     */
    public function index($category = null, $product = null)
    {

        //Filter variable, check for injections
        $category = $this->security->xss_clean($category);
        $product = $this->security->xss_clean($product);

        //Show all categories, no category selected
        if (is_null($category)) {
            $this->data['title'] = 'Our categories';
            $cat = $this->model_products->getCategories();
            if ($cat) {
                $this->data['content'] = $this->parser->parse('parser/categories', $cat, TRUE);
            }
            return $this->_finishIt();
        }

        //Show one category
        if (is_null($product)) {
            $prd = $this->model_products->getProducts($category);
            if ($prd) {
                $this->data['title'] = $prd['cat_name'] . 'Products';
                $this->data['content'] = $this->parser->parse('parser/products', $prd, TRUE);

            }
            return $this->_finishIt();
        }

        $item = $this->model_products->getItem($product);
        if ($item) {
            $this->data['title'] = $item['title'];
            $this->data['content'] = $this->parser->parse('parser/item', $item, TRUE);

        }

        return $this->_finishIt();
    }

    protected function _finishIt()
    {
        return $this->load->view('templates/main', $this->data);
    }

}
