<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_model extends CI_model
{

    function getJabatan()
    {
        return $this->db->get('jabatan')->result();
    }
}
