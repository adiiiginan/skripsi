<?php
class AksiMK_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_performance() {
        $this->db->get('aksi_matakuliah_tmp')->result_array();
     
    }
}
?>
