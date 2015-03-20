<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Model_user
 */
class Model_user extends CI_Model
{
    /**
     * Check user and password combination
     * Make login when them both exists and correct
     *
     * @param $email
     * @param $pwd
     * @return bool
     */
    public function userValidate($email, $pwd)
    {
        $pwd = make_hash($pwd);
        $sql = "SELECT *
                FROM users u
                  JOIN roles r ON u.id = r.uid
                WHERE u.email=? AND u.password = ? LIMIT 1";

        $query = $this->db->query($sql, array($email, $pwd));

        //something wrong, return false
        if ($query->num_rows() != 0) {
            return false;
        }

        $user = $query->row_array();
        $set_user['uid'] = $user['id'];
        $set_user['name'] = $user['name'];
        $set_user['email'] = $user['email'];
        $set_user['role'] = $user['role'];

        return $this->setLogin($set_user);

    }

    /**
     * Add new user into the DB
     * Make login as well
     *
     * @param $post
     * @return bool
     */
    public function userSave($post)
    {
        $pwd = make_hash($post['password']);

        $sql = "INSERT INTO users VALUES(NULL, ?, ?, ?)";
        $this->db->query($sql, array($post['name'], $post['email'], $pwd));

        if (!$this->db->affected_rows()) {
            return false;
        }

        $id = $this->db->insert_id();
        $data = array('uid' => $id, 'role' => 2);//role=2(not admin static)

        $this->db->insert('roles', $data);

        $set_user['uid'] = $id;
        $set_user['role'] = 2;
        $set_user['name'] = $post['name'];
        $set_user['email'] = $post['email'];

        $this->setLogin($set_user);

        return true;

    }

    /**
     * Check for Email in DB
     * @param $email
     * @return bool
     */
    public function emailExist($email)
    {
        $sql = "SELECT email FROM users WHERE email = ? ";
        $query = $this->db->query($sql, array($email));
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }

    /**
     * Make login, with provided data
     *
     * @param $user
     * @return bool
     */
    public function setLogin($user)
    {
        $user['admin'] = ($user['role'] == 1) ? true : false;
        unset($user['role']);
        $this->session->set_userdata($user);
        return true;
    }
}
