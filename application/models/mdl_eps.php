<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_eps extends CI_Model{

  function consultar_eps($eps){
    if($eps){
      $this->db->like('epscodigo', $eps);
      $this->db->or_like('epsnombre', $eps);
    }
    return $this->db->get('madentid');
  }
}
