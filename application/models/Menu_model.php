<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }
    public function hapusMenu($menuId)
    {
        // $this->db->where('id', $id);
        $this->db->delete('user_menu', ['menuId' => $menuId]);
    }
    public function hapusSubMenu($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }
    public function update_menu($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    function update_menu_proses($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
