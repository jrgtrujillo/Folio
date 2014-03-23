<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_vinculado extends CI_Model{

  function consultar_vinculado($vinculado){
    if($vinculado){
      $this->db->like('vincodigo', $vinculado);
      $this->db->or_like('vindescri', $vinculado);
    }
    return $this->db->get('madvincu');
  }
}
