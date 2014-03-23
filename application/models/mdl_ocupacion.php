<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_ocupacion extends CI_Model{

  function consultar_ocupacion($ocupacion){
    if($ocupacion){
      $this->db->like('ocucodigo', $ocupacion);
      $this->db->or_like('ocudescri', $ocupacion);
    }
    return $this->db->get('admocupa');
  }
}
