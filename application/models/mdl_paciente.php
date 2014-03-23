<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_paciente extends CI_Model{

	function consultar_paciente($paciente){
		if($paciente){
			$this->db->like('pacidenti', $paciente);
			$this->db->or_like('pacnombr1', $paciente);
			$this->db->or_like('pacnombr2', $paciente);
			$this->db->or_like('pacapell1', $paciente);
			$this->db->or_like('pacapell2', $paciente);
			$this->db->or_like('pacnomcom', $paciente);
		}
		return $this->db->get('madpacie');

	}

}