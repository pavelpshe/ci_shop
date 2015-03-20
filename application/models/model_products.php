<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Model_products
 *
 * Usef do fetch products and categories data from DB
 */
class Model_products extends CI_Model
{

    /**
     * Get list of all categories
     *
     * @return mixed
     */
    public function getCategories()
    {
        $categories = null;

        $query = $this->db->get('categories');

        if ($query->num_rows() > 0) {
            //budem ispolzovat v parser
            $categories['categories'] = $query->result_array();
        }
        return $categories;
    }

    /**
     * Get list of all products for category
     *
     * @param $category_machine_name
     * @param int $visibility
     * @return null
     */
    public function getProductsWithCategory($category_machine_name, $visibility = 1)
    {
        $products = null;

        $sql = "SELECT
                    c.machine_name AS cat_mashine,
                    c.name,
                    p.*
                FROM products p
                  JOIN categories c ON c.id = p.categorie_id
                WHERE c.machine_name = ?
                      AND p.visibility = ? ";
        $query = $this->db->query($sql, array($category_machine_name, $visibility));

        if ($query->num_rows() > 0) {
            //budem ispolzovat v parser
            $products['products'] = $query->result_array();
            $products['cat_name'] = $products['products'][0]['name'];
        }

        return $products;
    }

    /**
     * Get Product data by product machine name
     *
     * @param $product_machine_name
     * @return mixed
     */
    public function getProductByMachineName($product_machine_name)
    {
        $sql = "SELECT * FROM products WHERE machine_name = ?";
        return $this->_getProduct($sql, array($product_machine_name));
    }

    /**
     * Get Product data by product id
     *
     * @param $id
     * @return mixed
     */
    public function getProductById($id)
    {
        $sql = "SELECT  * FROM products WHERE id = ?";
        return $this->_getProduct($sql, array($id));
    }

    /**
     * Generic Function to fetch product data
     *
     * @param $sql - SQL to execute
     * @param array $params - array of parameters to replace "?" in SQL
     * @return mixed
     */
    protected function _getProduct($sql, array $params)
    {
        $product = null;
        $query = $this->db->query($sql, $params);

        if ($query->num_rows() > 0) {
            $product = $query->row_array();
        }
        return $product;
    }
}
