<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Global_model extends CI_Model {

    public function get_countries($en) {
        $prefix = 'en_';
        if ($en) $prefix = 'en_';
        $table = $prefix . 'countries';
        $this->db->select('id, name');
        $result = $this->db->get($table)->result_array();

        return $result;
    }
}