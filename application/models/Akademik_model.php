<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akademik_model extends CI_model
{

    function getthn()
    {
        return $this->db->get('akademik')->result();
    }
}
