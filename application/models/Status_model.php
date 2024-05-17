<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status_model extends CI_model
{

    function getstat()
    {
        return $this->db->get('status')->result();
    }
}
