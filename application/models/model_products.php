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
     * Get
     * @TODO Check what this function does
     *
     * @param $product_machine_name
     * @return mixed
     */
    public function getProduct($product_machine_name)
    {
        $product = null;
        $sql = "SELECT  *
                FROM products
                WHERE machine_name = ?";

        $query = $this->db->query($sql, array($product_machine_name));

        if ($query->num_rows() > 0) {
            //budem ispolzovat v parser
            $product = $query->row_array();
        }
        return $product;

    }
}
