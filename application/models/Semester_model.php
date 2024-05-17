<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Semester_model extends CI_model
{

    function getSemester()
    {
        return $this->db->get('Semester')->result();
    }
}
